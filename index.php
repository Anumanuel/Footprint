<?php
//some one login in we have to store the the data
session_start();
 include('connectdb.php');
if(isset($_SESSION['rid'])) {
}
else{'';}

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$failed="";

if (isset($_POST["login"])) {
	# code...
$email=$_POST["email"];
$password=$_POST["password"];
//select * means selecting everything
//&& means and
$sql = "SELECT * FROM registration where r_email='$email' && r_password='$password'";
         $result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $_SESSION["rid"]=$row["r_id"];
            header('location: index.php');
            }
         } 
if (mysqli_query($mysqli, $sql)) {
             $failed="<div class='warndiv'><p class='warnlogin'><i class='fas fa-skull-crossbones'></i>Invalid e-mail/password</p></div>";
            } 
            $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footprint landing page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.scss">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="script.js"></script>
  </head>
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
          <a href="index.php" class="menu-item active">Home</a>
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


        <!-- <script>
          var header =
          document.getElementsByClassName("navigation-item");
          var btns =
          header.getElementsByClassName("menu-item")
          for (var i=0; i < btns.length; i++){
            links(i).addEventListener("click",
            function() {
              var current =
              document.getElementsByClassName("active");
              current[0].className =
              current[0].className.replace("active", "");
              this.className += "active";
            });

          }
        </script> -->

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
    echo "<a class='login-trigger' href='sign-in.php'>Login/Register</a>";
      }
	       ?>		  
        </div>
      </div>
    </header>

    <section class="home">
      <video class="video-slide active" src="navvideo/4.mp4" autoplay muted loop></video>
      <video class="video-slide" src="navvideo/8.mp4" autoplay muted loop></video>
      <video class="video-slide" src="navvideo/3.mp4" autoplay muted loop></video>
      <video class="video-slide" src="navvideo/2.mp4" autoplay muted loop></video>
      <video class="video-slide" src="navvideo/6.mp4" autoplay muted loop></video>
      <video class="video-slide" src="navvideo/1.mp4" autoplay muted loop></video>
      <div class="content active">
        <h1>Welcome To<br>Footprint</h1>
        <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. And we are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
        <a href="about.php">Read More</a>
      </div>
      <div class="content">
        <h1>Welcome To<br>Footprint</h1>
        <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. And we Are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
        <a href="about.php">Read More</a>
      </div>
      <div class="content">
        <h1>Welcomo To<br>Footprint</h1>
        <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. And we are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
        <a href="about.php">Read More</a>
      </div>
      <div class="content">
        <h1>Welcome To<br>Footprint</h1>
        <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. And we are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
        <a href="about.php">Read More</a>
      </div>
      <div class="content">
        <h1>Welcome To<br>Footprint</h1>
        <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. And we are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
        <a href="about.php">Read More</a>
      </div>
      <div class="content">
        <h1>Welcome To<br>Footprint</h1>
        <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. And we are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
        <a href="about.php">Read More</a>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
      <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div>
    </section>

    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });

    //Javacript for video slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    const contents = document.querySelectorAll(".content");

    var sliderNav = function(manual){
      btns.forEach((btn) => {
        btn.classList.remove("active");
      });

      slides.forEach((slide) => {
        slide.classList.remove("active");
      });

      contents.forEach((content) => {
        content.classList.remove("active");
      });

      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        sliderNav(i);
      });
    });
    </script>

<!--body part start from here all the design begin here-->
<section class="body-part-design">

    <div class="heading" style="display: flex; margin-top: 20px;">
			<h1>Today's Deals</h1>
			<div class="countdown"></div>
		</div>
<script>
    // Script For Countdown Timer
		var countdown = document.querySelector(".countdown");

		// Get The Last Date
		var currentYear = new Date().getUTCFullYear();
		var currentMonth = new Date().getMonth();
		var currentDate = new Date().getDate();

		var lastDate = new Date(currentYear, currentMonth, currentDate, 24, 0, 0, 0).getTime();

		// Update every second
		var intvl = setInterval(function(){
		  // Get Present Date
		  var now = new Date().getTime();

		  // Distance from now to the lastDate
		  var distance = lastDate - now;

		  // Time Calculation
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		  
		  // Checking single digit numbers and adding '0' before the number
		  if(hours < 10){
			hours = '0' + hours;
		  }
		  if(mins < 10){
			mins = '0' + mins;
		  }
		  if(seconds < 10){
			seconds = '0' + seconds;
		  }
		  
		  // Display Results
		  countdown.innerHTML = `
			<div>${hours}<span>:</span></div>
			<div>${mins}<span>:</span></div>
			<div>${seconds}</div>
			<p>Left</p>
		  `;
		  
		  if(distance < 0){
			lastDate = lastDate + 86400000; // Adding 1 day to the 'lastDate' repeat the Timer.
		  }
		  
		}, 1000);
</script>


<div class="text-annii">
<article>
  <h1 class="gradee">What Are You Looking For?</h1>
</article>
  </div>
<div class="body">
  <?php
include('connectdb.php');

$sql=mysqli_query($mysqli,"SELECT * FROM category")or die(mysqli_error($mysqli));
while($rows=mysqli_fetch_array($sql))
{
 ?>	
<a href="accessories.php?catid=<?php echo $rows['cat_id']?>"><div class="person">
      <div class="containerr">
        <div class="container-inner">
          <img
            class="circlee"
            src="img/<?php echo $rows['cat_img_back'] ?>"/>
          <img
            class="img img1"
            src="img/<?php echo $rows['cat_img'] ?>"/>
        </div>
      </div>
      <div class="divider"></div>
      <div class="name"><?php echo $rows['cat_name'] ?></div>
      <div class="titlee">Shop Now</div>
    </div></a><?php } ?>
</div>
<!-- subjects section ends -->
<div class="text-anni">
<article>
  <h1 class="grade">Trending Footwear Collections For You</h1>
  <p class="wow">when I get tired of 'Shopping' I sit down and try on 'Shoes..' </p>
</article>
  </div>
  </section>

  <div class = "productss">
            <div class = "containeri">
                <div class = "productItems">
                     <!-- single product -->
                <?php
                    $sql=mysqli_query($mysqli,"SELECT * FROM product a,product_image b,category c,brands d WHERE a.pro_id=b.pro_id && a.cat_id=c.cat_id && a.brand_id=d.brand_id LIMIT 8")or die(mysqli_error($mysqli));
                    while($rows=mysqli_fetch_array($sql))
                    {
                echo '<div class = "productx"><a href="prodetail.php?proid='. $rows['pro_id'] .'">
                <div class = "product-contentx">
                    <div class = "product-img">
                        <img src = "admin/upload/'. $rows['pro_img_png'] .'" alt = "product image">
                    </div>
                    <div class = "product-btns">
                        <button type = "button" class = "btn-cart"> view product
                            <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </button>
                    </div>
                </div>

                <div class = "product-info">
                    <div class = "product-info-top">
                        <h2 class = "sm-title">'. $rows['pro_name'] .'</h2>
                    </div>
                    <a href = "#" class = "product-name">'. $rows['pro_detail'] .' </a>
                    <p class = "product-price">'. $rows['brand_name'].'</p>
                    <p class = "product-price">₹'. $rows['pro_price'] .'</p>
                </div>

                <div class = "off-info">
                    <h2 class = "sm-title">'. $rows['pro_quantity'].'% off</h2>
                </div></a></div>'; } ?>
                    
                    <!-- end of single product -->
                </div>
            </div>
        </div>

        <div class = "product-collection">
            <div class = "containeri">
                <div class = "product-collection-wrapper">
                    <!-- product col left -->
                    <div class = "product-col-left flex">
                        <div class = "product-col-content">
                            <h2 class = "sm-title">men's shoes </h2>
                            <h2 class = "md-title">men's collection </h2>
                            <p class = "text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                            <button type = "button" class = "btn-dark" onclick="window.location.href='accessories.php?gender=1';">Shop now</button>
                        </div>
                    </div>

                    <!-- product col right -->
                    <div class = "product-col-right">
                        <div class = "product-col-r-top flex">
                            <div class = "product-col-content">
                                <h2 class = "sm-title">women's footwears</h2>
                                <h2 class = "md-title">women's collection </h2>
                                <p class = "text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                                <button type = "button" class = "btn-dark" onclick="window.location.href='accessories.php?gender=2';">Shop now</button>
                            </div>
                        </div>

                        <div class = "product-col-r-bottom">
                            <!-- left -->
                            <div class = "flex">
                                <div class = "product-col-content">
                                    <h2 class = "sm-title">summer sale </h2>
                                    <h2 class = "md-title">Extra 50% Off </h2>
                                    <p class = "text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                                    <button type = "button" class = "btn-dark" onclick="window.location.href='accessories.php';">Shop now</button>
                                </div>
                            </div>
                            <!-- right -->
                            <div class = "flex">
                                <div class = "product-col-content">
                                    <h2 class = "sm-title">shoes </h2>
                                    <h2 class = "md-title">best sellers </h2>
                                    <p class = "text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                                    <button type = "button" class = "btn-dark" onclick="window.location.href='accessories.php';">Shop now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- below brand section -->
        <div class="text-anniii">
<article>
  <h1 class="gradee">Top Brands</h1>
</article>
  </div>
 
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<section class="hero-section">
  <div class="card-grid">
    <a class="card" href="http://localhost/footprint/accessories.php?brands=1">
      <div class="card__background" style="background-image: url(img/web-183282273.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Nike</h3>
      </div>
    </a>
    <a class="card" href="http://localhost/footprint/accessories.php?brands=2">
      <div class="card__background" style="background-image: url(img/Adidas2.jpeg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Adidas</h3>
      </div>
    </a>
    <a class="card" href="http://localhost/footprint/accessories.php?brands=3">
      <div class="card__background" style="background-image: url(img/Puma_Lifestyle_cdypf5.webp)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Puma</h3>
      </div>
    </li>
    <a class="card" href="http://localhost/footprint/accessories.php?brandid=4">
      <div class="card__background" style="background-image: url(img/1d83a6108315441.Y3JvcCw3MjcsNTY4LDE3NiwyNTU.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Sparx</h3>
      </div>
    </a>
  <div>
</section>

<section class="application-cta-get-started section">
                    <div class="inner">
                        <h2 class="application-cta-get-started-title">1,000+ customers already using Footprint<br> Join us</h2>

                        <div class="application-cta-get-started-text">Get the footwears for exclusive price from 8+ most expensive brands.<br> No credit card. Join us today!</div>

                        <div class="application-cta-get-started-actions">
                            <a class="button-56 button-yellow button" href="sign-in.php" target="_blank" rel="nofollow noreferrer noopener">Get started</a>

                            <div class="application-cta-get-started-actions-bonus text-18">Get 20% discount now!</div>
                        </div>
                    </div>

                    <div class="application-cta-get-started-circle-1"></div>
                    <div class="application-cta-get-started-circle-2"></div>
                    <div class="application-cta-get-started-circle-3"></div>
                    <div class="application-cta-get-started-circle-4"></div>
                </section>


                
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



