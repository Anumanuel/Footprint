<?php
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
    <title>invoice</title>
    <link rel="stylesheet" href="css/invoice.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

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

<?php 
$invoiceid = $_GET['ino'];

        
        $sql = "SELECT * FROM orders a, orders_list b WHERE a.unique_id=b.unique_id && a.unique_id='$invoiceid'";
        $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
              $oid=$row["order_id"];
              $rid=$row["r_id"];
              $proid=$row["pro_id"];
              $rname=$row["b_name"];
              $remail=$row["b_email"];
              $rnumber=$row["b_number"];
              $raddress=$row["b_address"];
              $rcountry=$row["b_country"];
              $rstate=$row["b_state"];
              $rcity=$row["b_city"];
              $rpincode=$row["b_pin"];
              $sname=$row["s_name"];
              $snumber=$row["s_number"];
              $saddress=$row["s_address"];
              $ostatus=$row["order_status"];
              $proquantity=$row["pro_qty"];
              $odate=$row["order_date"];
              
           }
        } else {
           echo "invalid";
        }
?>

<div class = "containeri">
<section class="thanks">

<button type="button" class="print" onclick="window.print();">
            <p>print invoice</p>
            </button>
        <div class="user-thanks">
            <h2>Thank you for your order</h2>
            <p>Your order id is: #<?php echo $invoiceid; ?></p>
            <p>Your order has been successfully processed! You will receive an order confirmation email to <b><?php echo $remail; ?></b> with details of your order.</p>
            <p>Thanks for shopping with us :)</p>

            
        </div>

</section>
<section class="order-details">

        <div class="edit-pink"> <p>Order details</p></div>
            <div class="c-order-add">
                <div class="company-add-left">
                    <p>Footprint<br>Office : ITPL road<br>Whitefield, Bangalore<br>
                    Karnataka, PIN 560066, India<br>phone: +91 - 9008689831<br>email : <span>footprint@outlook.com</span>
                    </p>
                </div>

                <div class="company-add-right">
                    <p><b>order id</b>: #<?php echo $invoiceid; ?><br><b>invoice</b>: Footprint19-U#<?php echo $invoiceid; ?><br><b>order status</b>: processing<br>
                    <b>gst no</b>: 6539-7643-9038<br>
                    </p>
                </div>
            </div>
        
</section>

<section class="bill-address-section">
            <div class="bill-address-full">

                <div class="bill-address-leftside">
                    <p class="pink-heading">Billing address</p>
                    <p class="add-data-lft"><?php echo $rname; ?><br><?php echo $remail; ?><br><?php echo $raddress; ?><br><?php echo $rcity; ?> (<?php echo $rpincode; ?>)<br>
                    <?php echo $rstate; ?>, <?php echo $rcountry; ?><br>phone: +91-<?php echo $rnumber; ?><br>
                    </p>
                </div>

                <div class="shift-address-rightside">
                    <p class="pink-heading">Shipping address</p>
                    <p class="add-data-ryt"><?php echo $sname; ?><br><?php echo $remail; ?><br><?php echo $saddress; ?><br><?php echo $rcity; ?> (<?php echo $rpincode; ?>)<br>
                    <?php echo $rstate; ?>, <?php echo $rcountry; ?><br>phone: +91-<?php echo $snumber; ?><br>
                    </p>
                </div>

            </div>

<div class="card-body">
            <?php 
include('connectdb.php');

$total_quantity = 0;
    $total_price = 0;

$sql = "SELECT * FROM orders_list a,product b,product_image c, category d WHERE a.pro_id=b.pro_id && b.pro_id=c.pro_id && b.cat_id=d.cat_id && a.unique_id='$invoiceid'";
$success = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($success) > 0) {
    
    while($row = mysqli_fetch_assoc($success)) {
        $proprice=$row["pro_price"];
        $proqty=$row["pro_qty"];
echo '
<!-- Single item -->
<div class="rowb">
  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
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

  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
    <!-- Data -->
    <p><strong>' . $row["pro_name"] . '</strong></p>
    <p>' . $row["pro_detail"] . '</p>
    <p>Size : </p>
  </div>

  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

    <!-- Quantity -->
    <div class="d-flex mb-4">
          <label class="form-label" for="form1">Quantity : ' . $row['pro_qty'] . '</label>
    </div>
    <!-- Quantity -->

    <!-- Price -->
    <p class="text-start text-md-center">
        <strong>Price : ₹ ' . $row["pro_price"]*$row['pro_qty'] . '</strong>
    </p>
    <!-- Price -->
  </div>
</div> 

<!-- Single item -->
  <hr class="my-4" />';
$total_quantity += $row["pro_qty"];
				$total_price += ($row["pro_price"]*$row["pro_qty"]);
}
}else{
echo 'invalid';
}
?></div><div class="grand-total" align="right"> <p>grand total: ₹ <?php echo $total_price;?></p></div>

</section></div>


      
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