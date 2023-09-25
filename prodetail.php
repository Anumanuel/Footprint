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
    <title>product detail</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link hret="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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
$proid = $_GET['proid'];
?>
<form action="cart.php?action=add&proid=<?php echo $proid; ?>" method="post">   
<?php 
        
        $sql = "SELECT * FROM product a, product_image b,category c WHERE a.pro_id=b.pro_id && a.cat_id=c.cat_id && a.pro_id='$proid' LIMIT 1";
        $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
                   $proname=$row["pro_name"];
              $proprice=$row["pro_price"];
              $proquantity=$row["pro_quantity"];
              $prodetail=$row["pro_detail"];
              $prodetaillong=$row['pro_detail_long'];
              $procategory=$row['cat_name'];
              $pro_img_png=$row['pro_img_png'];
              $pro_img_1=$row['pro_img_1'];
              $pro_img_2=$row['pro_img_2'];
              $pro_img_3=$row['pro_img_3'];
              $pro_img_4=$row['pro_img_4'];
           }
        } else {
           echo "invalid";
        }
?>

<div class = "card-wrapper">
  <div class = "card">
    <!-- card left -->
    <?php
$sql=mysqli_query($mysqli,"SELECT * FROM product_image WHERE pro_id='$proid' LIMIT 1")or die(mysqli_error($mysqli));
while($rows=mysqli_fetch_array($sql))
{
 ?>	
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
        <img src = "admin\upload\<?php echo $rows['pro_img_1'] ?>" alt = "shoe image">
          <img src = "admin\upload\<?php echo $rows['pro_img_2'] ?>" alt = "shoe image">
          <img src = "admin\upload\<?php echo $rows['pro_img_3'] ?>" alt = "shoe image">
          <img src = "admin\upload\<?php echo $rows['pro_img_4'] ?>" alt = "shoe image">
        </div>
      </div>
      <div class = "img-select">
        <div class = "img-item">
          <a href = "#" data-id = "1">
          <img src = "admin\upload\<?php echo $rows['pro_img_1'] ?>" alt = "shoe image">          
        </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "2">
          <img src = "admin\upload\<?php echo $rows['pro_img_2'] ?>" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "3">
          <img src = "admin\upload\<?php echo $rows['pro_img_3'] ?>" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "4">
          <img src = "admin\upload\<?php echo $rows['pro_img_4'] ?>" alt = "shoe image">
          </a>
        </div>
      </div>
    </div><?php } ?>
    <!-- card right -->
    <div class = "product-content">
    <h2 class = "product-title"><?php echo $proname; ?></h2>
      <a href = "#" class = "product-link">visit <?php echo $procategory; ?> category</a>
      <div class = "product-rating">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star-half-alt"></i>
        <span>4.7(21)</span>
      </div>

      <div class = "product-price">
      <p class = "new-price">Price: <span>₹<?php echo $proprice; ?></span></p>
      </div>

      <div class = "product-detail">
        <h2>about this item: </h2>
        <p><?php echo $prodetail; ?></p>
        <p class="pro_detail_disc"><?php echo $prodetaillong;?></p>
      </div>

             <?php 
                $sql = "SELECT * FROM sizes WHERE pro_id='$proid' LIMIT 1";
                $result = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($result) > 0) {
                   while($row = mysqli_fetch_assoc($result)) {
                           $size7=$row["size_7"];
                           $size8=$row["size_8"];
                           $size9=$row["size_9"];
                           $size10=$row["size_10"];
                           $size11=$row["size_11"];
                     
                   }
                } else {
                   echo "invalid";
                }

             ?>

      <div class="sq-wrapper">
          <div class="sizes">
						<h3>Size :</h3>
						<p class="selectSizeError">Please select a size to proceed</p>

          <?php
            if($size7==0){
              echo '';
            } else{
              echo '<label for="xs">
              <input type="radio" id="myRadio" name="size" value="' . $size7. '" max="7" onclick="myFunction()">
              <span id="btn" onclick="myFunction()">7</span>
              </label>';
            }
					?>

          <?php
            if($size8==0){
              echo '';
            } else{
              echo '<label for="xs">
              <input type="radio" id="myRadio1" name="size" value="' . $size8. '" max="8" onclick="myFunction1()">
              <span id="btn" onclick="myFunction1()">8</span>
              </label>';
            }
					?>


           <?php
            if($size9==0){
              echo '';
            } else{
              echo '<label for="xs">
              <input type="radio" id="myRadio2" name="size" value="' . $size9. '" max="9" onclick="myFunction2()">
              <span id="btn" onclick="myFunction2()">9</span>
              </label>';
            }
					?>

					<?php
            if($size10==0){
              echo '';
            } else{
              echo '<label for="xs">
              <input type="radio" id="myRadio3" name="size" value="' . $size10. '" max="10" onclick="myFunction3()">
              <span id="btn" onclick="myFunction3()">10</span>
              </label>';
            }
					?>

					<?php
            if($size11==0){
              echo '';
            } else{
              echo '<label for="xs">
              <input type="radio" id="myRadio4" name="size" value="' . $size11. '" max="11" onclick="myFunction4()">
              <span id="btn" onclick="myFunction4()">11</span>
              </label>';
            }
					?>

					</div>
        </div>

<!-- script for changing color by clicking radio button -->

<script>
var spanTag = document.getElementsByTagName("span");
for (var i = 0; i < spanTag.length; i++) {
    if (spanTag[i].tagName == "SPAN" || spanTag[i].tagName == "span") {
         if (spanTag[i].addEventListener) {
            spanTag[i].addEventListener('click', callback,false);
         } 
         else if (spanTag[i].attachEvent) {
            spanTag[i].attachEvent('on' + 'click',callback);
         }
    }
}
function callback(e) {
    var spans = document.getElementsByTagName("span");
    for(var i = 0; i < spans.length; i++){
        spans[i].style.backgroundColor = '';
        spans[i].style.color = '';
        spans[i].style.borderColor = '';
    }
    
    e = e || window.event;
    var target = e.target || e.srcElement;
    target.style.backgroundColor = "#333";
    target.style.color = "white";
    target.style.borderColor = "#333";
    e.stopPropagation();
}
</script>



      <script src="search.js"></script>


      <div class = "purchase-info">
      <input type = "number" name="qty" value="1" max="" min="1" id="qty" onClick="sendQty">
      <input type = "hidden" name="qtyLabel" id="qtyLabel" value="">

        <script>
function myFunction() {
  var x = document.getElementById("myRadio").value;
  document.getElementById("qty").max = x;
  var y = document.getElementById("myRadio").max;
  document.getElementById("qtyLabel").value = y;
}
</script>

<script>
function myFunction1() {
  var x = document.getElementById("myRadio1").value;
  document.getElementById("qty").max = x;
  var y = document.getElementById("myRadio1").max;
  document.getElementById("qtyLabel").value = y;
}
</script>

<script>
function myFunction2() {
  var x = document.getElementById("myRadio2").value;
  document.getElementById("qty").max = x;
  var y = document.getElementById("myRadio2").max;
  document.getElementById("qtyLabel").value = y;
}
</script>

<script>
function myFunction3() {
  var x = document.getElementById("myRadio3").value;
  document.getElementById("qty").max = x;
  var y = document.getElementById("myRadio3").max;
  document.getElementById("qtyLabel").value = y;
}
</script>

<script>
function myFunction4() {
  var x = document.getElementById("myRadio4").value;
  document.getElementById("qty").max = x;
  var y = document.getElementById("myRadio4").max;
  document.getElementById("qtyLabel").value = y;
}
</script>

        <input type="hidden" name="proid" value="<?php echo $proid;?>">
      <?php
          if(isset($_SESSION['rid'])){
          echo '<a href="http://localhost/footprint/billing.php?proid=' . $proid . '" id="buyNow"><button type = "button" class = "btn">
          Buy now <i class = "fas fa-shopping-cart"></i>
        </button></a>
        <input type="submit" class = "btn" name="Addtocart" value="Add to bag" id="addToCart">';
      }else{
        echo '<div class="plz"><P>Please, <a href="login.php">Login</a> in order to order any product</P></div>';
           }
   ?> 
      </div>

              
      <script src="../js/jquery-3.3.1.min.js"></script>
          <script type="text/javascript">
		$(document).ready(function(){
			$('.thumb a').mouseover(function(e){
				e.preventDefault();
				$('.imgBox img').attr("src", $(this).attr("href"));
			});
		});
		
		// Script For Select-Size 
		function toggleClass(el) {
			var kids = document.getElementById('select_size').children;
			for (var i = 0; i < kids.length; i++) {
				kids[i].className = "size";
			}
			el.className = "selected";
		}
		
		// Script to check the Size is Selected or not
		$(document).ready(function(){
			$("#addToCart").click(function(e){
				if(!$('span').onClick()){
					$('p.selectSizeError').show();
					$('.sizes label span').css("animation", "shake 0.3s linear");
					e.preventDefault();
				}
				else {
					return true;
				}
			});
			$("#buyNow").click(function(e){
				if(!$('span').onClick()){
					$('p.selectSizeError').show();
					$('.sizes label span').css("animation", "shake 0.3s linear");
					e.preventDefault();
				}
				else {
					return true;
				}
			});
		});
	</script>


      <div class = "social-links">
        <p>Share At: </p>
        <a href = "#">
          <i class = "fab fa-facebook-f"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-twitter"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-instagram"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-whatsapp"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-pinterest"></i>
        </a>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
</script>

<!-- subjects section ends -->
<div class="text-annio">
<article>
  <h1 class="gradeoo">Related Products</h1>
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