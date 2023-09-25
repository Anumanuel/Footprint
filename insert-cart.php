<?php
session_start();
 include('connectdb.php');
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
if(isset($_SESSION['rid'])) {

}
else{header('location: sign-in.php');}

?>


<?php
if(isset($_POST["submit"])){

  $rid=$_SESSION["rid"];
  $rname=$_POST["name"];
  $remail=$_POST["email"];
  $rnumber=$_POST["number"];
  $raddress=$_POST["address"];
  $rcountry=$_POST["country"];
  $rstate=$_POST["state"];
  $rcity=$_POST["city"];
  $rpincode=$_POST["pin"];
  $sname=$_POST["sname"];
  $snumber=$_POST["snumber"];
  $saddress=$_POST["saddress"];
$invoiceid=rand(999,9999);



    $sql="INSERT INTO `orders` (`r_id`, `unique_id`,`b_name`, `b_email`, `b_number`, `b_address`, `b_country`, `b_state`, `b_city`, `b_pin`, `s_name`, `s_number`, `s_address`, `order_status`,`order_date`) VALUES
     ('$rid','$invoiceid','$rname','$remail','$rnumber','$raddress','$rcountry','$rstate','$rcity','$rpincode','$sname','$snumber','$saddress','1',now())";
   
    if (mysqli_query($mysqli, $sql)) {

        // var_dump($_SESSION["cart_item"]);
        foreach($_SESSION["cart_item"] as $k => $v) {
        

            $sql1="INSERT INTO `orders_list` (`pro_id`, `unique_id`, `pro_qty`) VALUES ('".$_SESSION["cart_item"][$k]["pro_id"]."','$invoiceid','".$_SESSION["cart_item"][$k]["pro_quantity"]."')";
            if (mysqli_query($mysqli, $sql1)){

                echo '<!doctype html>
                <html lang="en">
                  <head>
                    <title>successful meg</title>
                    <!-- Required meta tags -->
                    <meta meta http-equiv="REFRESH" content="4;invoice.php?ino=' . $invoiceid . '">
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <link rel="stylesheet" href="css/style.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                  </head>'; }else{
                echo "failed to place order";
              
            }}
                echo '<div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                <h3 class="acc">Order successfully placed!</h3>
                </div>
                </body>
                </html>';
             
      
      
  }else{
    echo "invalid";
  }

}

?>