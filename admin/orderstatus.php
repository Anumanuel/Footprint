<?php

include('connectdb.php');

$oid=$_GET['oid'];
$ostatus=$_GET['status'];

if($ostatus=='pending'){
    $result='1';
}else if($ostatus=='processing'){
    $result='2';
}else{
    $result='2';
}

$update = "UPDATE orders SET order_status='".$result."' WHERE order_id='".$oid."'";
   
   if (mysqli_query($mysqli, $update)) {

    header('location:userorder.php');
   } else {
       $msg="Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);


?>