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

  $proid=$_POST["proid"];
  $rid=$_SESSION["rid"];
  $proquantity=$_POST["qty"];
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

      $sql1="INSERT INTO `orders_list` (`pro_id`, `unique_id`, `pro_qty`) VALUES ('$proid','$invoiceid','$proquantity')";
      if (mysqli_query($mysqli, $sql1)){

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta meta http-equiv="REFRESH" content="2;invoice.php?ino=' . $invoiceid . '">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
            font-family: "Varela Round", sans-serif;
          }
          .modal-confirm {		
            color: #636363;
            width: 325px;
            margin: 30px auto;
          }
          .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
          }
          .modal-confirm .modal-header {
            border-bottom: none;   
                position: relative;
          }
          .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
          }
          .modal-confirm .form-control, .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px; 
          }
          .modal-confirm .close {
                position: absolute;
            top: -5px;
            right: -5px;
          }	
          .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
          }	
          .modal-confirm .icon-box {
            color: #fff;		
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #82ce34;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
          }
          .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
          }
          .modal-confirm.modal-dialog {
            margin-top: 80px;
          }
            .modal-confirm .btn {
                color: #fff;
                border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
                line-height: normal;
                border: none;
            }
          .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #6fb32b;
            outline: none;
          }
          .trigger-btn {
            display: inline-block;
            margin: 100px auto;
          }
';
       
      }else{
        echo "failed to place order";
      }
  }else{
    echo "invalid";
  }
}

?>