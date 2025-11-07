<?php 
    session_start();
    require "instagram/connect.php";

    if (isset($_POST['submit'])) {
        $password = "";
       $st_password = strtolower($_POST['password']);
       $new_password = strtolower($_POST['new_password']);

        $s_sql = "SELECT * FROM login WHERE password = '$st_password'";
        $result = $conn->query($s_sql);
        while ($row = $result->fetch_assoc()) {
            $password = $row['password'];
        }

        if ($st_password !=$password) {
            echo "<script>
                    alert('wrong password. Please try again')
                    window.location.href = 'forget_password.php'
                </script>";
        }else if ($st_password == $password) {
            $sql = "UPDATE login SET password = '$new_password'";
            if ($conn->query($sql)===TRUE) {
                $_SESSION['password'] = $password;
                echo  "<script>alert('Password Changed successfully')
                            window.location.href = 'adminreal.php'
                        </script>";
            }
        }
       

       
    }
?>

<!-- if ($password == $st_password) {
            echo "<script>window.location.href = 'user.php'</script>";
        }else {
            echo "<script>
                    alert('wrong password. Please try again')
                    window.location.href = '../login.php'
                  </script>";
        } -->