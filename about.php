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
    <title>about us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
          <a href="about.php" class="menu-item active">About us</a>
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

<!-- Start of About Section -->
<div class="about-showcase" style="background-image:url(img/team.jpg)">
		<h1>Get to know Footprint</h1>
	</div>
	<div class="about-wrapper">
		<p class="highlight">Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers.</p>
		<div class="about-info">
			<div class="info">
				<span><i class="fas fa-box"></i></span>
				<h1>500 +</h1>
				<p>Products</p>
			</div>
			<div class="info">
				<span><i class="fas fa-store"></i></span>
				<h1>300 +</h1>
				<p>Sellers</p>
			</div>
			<div class="info">
				<span><i class="fas fa-globe"></i></span>
				<h1>1000 +</h1>
				<p>Cities</p>
			</div>
		</div>
		<div class="about-content">
			<p>Welcome to Footprint, your number one source for all things [shoes, slipper, casual etc.]. We're dedicated to giving you the very best of product, with a focus on dependability, customer service and uniqueness. <span>Founded in 2018 by Anush , Footprint has come a long way from its beginnings in a home office. When Footprint first started out, his passion for providing the best equipment for his fellow musicians drove him to do intense research, and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over the world, and are thrilled to be a part of the eco-friendly wing of the fashion industry.</span></p>
			<p>We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
			<p>Sincerely,<span>Anush, Founder of Footprint</span></p>
		</div>
	</div>
	<div class="our-services">
		<div class="services">
			<span><i class="fas fa-truck"></i></span>
			<h1>Cash on delivery</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  A Ut enim ad minim veniam, quis nostrud exercitation an ullamco laboris nisi ut aliquip.</p>
		</div>
		<div class="services">
			<span><i class="fas fa-headset"></i></span>
			<h1>24/7 support</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  A Ut enim ad minim veniam, quis nostrud exercitation an ullamco laboris nisi ut aliquip.</p>
		</div>
		<div class="services">
			<span><i class="far fa-credit-card"></i></span>
			<h1>payment process</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  A Ut enim ad minim veniam, quis nostrud exercitation an ullamco laboris nisi ut aliquip.</p>
		</div>
	</div>
	<!-- End of About Section -->
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