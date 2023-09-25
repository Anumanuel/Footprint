<?php 
include('connectdb.php');
?>

<html lang="eng">
<head>
<title>user order</title>
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
			<li class="active">
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
							<a class="active" href="userorder.php">Orders</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
	
<!--body part starts here-->

<h1>Customer order details</h1>
<table>
    <!-- 'th' table heading 
    'td' table data
    'tr' table row
    'tbody' table body -->
<th>Customer Id</th>
<th>order id</th>
<th>invoice number</th>
<th>order date</th>
<th>order status</th>

<tbody>

<?php 

$sql = "SELECT * FROM orders ";
$result=$mysqli->query($sql);
if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                echo '<tr><td>' . $row["r_id"] . '</td>';
                echo '<td>' . $row["order_id"] . '</td>';
                echo '<td>' . $row["unique_id"] . '</td>';
                echo '<td>' . $row["order_date"] . '</td>';
                if($row["order_status"]==0){
                    $ostatus='pending';
                    echo '<td> <a href=orderstatus.php?oid='.$row['order_id'].'&&status=' .$ostatus. '>' .$ostatus. '</a></td>';
                }else if($row["order_status"]==1){
                    $ostatus='processing';
                    echo '<td><a href=orderstatus.php?oid='.$row['order_id'].'&&status=' .$ostatus. '>' .$ostatus. '</a> </td>';
                }else if($row["order_status"]==2){
                    $ostatus='compleated';
                    echo '<td><a href=orderstatus.php?oid='.$row['order_id'].'&&status=' .$ostatus. '>' .$ostatus. '</a> </td>';
                }
                echo '</tr>';

            }
}
else{
    echo "no data";

}
$mysqli->close();

?>

</tbody>

</table>

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