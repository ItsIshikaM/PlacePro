import mysql.connector
import random
import faker
import pandas as pd

# Database Connection
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="Root@123",
    database="placements_db"
)
cursor = conn.cursor()

# Create Table
cursor.execute("""
    CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        cgpa FLOAT,
        placed BOOLEAN,
        company_name VARCHAR(100),
        salary INT,
        branch VARCHAR(50),
        skills TEXT
    )
""")

fake = faker.Faker()
branches = ['CSE', 'IT', 'ECE', 'EEE', 'ME', 'Civil']
companies = ['Google', 'Microsoft', 'Amazon', 'TCS', 'Infosys', 'Wipro', 'HCL', 'IBM']

def generate_students(n=150):
    for _ in range(n):
        name = fake.name()
        cgpa = round(random.uniform(6.0, 9.5), 2)
        placed = random.choice([True, False])
        company_name = random.choice(companies) if placed else None
        salary = random.randint(500000, 2500000) if placed else None
        branch = random.choice(branches)
        skills = ', '.join(random.sample(['Python', 'Java', 'C++', 'SQL', 'ML', 'React', 'AI', 'AWS'], 3))

        cursor.execute("INSERT INTO students (name, cgpa, placed, company_name, salary, branch, skills) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       (name, cgpa, placed, company_name, salary, branch, skills))

    conn.commit()
    print(f"{n} students added successfully!")

generate_students(150)
cursor.close()
conn.close()
