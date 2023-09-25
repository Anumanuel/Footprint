<?php
//session start must be there important!!!!!!!!!!!!!
session_start();
//connecting database
include('connectdb.php');

if(isset($_SESSION['rid'])) {
	header('location: sign-in.php');
	
	}
	else{echo '';}
//error reporting
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
//if condition means when the button click then only the data must go and store in database
$msg="";
if (isset($_POST["Sign-up"]))
{		
$name=$_POST["name"];
$email=$_POST["email"];
$number=$_POST["number"];
$password=$_POST["password"];
		// inserting all details to the data base using insert command
		//regdate is autometically entering so we should not write it in '' form
		//means now() as it is 
$query="INSERT INTO `registration` (`r_fname`, `r_email`, `r_number`, `r_password`, `r_regdate`, `r_status`) VALUES
 ('$name', '$email', '$number', '$password',now(), '1');";
//connection with database means mysqli
if (mysqli_query($mysqli, $query)) {
	$_SESSION["rid"]=$row["r_id"];
    header('location: success.php');
	
	//giving msg tag here and echo down
            // $msg="<p class='accountsuccess'>New Account created successfully</p>";
            } else{
				$msg="<p class='accountsuccess'> unsuccessfully</p>";
			}
					$mysqli->close();			
}
?>

<?php
if(isset($_SESSION['rid'])) {
	header('location: index.php');
	}
	else{echo '';}
 //error reporting
 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$msg="";
if(isset($_POST["login"])) {
$email=$_POST["email"];
$password=$_POST["password"];
$sql = "SELECT * FROM registration WHERE r_email='$email' && r_password='$password' && r_status='1'";
//echo $sql;
         $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
               $_SESSION["rid"]=$row["r_id"];
			   $_SESSION["rstatus"]=$row["r_status"];
            header('location: index.php');
           }
        }else{
				$msg="<div class='warndiv'><p class='warnlogin'>Invalid email or password</p></div>";
				}
$mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
<!-- header starts from here -->

<?php include("nav.php"); ?>

<!-- header ends here -->



    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <?php echo $msg;?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="login" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>



          <form action="" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
            <i class="fas fa-phone"></i>
              <input type="text" name="number" placeholder="Number" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Confirm Password" required/>
            </div>
            <input type="submit" name="Sign-up" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
            Get the footwears for exclusive price from expensive brands,
            No credit card. Join us today!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
             Welcome back!..Get the footwears for exclusive price 
             from expensive brands.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
