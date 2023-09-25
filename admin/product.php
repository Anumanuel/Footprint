<?php
//some one login in we have to store the the data
session_start();
 include('connectdb.php');
if(isset($_SESSION['lockpin'])) {

}
else{header('location: login.php');}

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$msg="";
            if (isset($_POST["submit"])) {
              # code...

            $pro_name=$_POST["pro_name"];
            $pro_detail=$_POST["pro_detail"];
            $pro_detail_long=$_POST["pro_detail_long"];
            $pro_price=$_POST["pro_price"];
            $cat_id=$_POST["pro_category"];
            $pro_quantity=$_POST["pro_quantity"];
            $pro_gender=$_POST["pro_gender"];
            $brand_id=$_POST["brand_id"];


            //select * means selecting everything
            //&& means and
            $sql="INSERT INTO `product`(`pro_name`, `pro_detail`, `pro_detail_long`, `pro_price`, `cat_id`, `pro_gender` , `brand_id` , `pro_quantity`, `pro_added` ) VALUES 
('$pro_name','$pro_detail','$pro_detail_long','$pro_price','$cat_id','$pro_gender','$brand_id','$pro_quantity', now())";
if (mysqli_query($mysqli, $sql)) {


	
	//giving msg tag here and echo down
             $msg="<p class='accountsuccess'>inserted</p>";


            } else{
				$msg="<p class='accountsuccess'> not inserted</p>";
			}


            $mysqli->close();
}
?>


<!doctype html>
<html>
  <head>
    <title>product</title>
    <!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    
  </head>
  <body>

<!-- SIDEBAR -->
<section id="sidebar">
		<a href="dashboard.php" class="brand">
		<img src="photo/feet2.png">Footprint</a>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="customer.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Customer</span>
				</a>
			</li>
			<li class="active">
				<a href="product.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li>
				<a href="userorder.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Order details</span>
				</a>
			</li>
			<li>
				<a href="edit-product.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Edit Product</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Notification</span>
				</a>
			</li>
			<li>
				<a href="logutadmin.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="photo/profile.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="dashboard.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="product.php">Products</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
	
  <!--body part starts here-->

<div class="ryt_bar">
<h1 class="title">add product</h1>

<?php echo $msg; ?>
<form action="" method="post" class="entry_table">
<input type="text" name="pro_name" class="pro_name" placeholder="product name">
<textarea  name="pro_detail" class="pro_detail" placeholder="product detail"></textarea>
<textarea  name="pro_detail_long" class="pro_detail_long" placeholder="product description"></textarea>
<input type="text" name="pro_price" class="pro_price" placeholder="product price">

<select name="pro_category" class="cat-select">
  <option value="">select category</option>
<?php 


$sql=mysqli_query($mysqli,"SELECT * FROM category WHERE cat_status='1' " );
while($rows=mysqli_fetch_array($sql))
{
    
?>
  
  <option value="<?php echo $rows["cat_id"];?>"><?php echo $rows["cat_name"];?></option>  
              
 
<?php } ?>
 </select>


 <select name="pro_gender" class="cat-select" required>
  <option value="">select gender</option>
  <option value="0">0</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>

 </select>

 <select name="brand_id" class="cat-select">
  <option value="">select brand name</option>
<?php 


$sql=mysqli_query($mysqli,"SELECT * FROM brands WHERE brand_status='1' " );
while($rows=mysqli_fetch_array($sql))
{
    
?>
  
  <option value="<?php echo $rows["brand_id"];?>"><?php echo $rows["brand_name"];?></option>  
              
 
<?php } ?>
 </select>

<input type="number" name="pro_quantity" class="pro_quantity" placeholder="product quantity">

<div class="sq-wrapper">

<?php

$send="";

if(isset($_POST["submit"])){

$size7=$_POST["size_7"];
$size8=$_POST["size_8"];
$size9=$_POST["size_9"];
$size10=$_POST["size_10"];
$size11=$_POST["size_11"];


            //select * means selecting everything
            //&& means and
            $sql="INSERT INTO `sizes`(`size_7`, `size_8`, `size_9`, `size_10`, `size_11` ) VALUES 
('$size7','$size8','$size9','$size10','$size11')";
}

	?>
          <div class="sizes">
						<?php echo $send; ?>
						<label class="text" for="xs">
						<h3>Size :<span>7</span></h3>
							<input id="s" type="text" name="size_7">
						</label>

						<label class="text" for="xs">
						<h3>Size :<span>8</span></h3>
							<input id="s" type="text" name="size_8">
						</label>

						<label class="text" for="xs">
						<h3>Size :<span>9</span></h3>
							<input id="s" type="text" name="size_9">
						</label>

						<label class="text" for="xs">
						<h3>Size :<span>10</span></h3>
							<input id="s" type="text" name="size_10">
						</label>

						<label class="text" for="xs">
						<h3>Size :<span>11</span></h3>
							<input id="s" type="text" name="size_11">
						</label>

					
					</div>
        </div>

<input type="submit" name="submit" value="add product">

</form>

</div>


<div class="clearfix"></div>
</div>


<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
<?php include('js/main.js'); ?>
</script>
<script>

</script>


</body>
</html>