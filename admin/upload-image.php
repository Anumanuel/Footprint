<!doctype html>
<html lang="en">
  <head>
    <title>upload-image</title>
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
							<a class="active" href="pro-edit.php">Upload</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
	
<!--body part starts here-->
<h1 class="title">Upload Image</h1>

  <?php

include('connectdb.php');

$pro_id=$_GET["proid"];

$failed="";

if(isset($_POST["upload"])){

	if(empty($_FILES['image0']['name'])){ $image0='';} else{$image0=$_FILES['image0']['name'];}
	$dir="upload/";
	$img0=$_FILES['image0']['name'];
	$image0tmp_name=$_FILES['image0']['tmp_name'];
	
	//echo $img1;
	
	if($img0!="")
	   {
			 if(file_exists($dir.$img0))
			 {
				$img0= time(). '_'.$img0;
				
			 }
	
			 $fdir= $dir.$img0;
			 move_uploaded_file($image0tmp_name, $fdir);
	   }

  if(empty($_FILES['image1']['name'])){ $image1='';} else{$image1=$_FILES['image1']['name'];}
$dir="upload/";
$img1=$_FILES['image1']['name'];
$image1tmp_name=$_FILES['image1']['tmp_name'];

//echo $img1;

if($img1!="")
   {
         if(file_exists($dir.$img1))
         {
            $img1= time(). '_'.$img1;
            
         }

         $fdir= $dir.$img1;
         move_uploaded_file($image1tmp_name, $fdir);
   }

   if(empty($_FILES['image2']['name'])){ $image2='';} else{$image2=$_FILES['image2']['name'];}
$dir="upload/";
$img2=$_FILES['image2']['name'];
$image2tmp_name=$_FILES['image2']['tmp_name'];

//echo $img2;

if($img2!="")
   {
         if(file_exists($dir.$img2))
         {
            $img2= time(). '_'.$img2;
         }

         $fdir= $dir.$img2;
         move_uploaded_file($image2tmp_name, $fdir);
   }

   if(empty($_FILES['image3']['name'])){ $image3='';} else{$image3=$_FILES['image3']['name'];}
$dir="upload/";
$img3=$_FILES['image3']['name'];
$image3tmp_name=$_FILES['image3']['tmp_name'];

//echo $img3;

if($img3!="")
   {
         if(file_exists($dir.$img3))
         {
            $img3= time(). '_'.$img3;
         }

         $fdir= $dir.$img3;
         move_uploaded_file($image3tmp_name, $fdir);
   }

   if(empty($_FILES['image4']['name'])){ $image4='';} else{$image4=$_FILES['image4']['name'];}
$dir="upload/";
$img4=$_FILES['image4']['name'];
$image4tmp_name=$_FILES['image4']['tmp_name'];

//echo $img4;

if($img4!="")
   {
         if(file_exists($dir.$img4))
         {
            $img4= time(). '_'.$img4;
         }

         $fdir= $dir.$img4;
         move_uploaded_file($image4tmp_name, $fdir);
   }

$sql="INSERT INTO `product_image`(`pro_id`,`pro_img_png`, `pro_img_1`, `pro_img_2`, `pro_img_3`, `pro_img_4`) VALUES 
('$pro_id','$img0','$img1','$img2','$img3','$img4')";

//echo $sql;
if (mysqli_query($mysqli, $sql)) {

  $failed="uploaded successfully";

}else{
  $failed="failed to upload";
}
}
 
?>

<div class="float-middle">
<!--enctype means encrypt -->
<form enctype="multipart/form-data" action="" method="post" class="img">

<?php echo $failed; ?>
<input type="file" name="image0" accept="image/*">
<input type="file" name="image1" accept="image/*">
<input type="file" name="image2" accept="image/*">
<input type="file" name="image3" accept="image/*">
<input type="file" name="image4" accept="image/*">

<input type="hidden" name="proid" value="<?php echo $pro_id;?>">

<input type="submit" name="upload" value="upload" class="img-upload">


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