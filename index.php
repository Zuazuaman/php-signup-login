<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>GetUp - Your Title Here</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        #header {
            background-color: #f8f8f8;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1;
        }
        #header img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        #container {
            display: flex;
        }
        #navbar {
            background-color: #333;
            color: white;
            width: 200px;
            height: 100vh; /* Gunakan 100vh untuk menutupi tinggi layar */
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        #navbar a {
            color: white;
            text-decoration: none;
            padding: 5px 15px;
        }
        #content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="header">
        <span>[GetUp]</span>
        <div>
            <?php if (isset($user)): ?>
                <a href="[profile_link]">
                    <img src="[pp]" alt="Profile Picture">
                </a>
                <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                <p><a href="logout.php">Log out</a></p>
            <?php else: ?>
                <a href="login.php">Log in</a> or <a href="signup.html">sign up</a>
            <?php endif; ?>
        </div>
    </div>
    <div id="container">
        <div id="navbar">
            <a href="#">[Home]</a>
            <a href="#">[Download]</a>
            <a href="#">[Search]</a>
            <a href="#">[Code]</a>
            <a href="#">[Script]</a>
            <a href="#">[Chat]</a>
            <a href="[settings_link]">Settings</a>
        </div>
        <div id="content">
            <!-- Konten utama Anda di sini -->
        </div>
    </div>
</body>
</html>
