<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Chatbot</title>
    <link rel="stylesheet" href="styles.css">
    
    <script src="https://kit.fontawesome.com/39d057e527.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e3a8a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .chat-container {
            
            padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    width: calc(100% - 19rem);
    height: 88vh;
    margin-left: 15rem;
    background-color: #fafafa;
    position: fixed;
    top: 1rem;
    border-radius: 1rem;
    bottom: 1rem;
    margin-right: 1rem;
    overflow: hidden;
        }
        .chat-header {
            display: flex;
            align-items: center;
            color: white;
            background-color: #1e3a8a;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .chat-header img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        #chat-box {
            height: 360px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .input-area {
            display: flex;
            gap: 10px;
        }
        input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #1e3a8a;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #163172;
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
        .sidebar img{
            width:30vh;
            margin: 2rem 0rem 2rem 0rem;
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
        
    </style>
</head>
<div class="sidebar">
        <div class="logo">
            <img src="logo.png">
        </div>
        <i id="btn"></i>
        <a href="#">
            <i class="fas fa-home">
            </i> Home</a>
        <a href="../index.php">
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
        </div>
        
    <div class="chat-container">
        <div class="chat-header">
            <img src="robot.png" alt="Chatbot Icon">
            <h2>Placement Chatbot</h2>
        </div>
        <div id="chat-box"></div>
        <div class="input-area">
            <input type="text" id="user-input" placeholder="Ask a question...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>