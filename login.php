<?php
$erroremail=$errorpass="";
$loginerror="";
$email="";
$pass="";

    if(isset($_POST['submit'])){
    
        $email=$_POST['email'];
        $pass=$_POST['password'];
      
      
        if(empty($email))
        {
            $erroremail="Please input email";
        }
        else if(empty($pass))
        {
            $errorpass="Please input password";
        }
        else{
            $userslist=file('data.txt');
            $login=false;
            foreach($userslist as $user)
            {
                $details= explode(',', $user);
                if($details[0]==$email && $details[1]==$pass)
                {
                    $login=true;
                    break;
                }
            }
            if($login==true){
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['message']="Successfully logged in to our site";
                header("Location: home.php");
            }
            else{
                $loginerror="Could not validate your credentials. Please try again.";
            }
        }
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">

        <p><?php echo $loginerror?></p>
        <p><?php echo $erroremail?></p>
        <p><?php echo  $errorpass?></p>
        <label for="email">Email</label><br>
        <input type="text" name="email" id=""><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id=""><br>
        <button type="submit" name="submit">Log In</button>
    </form>
    <a href="register.php">Register Instead</a> <br><span><a href="reset.php">Forgot Your Password</a></span>
</body>
</html>
