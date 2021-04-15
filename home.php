<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to Zuri Training Homepage</h1>
    <h3>
        <?php 
            if(isset($_SESSION['email'])) {
                echo $_SESSION['message'];
            }
            else{
                echo 'You are not logged in!';
            }
        ?>
    </h3>
    
    <p>
    <?php
     if(isset($_SESSION['email'])) {
        echo 'Your email is '.  $_SESSION['email'];
     }
    ?>
    </p>
    <?php
        if(isset($_SESSION['email'])) {
            echo '<a href="logout.php">Logout</a>';
        }
        else{
            echo '<a href="login.php">Go to Login</a>';
        }
    ?>
</body>
</html>