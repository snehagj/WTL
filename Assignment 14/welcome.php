<?php

session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve session and cookie data
$username = $_SESSION['username'];
$cookie_username = $_COOKIE['username'] ?? 'Cookie not set';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        p {
            margin-bottom: 20px;
            color: #555;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Cookie says: <?php echo htmlspecialchars($cookie_username); ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>