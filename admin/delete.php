<?php
include('connectdb.php');

$deleteid=$_GET["delid"];

$query = "DELETE FROM product WHERE pro_id='$deleteid' LIMIT 1";
$result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli) );
header("Location: product.php"); 
?>