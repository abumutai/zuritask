<?php
session_start();
$conf="";
$pass="";
$errorconf=$errorpass="";
$loginerror="";

    if(isset($_POST['submit'])){
       $email=$_SESSION['email'];
    
        $pass=$_POST['password'];
        $conf=$_POST['confirm'];
      
      
        
         if(empty($pass))
        {
            $errorpass="Please input password";
            
        }
        else if(empty($conf))
        {
            $errorpass="Please input confirm password";
            
        }
        else if(empty($email))
        {
            
            header("Location: login.php");
        }
        else{
            $userslist=file('data.txt');
            $reset=false;
            foreach($userslist as $user)
            {
                $details= explode(',', $user);
                if($details[0]==$email)
                {
                    $fp= fopen('data.txt','a');
                    fwrite($fp, $email . "," .$pass. "\n");
                    fclose($fp);
                    $reset=true;
                }
            }
            if($reset==true){
                header("Location: login.php");
            }
            else{
                $loginerror="Could not reset your password.";    
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
    <title>New password</title>
</head>
<body>
    <form action="newpassword.php" method="post">
    <?php echo $loginerror ?>
    <?php echo $errorpass ?>
      <?php echo 'Reset password for: '. $_SESSION['email'];?><br>
        <label for="">Enter New Password</label><br>
        <input type="password" name="password" id=""><br>
        <label for="">Confirm New Password</label><br>
        <input type="password" name="confirm" id=""><br>
        <button type="submit" name="submit">Save New Password</button>
    </form>
</body>
</html>