<?php
session_start();
 include('connectdb.php');
 
 if(isset($_SESSION['lockpin'])) {
	header('location: dashboard.php');
	
	}
	else{echo '';}
 //error reporting
 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$msg="";

if(isset($_POST["login"])) {

$email=$_POST["email"];
$password=$_POST["password"];

$sql = "SELECT * FROM admin WHERE a_email='$email' && a_password='$password'";
//echo $sql;
         $result = mysqli_query($mysqli, $sql);

       if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
               $_SESSION["lockpin"]=$row["a_id"];
            header('location: dashboard.php');
           }
        }else{
				$msg="<div class='warndiv'><p class='warnlogin'><B>INVALID EMAIL AND PASSWORD</B></p></div>";
				}


            $mysqli->close();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Login landing page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">   
</head>
<body>
    <section class="side">
        <img src="./photo/img.svg" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Welcome back</p>
            <div class="separator"></div>
            <p class="welcome-message">Please, provide login credential to proceed and have access to all our services</p>

            <form class="login-form" action="" method="post">
            <?php echo $msg; ?>
                <div class="form-control">
                    <input type="email" name="email" placeholder="Username">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>
                    <a href="dashboard.php"><input type="submit" name="login" class="submit" value="Login"></a>
            </form>
        </div>
    </section>
    
</body>
</html>