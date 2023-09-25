<?php
session_start();
 include('connectdb.php');
if(isset($_SESSION['rid'])) {

}
else{
	'';
}
if(isset($_POST['searchBox'])){
$search=$_POST['searchBox'];

}else{
	$search='';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accessories</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
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
          <a href="index.php" class="menu-item">Home</a>
          <a href="http://localhost/footprint/accessories.php?gender=1" class="menu-item">Men</a>
          <a href="http://localhost/footprint/accessories.php?gender=2" class="menu-item">Women</a>
          <a href="http://localhost/footprint/accessories.php?gender=3" class="menu-item">Kids</a>
          <a href="accessories.php" class="menu-item active">Footwear</a>
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
    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script src="search.js"></script>


<div class="containing">
	<form action="" method="post" class="filter">
	<div class="rowss">
	<div class="col-md-33">                    
		<div class="list-groupp">
			<h2><i class="fa fa-filter" aria-hidden="true"></i> Filter<input type="reset" class="product button" name="clear" value="clear" onClick="resetForm()"></h2>
			
			<script>
				function resetForm(){
	document.querySelector(".filter").reset();
}
			</script>

			<div class="list-group-item-checkbox">
			<input type="hidden" class="product gender" name="gender" id="gender" value="<?php 
			if(isset($_GET['gender'])){
				echo $_GET['gender']; 
			}else{
				echo '0';
			}
			?>" checked >
			
		</div>
		<div class="list-group-item-checkbox">
			<input type="hidden" class="product category" name="category" id="category" value="<?php 
			if(isset($_GET['catid'])){
				echo $_GET['catid']; 
			}else{
				echo '';
			}
			?>" checked >
			
		</div>
			<h3>Price  <i class="fas fa-rupee-sign    "></i></i></h3>	
			<div class="list-group-item">
				<input id="priceSlider" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="5000" />
				<div class="priceRange">0 - 7000</div>
				<input type="hidden" id="minPrice" value="0" />
				<input type="hidden" id="maxPrice" value="7000" />                  
			</div>			
		</div>
		<div class="list-group">
			<h3>Category    <i class="fa fa-align-center" aria-hidden="true"></i></i></h3>
			<?php		
			$catid = $product->getCat();
			foreach($catid as $catDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="radio" class="product catid" value="<?php echo $catDetails['cat_id']; ?>" id="cat<?php echo $catDetails['cat_id']; ?>" name="cat"> <?php echo $catDetails['cat_name']; ?> </label>
			</div>
			<?php    
			}
			?>
		</div>        
		<div class="list-group">
			<h3>Brand  <i class="fa fa-ellipsis-h" aria-hidden="true"></i></h3>
			<div class="brandSection">
				<?php
				$brand = $product->getBrand();
				foreach($brand as $brandDetails){	
				?>
				<div class="list-group-item checkbox">
				<label><input type="checkbox" class="product brand" value="<?php echo $brandDetails["brand_id"]; ?>"  > <?php echo $brandDetails["brand_name"]; ?></label>
				</div>
				<?php }	?>
			</div>
		</div>
		
	</div>
	<div class="col-md-99">
	 <br />
    <div class = "productss">
				<div class = "containeri">

	        
					<div class="rox searchResult">
                <div class = "productItems">
              </div>
					</div>
				
        </div>
	  </div>
	</div>
    </div>	
  </form>
</div>	

<!--footer of the page -->
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