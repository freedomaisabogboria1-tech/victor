<?php
// Start the session
session_start();

// Include the database connection
require "instagram/connect.php";

// Initialize variable to store the correct password from the database
$passwordFromDB = '';

// Query to fetch the password from the 'login' table
$sql = "SELECT password FROM login LIMIT 1";
$result = $conn->query($sql);

// Fetch the password from the database
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Assuming there's only one row in the login table
        $passwordFromDB = $row['password'];
    }
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the entered password and convert to lowercase
    $enteredPassword = strtolower($_POST['password']);

    // Compare the entered password with the one from the database
    if ($passwordFromDB === $enteredPassword) {
        // If correct, set the session and redirect to 'user.php'
        $_SESSION['password'] = $passwordFromDB;
        echo "<script>window.location.href = 'adminreal.php';</script>";
        $_SESSION['admin_logged_in'] = true;
    } else {
        // If the password is incorrect, show an alert and redirect back to the login page
        echo "<script>
                alert('Wrong password. Please try again.');
                window.location.href = 'loginadmin.php';
              </script>";
    }
}

$conn->close(); // Close the database connection
?>
