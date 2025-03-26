from flask import Flask, jsonify
from flask_cors import CORS
import mysql.connector

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes

def get_db_connection():
    try:
        return mysql.connector.connect(
            host="localhost",
            user="root",
            password="Root@123",
            database="placements_db"
        )
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return None

@app.route('/')
def home():
    return "Welcome to the Placement Analysis API. Visit /api/stats for data."

@app.route('/api/stats', methods=['GET'])
def get_stats():
    conn = get_db_connection()
    if conn is None:
        return jsonify({"error": "Database connection failed"}), 500
    
    cursor = conn.cursor(dictionary=True)
    
    # Fetch total and placed students
    cursor.execute("SELECT COUNT(*) AS total_students, SUM(placed) AS placed_students FROM students")
    stats = cursor.fetchone()
    total_students = stats["total_students"] or 0
    placed_students = stats["placed_students"] or 0
    
    # Fetch branch-wise placement
    cursor.execute("SELECT branch, COUNT(*) AS count FROM students WHERE placed=1 GROUP BY branch")
    branch_data = {row["branch"]: row["count"] for row in cursor.fetchall()}
    
    # Fetch skills of placed students
    cursor.execute("SELECT skills FROM students WHERE placed=1")
    skills_data = [row["skills"] for row in cursor.fetchall()]
    
    # Fetch placement details
    cursor.execute("SELECT cgpa, salary, skills, company_name FROM students WHERE placed=1")
    placements = cursor.fetchall()
    
    
    conn.close()
    
    return jsonify({
        "total_students": total_students,
        "placed_students": placed_students,
        "unplaced_students": total_students - placed_students,
        "branch_wise": branch_data,
        "skills": skills_data,
        "placements": placements
    })

if __name__ == '__main__':
    app.run(debug=True)