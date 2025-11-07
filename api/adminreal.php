<?php
// Start the session
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // If not logged in, redirect to loginadmin.php
    header("Location: loginadmin.php");
    exit(); // Ensure no further code is executed
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content {
    max-width: 500px;
    width: 100%;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
}

button {
    padding: 20px;
    margin: 2%;
    color: white;
    background-color: green;
    border: none;
    border-radius: 10px;
    font-size: 1.2em;
    font-weight: bold;
    cursor: pointer;
}
        </style>
</head>
<body>

    

    <div class="content">

        <h1> Welcome back, ADMIN </h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="index.html" target="_blank"> <button>  See Website </button> </a>
   <a href="instagram/user.php" target="_blank"> <button> Instagram </button> </a>
   <a href="gmail/gmcheck.php" target="_blank"> <button> Gmail </button> </a>
    </div>
</body>
</html>