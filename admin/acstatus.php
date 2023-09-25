<?php

include('connectdb.php');

$cid=$_GET['cid'];
$status=$_GET['status'];

if($status=='inactive'){
    $s='1';
}else if($status=='active'){
    $s='0';
}

$update = "UPDATE registration SET r_status='".$s."' WHERE r_id='".$cid."'";
   
   if (mysqli_query($mysqli, $update)) {

     header('location:customer.php');
   } else {
       $msg="Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);


?>