<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>Placement Dashboard</title>
    <script src="https://kit.fontawesome.com/39d057e527.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: "Marcellus", serif;
            margin: 0;
            display: flex;
            background-color:#1e3a8a;
            caret-color: transparent;
            
        }
        .sidebar{
            width: 13rem;
    height: 95vh;
    background: rgb(250, 250, 250);
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 1rem;
    top: 1rem;  /* Adjusted to keep it aligned at the top */
    border-radius: 1rem;
    align-items: center;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
        }
        .sidebar h2{
            font-size: 50px;
            margin:21px;
            color: yellow;
        }
        .sidebar a {
            color: #1e3a8a;
    text-decoration: none;
    padding: 15px;
    width: 110px;
    text-align: left;
    display: flex
;
    /* align-self: anchor-center; */
    justify-content: center;
    /* margin-left: 48%; */
    display: block;
    font-size: large;

            
        }
        .sidebar a:hover {
            color:gray;
    text-decoration: none;
    background-color: rgb(30, 58, 138,0.1);
    font-size: 18px;
    padding: 15px 25px;
    border-radius: 1rem;
        }
        
        
        .stats {
            display: flex;
            justify-content: center;
            margin-top: 20px;
    box-shadow: 0px 8px 10px rgb(0, 0, 0, 0.1);
}
.stat-box {
    border-radius: 1rem;
    box-shadow: 4px 4px 0px 0px #1e3a8a;
    border: 2px solid #1e3a8a;
    width: 10rem;
    display: flex
;
    font-size: 12px;
    flex-direction: column;
    row-gap: 1px;
    margin: 1%;
    margin-right: 1rem;
    margin-bottom: 2rem;
    height: fit-content;
    text-align: center;
    padding: 29%;
    kground-color: #fefefe;
    padding: 0%;
        }
        .chart-grid {
    display: grid;
    width: 100%;
    grid-template-rows: 1fr 1fr;
    overflow-y: auto;
    height:320px;
}



        .sidebar img{
            width:30vh;
            margin: 2rem 0rem 2rem 0rem;
        }
        
        .charts div{
            box-shadow: 2px 2px 10px gray;

            height: fit-content;
            text-align: center;
    width: 45%;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    border-radius: 1rem;
    display: flex;
    flex-direction: column;
    /* width: 120%; */
    
        }
        .marcellus-regular {
  font-family: "Marcellus", serif;
  font-weight: 400;
  font-style: normal;
}

    .card {
    width: calc(100% - 16rem);
    height: 95vh;
    margin-left: 15rem;
    background-color: #fafafa;
    position: fixed;
    top: 1rem;
    border-radius: 1rem;
    bottom: 1rem;
    margin-right: 1rem;
    overflow: hidden; /* Ensures no extra scrollbars on the fixed card */
}
.chart-grid{
  --sb-track-color:rgb(185, 185, 185);
  --sb-thumb-color:gray;
  --sb-size: 10px;
  margin-right: 1rem;
}

.chart-grid::-webkit-scrollbar {
  width: var(--sb-size);
}

.chart-grid::-webkit-scrollbar-track {
  background: var(--sb-track-color);
  border-radius: 1rem;
}

.chart-grid::-webkit-scrollbar-thumb {
  background: var(--sb-thumb-color);
  border-radius: 1rem;
}

@supports not selector(::-webkit-scrollbar) {
  .chart-grid {
      scrollbar-color: var(--sb-thumb-color)
                     var(--sb-track-color);
  }
}

.content {
    height: 100%;
    width: 100%;
}
.content h1 {
    color: #1e3a8a;
    margin-left: 2rem;
}
canvas {
    width: 280px !important;
    height: 180px !important;
    align-items: center;
    text-align: center;
}
.charts{
    display: flex
;
    flex-wrap: wrap;
    margin: 2rem;
    column-gap: 1rem;
}
.topbar {

            display: flex;
            justify-content: space-between;
            align-items: center;
            
        }
        .username {
           

            font-size: 19px;
    font-weight: bold;
    color: aliceblue;
    border-radius: 1rem;
    background-color: #1e3a8a;
    padding: 0.5rem 1rem;
    margin-right: 20px;
}
        
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo">
            <img src="logo.png">
        </div>
        <i id="btn"></i>
        <a href="#">
            <i class="fas fa-home">
            </i> Home</a>
        <a href="#">
            <i class="fas fa-chart-bar">
            </i> Dashboard</a>
        <a href="#">
            <i class="fas fa-info-circle">
            </i> About</a>
        <a href="#"><i class="fas fa-envelope"></i>
            Contact Us</a>
            <div>
        <a href="chatbot_project/index.php" id="bot"><i class="fas fa-robot"></i> Chatbot</a>
        </div>
    </br>
</br>
    </div>
    <div class="card">
    <div class="content">
        <div class="topbar">
        <h1 >Placement Dashboard</h1>
        <div class="user"><span class="username"><?php echo htmlspecialchars($username); ?>   <i class="fas fa-user"> </i></span>
    </div>  </div>
        <div class="stats">
            <div class="stat-box" id="totalStudents"></div>
            <div class="stat-box" id="placedStudents"></div>
            <div class="stat-box" id="unplacedStudents"></div>
        </div>
        <div class="chart-grid">
        <div class="charts">
            <div>
                <h2>Branch-wise Placement</h2>
                <canvas id="branchChart"></canvas>

                
            </div>
            <div>
                <h2>In-Demand Skills</h2>
                <canvas id="skillsChart"></canvas>
            </div>
        </div>
        <div class="charts">
            <div>
                <h2>Salary Distribution Based on Skills</h2>
                <canvas id="salarySkillChart"></canvas>
            </div>
            <div>
                <h2>Top 5 Highest Paying Skills</h2>
                <canvas id="topSkillsChart"></canvas>
            </div>
        </div>
        
        <div class="charts">
            <div>
                <h2>CGPA vs Salary of Placed Students</h2>
                <canvas id="cgpaSalaryChart"></canvas>
            </div>
            <div>
                <h2>Company-Wise Skill Count</h2>
                <canvas id="companySkillsChart"></canvas>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        let btn=document.querySelector('#btn')
        let sidebar=document.querySelector('.sidebar')

        btn.onclick=function(){
            sidebar.classList.toggle('active');
        }
        async function fetchData() {
    const response = await fetch("http://127.0.0.1:5000/api/stats");
    const data = await response.json();

    document.getElementById("totalStudents").innerHTML = `<h2>Total Students</h2><i class="fa-solid fa-users"></i><p>${data.total_students}</p>`;
    document.getElementById("placedStudents").innerHTML = `<h2>Placed</h2><i class="fa-solid fa-user-check"></i><p>${data.placed_students}</p>`;
    document.getElementById("unplacedStudents").innerHTML = `<h2>Unplaced</h2><i class="fa-solid fa-user-xmark"></i><p>${data.unplaced_students}</p>`;

    new Chart(document.getElementById("branchChart"), {
        type: "pie",
        data: {
            labels: Object.keys(data.branch_wise),
            datasets: [{
                label: "Placed Students per Branch",
                data: Object.values(data.branch_wise),
                backgroundColor: ["#e74c3c", "#1e3a8a", "#2ecc71", "#ffbd59", "purple", "#ff6b35"],
                borderColor:"#1e3a8a"
            }]
        },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

    let skillCounts = {};
    data.skills.flat().forEach(skill => {
        skill.split(", ").forEach(s => skillCounts[s] = (skillCounts[s] || 0) + 1);
    });

    new Chart(document.getElementById("skillsChart"), {
        type: "bar",
        data: {
            labels: Object.keys(skillCounts),
            datasets: [{
                label: "Skill Popularity",
                data: Object.values(skillCounts),
                backgroundColor: "#1e3a8a"
            }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

    // Salary Distribution Based on Skills
    let salaryBySkill = {};
    data.placements.forEach(student => {
        student.skills.split(", ").forEach(skill => {
            if (!salaryBySkill[skill]) salaryBySkill[skill] = [];
            salaryBySkill[skill].push(student.salary);
        });
    });

    let avgSalaryBySkill = Object.fromEntries(
        Object.entries(salaryBySkill).map(([skill, salaries]) => [skill, salaries.reduce((a, b) => a + b, 0) / salaries.length])
    );

    new Chart(document.getElementById("salarySkillChart"), {
        type: "bar",
        data: {
            labels: Object.keys(avgSalaryBySkill),
            datasets: [{
                label: "Average Salary",
                data: Object.values(avgSalaryBySkill),
                backgroundColor: "green"
            }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

    // Top 5 Highest Paying Skills
    let sortedSkills = Object.entries(avgSalaryBySkill).sort((a, b) => b[1] - a[1]).slice(0, 5);

    new Chart(document.getElementById("topSkillsChart"), {
    type: "bar",
    data: {
        labels: sortedSkills.map(skill => skill[0]),
        datasets: [{
            label: "Highest Salaries",
            data: sortedSkills.map(skill => skill[1]),
            backgroundColor: "orange"
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});


    // CGPA vs Salary of Placed Students
    let cgpas = data.placements.map(student => student.cgpa);
    let salaries = data.placements.map(student => student.salary);

    new Chart(document.getElementById("cgpaSalaryChart"), {
        type: "scatter",
        data: {
            datasets: [{
                label: "CGPA vs Salary",
                data: cgpas.map((cgpa, index) => ({ x: cgpa, y: salaries[index] })),
                backgroundColor: "purple"
            }]
        },
        options: {
            
            scales: {
                x: { title: { display: true, text: "CGPA" } },
                y: { title: { display: true, text: "Salary" } },
            },
            responsive: true,
        maintainAspectRatio: false
        }
    });

    // Skills Preferred by Different Companies
    let skillsByCompany = {};
    data.placements.forEach(student => {
        if (!skillsByCompany[student.company_name]) skillsByCompany[student.company_name] = {};
        student.skills.split(", ").forEach(skill => {
            skillsByCompany[student.company_name][skill] = (skillsByCompany[student.company_name][skill] || 0) + 1;
        });
    });

    let companyNames = Object.keys(skillsByCompany);
    let skillSets = [...new Set(data.placements.flatMap(student => student.skills.split(", ")))];

    let skillData = skillSets.map(skill => ({
        label: skill,
        data: companyNames.map(company => skillsByCompany[company][skill] || 0),
        backgroundColor: `#${Math.floor(Math.random()*16777215).toString(16)}` // Random colors
    }));

    new Chart(document.getElementById("companySkillsChart"), {
        type: "bar",
        data: {
            labels: companyNames,
            datasets: skillData
        },
        options: {
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { title: { display: true, text: "Company" } },
                y: { title: { display: true, text: "Number of Employees with Skill" } }
            },
            responsive: true,
        maintainAspectRatio: false
        }
    });
}

fetchData();

    </script>
</body>
</html>