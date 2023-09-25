<?php
//some one login in we have to store the the data
session_start();
 include('connectdb.php');
if(isset($_SESSION['lockpin'])) {

}
else{'';}

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


$pro_id=$_GET["proid"];

if(isset($pro_id)){
        
  $sql = "SELECT * FROM product a,category b WHERE a.pro_id='$pro_id' AND a.pro_status='1'";
  $result = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
      $pro_name=$row["pro_name"];
      $pro_gender=$row["pro_gender"];
      $pro_detail=$row["pro_detail"];
      $pro_detail_long=$row["pro_detail_long"];
      $pro_price=$row["pro_price"];
      $cat_id=$row["cat_id"];
      $pro_quantity=$row["pro_quantity"];
      $pro_status=$row["pro_status"];
      $cat_name=$row["cat_name"];
      
     }
  } 
}else {
     echo "invalid";}
     ?>

     <?php 

$msg="";
            if (isset($_POST["submit"])) {
              # code...
              
            $pro_name=$_POST["name"];
            $pro_detail=$_POST["detail"];
            $pro_detail_long=$_POST["desc"];
            $pro_price=$_POST["price"];
            $cat_id=$_POST["category"];
            $pro_quantity=$_POST["quantity"];
            $pro_status=$_POST["status"];

            //select * means selecting everything
            //&& means and
            $update = "UPDATE product SET pro_name='".$pro_name."' , pro_detail='".$pro_detail."' , pro_detail_long='".$pro_detail_long."' , pro_price='".$pro_price."' , 
            cat_id='".$cat_id."' , pro_quantity='".$pro_quantity."' , pro_status='".$pro_status."' WHERE pro_id='".$pro_id."'";
               
               if (mysqli_query($mysqli, $update)) {
                  $msg= "Record updated successfully <a href='http://localhost/footprint/prodetail.php?proid=$pro_id' target='_blank'>check now</a>";
                
                //  header('location: http://localhost/zytrio/prodetail.php?proid='.$pro_id.'');
               } else {
                   $msg="Error updating record: " . mysqli_error($mysqli);
               }
               mysqli_close($mysqli);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>edit product</title>
    <!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
			<li>
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
			<li class="active">
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
							<a class="active" href="edit-product.php">edit</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
	
  <!--body part starts here-->
  <h1 class="title">edit product</h1>
  
<form action="" method="post" class="entry_table_a">

      <label>product name</label>
<input type="name" name="name" class="edit-name" value="<?php echo $pro_name;?>">

<label>product detail</label>

<textarea type="text" name="detail" class="edit-detail" value=""><?php echo $pro_detail;?></textarea>

<label>product description</label>
<textarea type="text" name="desc" class="edit-desc" value=""><?php echo $pro_detail_long;?></textarea>

<label>product price</label>
<input type="text" name="price" class="edit-price" value="<?php echo $pro_price; ?>">

<label>product category</label>
<select name="category" class="edit-cat">
  <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>

<?php 

$sql=mysqli_query($mysqli,"SELECT * FROM category WHERE cat_status='1' " );
while($rows=mysqli_fetch_array($sql))
{
    
?>
  
  <option value="<?php echo $rows["cat_id"];?>"><?php echo $rows["cat_name"];?></option>  
              
 
<?php } ?>
 </select>

 <label>product quantity</label>
<input type="number" name="quantity" class="edit-quantity" value="<?php echo $pro_quantity; ?>">

<label>product status</label>
<select name="status" class="edit-status">
<option value="<?php echo $pro_status;?>"><?php echo $pro_status;?></option>
  <option value="<?php echo $pro_status;?>">0</option>
  <option value="<?php echo $pro_status;?>">1</option>
</select>

<input type="submit" name="submit" class="edit-submit" value="edit product">
<?php echo $msg; ?>
</form>

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