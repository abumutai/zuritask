<?php
$erroremail="";
$loginerror="";
$email="";

    if(isset($_POST['submit'])){
    
        $email=$_POST['email'];
      
        if(empty($email))
        {
            $erroremail="Please input email";
        }
        else{
            $userslist=file('data.txt');
            $login=false;
            foreach($userslist as $user)
            {
                $details= explode(',', $user);
                if($details[0]==$email)
                {
                    $login=true;
                    break;
                }
            }
            if($login==true){
              session_start();
              $_SESSION['email']=$email;
                header("Location: newpassword.php");
            }
            else{
                $loginerror="We cannot find your email in the list of users.";
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
    <title></title>
</head>
<body>
    <form action="reset.php" method="post">

        <p><?php echo $loginerror?></p>
        <p><?php echo $erroremail?></p>
        <p>Enter email you were registered with</p>
        <label for="email">Email</label><br>
        <input type="text" name="email" id=""><br>

        <button type="submit" name="submit">Reset </button>
    </form>
</body>
</html>