<?php
//some one login in we have to store the the data
session_start();
 include('connectdb.php');
if(isset($_SESSION['rid'])) {
}
else{header('location: sign-in.php');}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>billing pages</title>
    <link rel="stylesheet" href="css/bill.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 
    integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous"></script>

  <body>
  
  <header>
  <?php
	include 'Product.php';
	$product = new Product();	
	?>
      <a href="index.php" class="brand"> <img src="logo/feet2.png">Footprint</a>
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="index.php" class="menu-item">Home</a>
          <a href="http://localhost/footprint/accessories.php?gender=1" class="menu-item">Men</a>
          <a href="http://localhost/footprint/accessories.php?gender=2" class="menu-item">Women</a>
          <a href="http://localhost/footprint/accessories.php?gender=3" class="menu-item">Kids</a>
          <a href="accessories.php" class="menu-item">Footwear</a>
          <a href="about.php" class="menu-item">About us</a>
          <a href="#" id="search"><i class="fa fa-search"></i></a>
          <div class="search-form">
    <script src="java.js"></script>
            <form action="accessories.php" method="post" class="search-here">
                <input type="search" class="product searchBox" name="searchBox" id="searchBox" value="<?php 
		 if(isset($_POST['searchBox'])){
			 echo $search;
		  }
		  ?>" placeholder="Search brand here">
            </form>

        </div>       
        <a class="close"><i class="fa fa-times"></i></a>

        <!-- Jquery CDN -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#search').click(function(){
                // toggleClass is used just for testing
                $('.menu-item').addClass('hide-item') 
                $('.search-form').addClass('active')
                $('.close').addClass('active')
                $('#search').hide()
            })
            $('.close').click(function(){
                // toggleClass is used just for testing
                $('.menu-item').removeClass('hide-item') 
                $('.search-form').removeClass('active')
                $('.close').removeClass('active')
                $('#search').show()
            })
        })
    </script>
        
        <a href="cart.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        <a><i class="fas fa-user-alt" onclick="menuToggle();"></i></a>
        <?php
			 
			 if(isset($_SESSION['rid'])){


				$sql = "SELECT * FROM registration where r_id='$_SESSION[rid]'";
				$result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $username=$row["r_fname"];
			}
		}
    echo "<div class='menu'>
				    <ul>
							<li><a href='profile.php'><i class='fa fa-user'></i>  My Profile</a></li>
							<li><a href='logout.php'><i class='fa fa-sign-out'></i>  Logout</a></li>
					</ul>
				
						</div>
				<script>
				
					function menuToggle(){
							const toggleMenu = document.querySelector('.menu');
							toggleMenu.classList.toggle('active')
					}
				
				</script>";


  }
  else{
    echo "<a class='login-trigger' href='sign-in.php' data-target='#login' data-toggle='modal'>Login/Register</a>";
      }
	       ?>		  
        </div>
      </div>
    </header>

    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });

    </script>

<div class="container">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>

  <form class="no-design" action="insert.php" method="post">
  <?php 

if(isset($_SESSION['rid'])){
        
        $sql = "SELECT * FROM registration where r_id='$_SESSION[rid]' ";
        $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            $rname=$row["r_fname"];
            $remail=$row["r_email"];
            $rnumber=$row["r_number"];
            $raddress=$row["r_address"];
            $rcountry=$row["r_country"];
            $rstate=$row["r_states"];
            $rcity=$row["r_city"];
            $rpincode=$row["r_pincode"];
            $sname=$row["r_fname"];
            $snumber=$row["r_number"];
            $saddress=$row["r_address"];
          
           }
        } 
      }else {
           echo "invalid";}
      
?>


<?php

$msg="";
if(isset($_POST["submit"])){

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


   header('location: insert.php?edit='.$_SESSION['rid'].'');

   } else {
       $msg="Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);

?>


<?php 
include('connectdb.php');

$proid=$_GET['proid'];
$sizes=$_GET['qtyLabel'];

$sql = "SELECT * FROM product a, product_image b,category c, sizes d WHERE a.pro_id=b.pro_id && a.cat_id=c.cat_id && a.pro_id=d.pro_id && a.pro_id='$proid' LIMIT 1";
$success = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($success) > 0) {
    while($row = mysqli_fetch_assoc($success)) {

  echo '<div class="card-body">
            <!-- Single item -->
            <div class="rowb">
              <div class="image">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="admin/upload/' . $row["pro_img_png"] . '"
                    class="w-100" alt="Blue Jeans Jacket" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>
      
              <div class="description">
                <!-- Data -->
                <p><strong>' . $row["pro_name"] . '</strong></p>
                <p>' . $row["pro_detail"] . '</p>
                <p><strong>Size :' . $sizes . '</strong></p>
              </div>
   
              <div class="quantity-price">

                <!-- Quantity -->
                <div class="d-flex mb-4">
                      <label class="form-label" for="form1">Quantity</label>
                  <div class="form-outline">
                    <input id="form1" name="qty" value="1" min="1" max="' . $row['pro_quantity'] . '" type="number" class="form-control" />
                    </div>
                </div>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                    <strong>Price : ₹ ' . $row["pro_price"] . '</strong>
                </p>
                <!-- Price -->
              </div>
            </div> 

            <!-- Single item -->
              <hr class="my-4" />
 </div>';
    }
}else{
  echo 'invalid';
  }
  ?>

<div class="d-flex">
  <div class="no-div">
    <label>
      <span class="fname">Your Name <span class="required">*</span></span>
      <input type="text" name="name" value="<?php echo $rname; ?>">
    </label>
    <label>
      <span class="lname">Alternate Name</span>
      <input type="text" name="sname" value="<?php echo $sname; ?>">
    </label>
    <label>
      <span>Billing Address <span class="required">*</span></span>
      <textarea name="address"  placeholder="House number and street name" required><?php echo $raddress; ?></textarea>
    </label>
    <label>
      <span>Delivery Address <span class="required">*</span></span>
      <textarea name="saddress"  placeholder="House number and street name" required><?php echo $saddress; ?></textarea>
    </label>
    <label>
      <span>Country <span class="required">*</span></span>
      <select name="country">
          <option value="<?php if(isset($rcountry)){echo $rcountry; }?>"><?php if(isset($rcountry)){echo $rcountry; }?></option>
      </select>
    </label>
    
    <label>
      <span>City <span class="required">*</span></span>
      <input type="text" name="city" value="<?php echo $rcity; ?>">
    </label>
    <label>
      <span>State / Nation <span class="required">*</span></span>
      <input type="text" name="state" value="<?php echo $rstate; ?>"> 
    </label>
    <label>
      <span>Postcode / ZIP <span class="required">*</span></span>
      <input type="text" name="pin" value="<?php if(isset($rpincode)){echo $rpincode; } ?>"> 
    </label>
    <label>
      <span>Phone <span class="required">*</span></span>
      <input type="text" name="number" value="<?php echo $rnumber; ?>"> 
    </label>
    <label>
      <span>Alternate Number </span>
      <input type="text" name="snumber" value="<?php echo $snumber; ?>"> 
    </label>
    <label>
      <span>Email Address <span class="required">*</span></span>
      <input type="email" name="email" value="<?php echo $remail; ?>">
    </label>
    </div>

  <div class="Yorder">
    <table>

<?php 
include('connectdb.php');
$proid=$_GET['proid'];

$sql = "SELECT * FROM product a, product_image b,category c WHERE a.pro_id=b.pro_id && a.cat_id=c.cat_id && a.pro_id='$proid' LIMIT 1";
$success = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($success) > 0) {
    while($row = mysqli_fetch_assoc($success)) {
echo '<tr>
        <th colspan="2">Your order</th>
      </tr>
      <tr>
        <td>Product detail : ' .$row['pro_name'] . '  Select(Qty) : 1</td>
        <td>₹ ' .$row['pro_price'] . '</td>
      </tr>
      <tr>
        <td>Subtotal</td>
        <td>₹ ' .$row['pro_price'] . '</td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>Free shipping</td>
      </tr>';
    }

  }else{
  echo 'invalid';
  }
  ?>
    </table><br>
    <div>
      <input type="radio" name="dbt" value="cd" checked> Cash on Delivery
    </div>

    <input type="hidden" name="proid" value="<?php echo $proid;?>">
    <a href="#myModal" class="trigger-btn" data-toggle="modal">Place Order</a>

    <!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title">Awesome!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Your booking has been considered. Please confirm your order.</p>
			</div>
			<div class="modal-footer">
      <input type="submit" name="submit" value="Conform Order" >
			</div>
		</div>
	</div>
</div>  

  </div>
  </form><!-- Yorder -->
 </div>
</div>


<footer>
    <div class="row">
          <div class="col">
              <a class="l-link" href="index.php"><img src="logo/feet2.png"><p class="bname">footprint</p></a>
              <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. We now serve customers all over the world, and are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
          </div>
          <div class="col">
            <h3>Office <div class="underline"><span></span></div></h3>
            <p>ITPL road</p>
            <p>Whitefield, Bangalore</p>
            <p>Karnataka, PIN 560066, India</p>
            <p class="email-id">footprint@outlook.com</p>
            <h4>+91 - 9008689831</h4>
          </div>
          <div class="col">
            <h3>Links<div class="underline"><span></span></div></h3>
            <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="accessories.php">Accessories</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="accessories.php?gender=1">Men</a></li>
                  <li><a href="accessories.php?gender=2">Women</a></li>
            </ul>
          </div>
          <div class="col">
            <h3>Newsletter<div class="underline"><span></span></div></h3>
            <form class="send-msg">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <input type="email" placeholder="Enter your email id" required>
              <button type="submit"><i class="fas fa-arrow-right"></i></button>
            </form>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-instagram"></i>
            </div>
          </div>
    </div>
    <hr>
    <p class="copyright">Footprint @ 2022 - All Rights Reserved</p>
</footer>

  </body>
</html>