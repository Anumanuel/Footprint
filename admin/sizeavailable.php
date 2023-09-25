<?php

include('connectdb.php');

$sid=$_GET['sid'];
$size7=$_GET['size7'];

if($size7=='unavailable'){
    $s='1';
}else if($size7=='available'){
    $s='0';
}

$update = "UPDATE sizes SET ='size_7".$s."' WHERE pro_size_id='".$sid."'";
   
   if (mysqli_query($mysqli, $update)) {

     header('location:product.php');
   } else {
       $msg="Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);


?>