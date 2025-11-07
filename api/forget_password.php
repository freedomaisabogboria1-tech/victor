<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            /* color: #1f1f1f; */
        }

        html {
            scroll-behavior: smooth;
        }

        ul {
            list-style-type: none;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .container {
            background: white;
            margin: 100px 50%;
            padding: 20px;
            width: 350px;
            border-radius: 5px;
            transform: translateX(-50%);
        }

        input {
            padding: 12px 10px;
            border: 1px solid #cccccc;
            width: 100%;
            margin: 10px;
            border-radius: 5px;
        }

        input:focus {
            outline: 1px solid #64c1ff;
            border: 1px solid #64c1ff;
        }

        label {
            padding: 10px;
            color: #1f1f1f;
        }

        button {
            padding: 10px 15px;
            margin: 10px;
            border: 1px solid #0f93eb;
            ;
            background: #0f93eb;
            ;
            color: white;
            border-radius: 3px;
        }

        #error {
            text-align: center;
            /* color: #ff3a3a; */
            padding: 10px;
            /* background-color: #ff00004d; */
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body style="background: #F5F4F4; color: #1f1f1f;">
    <div class="container">
        <!-- <h2 style="text-align: center;">DIVINE FAVOUR SERVICES</h2> -->
        <h3 style="text-align: center; color: #0f93eb;">Sign In</h3><br><br><br>

        <form action="forget_password_script.php" method="post">
        
            <label for="">Old Password</label><br>
            <input type="password" name="password" id="password" required><br>

            <label for="">New Password</label><br>
            <input type="password" name="new_password" id="password" required><br>

            <a href="login.php"><p style="margin: 10px; color: #0f93eb;">Login Instead</p></a>
            <button type="submit" name='submit'>Sign In</button><br>
        </form>
    </div>
   
    <!-- <div class="info" style=' height: auto; right: 0; box-shadow: 1px 1px 10px #d3d0d0; padding: 10px; border-top: 2px solid #0f93eb'>
        Do you need any of these services <br>
        <ul>
            <li>Business Website</li>
            <li>Broker / Crypto / Forex Investment Website</li>
            <li>NFT Broker</li>
            <li>Courier Shipping Website</li>
            <li>Banking Website</li>
            <li>Facebook Hack</li>
            <li>Instagram Hack, etc</li>
           <p> Refer a friend and get cash back worth 1-10k instantly. 
            click the link below to link up <a style='color: green' href="https://wa.me/+2349012527321">Contact me</a>
            </p>
        </ul>
   </div> -->
</body>

</html>