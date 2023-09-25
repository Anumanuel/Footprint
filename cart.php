<?php
//some one login in we have to store the the data
session_start();
 include('connectdb.php');
if(isset($_SESSION['rid'])) {
}
else{header('location: sign-in.php');}
?>
<?php
// var_dump($_SESSION);
//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
// echo $_POST["qty"];
    if(!empty($_POST["qty"])) {
			$proid=$_GET["proid"];
      echo $_POST["qtyLabel"];
          $result=mysqli_query($mysqli,"SELECT * FROM product a, product_image b, category c, sizes d WHERE a.pro_id=b.pro_id && a.cat_id=c.cat_id && a.pro_id=d.pro_id && a.pro_id='$proid'");
	          while($productByCode=mysqli_fetch_array($result)){
              $itemArray = array($productByCode["pro_id"]=>array('pro_name'=>$productByCode["pro_name"], 'pro_id'=>$productByCode["pro_id"], 'pro_quantity'=>$_POST["qty"], 'pro_size'=>$_POST["qtyLabel"], 'pro_max_quantity'=>$productByCode["pro_quantity"], 'pro_price'=>$productByCode["pro_price"], 'pro_detail'=>$productByCode["pro_detail"], 'pro_img_1'=>$productByCode["pro_img_1"], 'cat_name'=>$productByCode["cat_name"]));
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode["pro_id"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode["pro_id"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["pro_quantity"])) {
                                        $_SESSION["cart_item"][$k]["pro_quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["pro_quantity"] += $_POST["qty"];
                                    $_SESSION["cart_item"][$k]["pro_size"] += $_POST["qtyLabel"];
                                    $_SESSION["cart_item"][$k]["pro_img_1"];
                                    $_SESSION["cart_item"][$k]["cat_name"];
                                }
                        }
				                      } else {
					                      $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				                      }
			                      }  else {
			                      	$_SESSION["cart_item"] = $itemArray;
			                          }
		                        }
	                          }
	                        break;
  // code for removing product from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["proid"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

<!-- 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        
  </head>
  <body>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
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
        
        <a href="cart.php"><i class="fa fa-shopping-bag active" aria-hidden="true"></i></a>
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

    <section class="gradient">
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;

?>
  <section class="h-100 gradient-custom">
  <div class="container py-5">
  <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3"> 

            <h5 class="mb-0">Cart items</h5>
            <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
          </div>
      
<tr>         
        <?php		
        foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["pro_quantity"]*$item["pro_price"];
  ?>
          <div class="card-body">
            <!-- Single item -->
            <div class="row">
              <div class="cart-image">
                <h5>Product</h5>
                    <img src="admin/upload/<?php echo $item['pro_img_1'];?>">
              </div>
      
              <div class="cart-detail">
              <h5>Description</h5>
                <!-- Data -->
                <p><strong><?php echo $item['pro_name'];?></strong></p>
                <p><?php echo $item['pro_detail'];?></p>
                <p><strong>Size : <?php echo $item['pro_size'];?> </strong></p>
                <!-- Data -->
              </div>
   
              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
              <h5>Quantity</h5>
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                  <button class="btn btn-primary px-3 me-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>

                  <div class="form-outline">
                    <input id="form1" name="qty" onClick="sendQty" value="<?php echo $item['pro_quantity'];?>" min="1" max="<?php echo $item['pro_max_quantity'];?>" type="number" class="form-control" />
                  </div>
                 
                  <button class="btn btn-primary px-3 ms-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- Quantity -->
              </div> 
              
            <div class="price">
               <h5>Price</h5>
                <!-- Price -->
                <p class="text-start text-md-center">
                    <strong>₹ <?php echo $item['pro_price']*$item['pro_quantity'];?></strong>
                </p>
                <!-- Price -->
            </div>

            <div class="remove">
            <h5>Remove</h5>
            <a href="cart.php?action=remove&proid=<?php echo $item["pro_id"];?>" class="btnRemoveAction">
                <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                  title="Remove item">
                  <i class="fas fa-trash"></i>
                </button></a>
            </div>

            </div> 

            <!-- Single item -->
              <hr class="my-4" />
      <?php
            $total_quantity += $item["pro_quantity"];
				$total_price += ($item["pro_price"]*$item["pro_quantity"]);
    }
		?>
            <!-- Single item -->
          </div>
        </div>



        <div class="card mb-5">

          <a class="go_here" href="accessories.php">
             <i class="fa fa-arrow-left" aria-hidden="true"></i> Continue Shopping
             </a>


        <input type="submit" value="Checkout" class="btn btn-primary btn-lg btn-block" onclick="ShowHideDiv(this)">
           </input>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
        function ShowHideDiv(billingAdd) {
            var contaiNeru = document.getElementById("contaiNeru");
            contaiNeru.style.display = billingAdd.value == "Checkout" ? "block" : "none";
        }
    </script>
            
            
        </div>
      </div>

      <!-- <div class="col-md-4">
        <div class="card mb-6">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Products
                <span><?php //echo "₹ ".number_format($total_price, 2); ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>Free</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including GST)</p>
                  </strong>
                </div>
                <span><strong><?php //echo "₹ ".number_format($total_price, 2); ?></strong></span>
              </li>
            </ul>


          </div>
        </div>
      </div> -->
</div>

<div id="contaiNeru" style="display: none">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>
<form class="no-design" action="insert-cart.php" method="post">
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
  $rpincode=$_POST["pincode"];
  $sname=$_POST["sname"];
  $snumber=$_POST["snumber"];
  $saddress=$_POST["saddress"];
header('location: insert-cart.php?edit='.$_SESSION['rid'].'');
} else {
       $msg="Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
?>

<div class="ad-flex">
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
      <span>Alternate Number</span>
      <input type="text" name="snumber" value="<?php echo $snumber; ?>"> 
    </label>
    <label>
      <span>Email Address <span class="required">*</span></span>
      <input type="email" name="email" value="<?php echo $remail; ?>">
    </label>
    </div>

  <div class="Yorder">
    <table>

<tr>
        <th colspan="2">Your order</th>
      </tr>
      <tr>
        <td>Select(Qty) : <input name="qty" class="qty-slct-hre" value="<?php echo $total_quantity;?>" min="1" max="<?php echo $item['pro_max_quantity'];?>" type="number"></td>
        <td>₹ <?php echo $total_price;?></td>
      </tr>
      <tr>
        <td>Subtotal</td>
        <td>₹ <?php echo $total_price;?></td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>Free shipping</td>
      </tr>
    </table><br>
    <div>
      <input type="radio" name="dbt" value="cd" checked> Cash on Delivery
    </div>

    <input type="submit" name="submit" value="Place Order" >
  </div>
  </form><!-- Yorder -->
 </div>

</section>


<?php
} else {
  echo'
<div class="container-fluid  mt-100">
				 <div class="rowdd">
				 
					<div class="col-md-12">
					
							<div class="cardi">
						<div class="cardi-body cart">
								<div class="col-sm-12 empty-cart-cls text-center">
									<img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
									<h3><strong>Your Cart is Empty</strong></h3>
									<h4>Add something to make us happy :)</h4>
									<a href="accessories.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a>
									
								
								</div>
						</div>
				</div>
						
					
					</div>
				 
				 </div>
				
				</div>'; 
}
?>

</section>

<footer>
    <div class="rowa">
          <div class="cola">
              <a class="l-link" href="index.php"><img src="logo/feet2.png"><p class="bname">footprint</p></a>
              <p>Footprint vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers. We now serve customers all over the world, and are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>
          </div>
          <div class="cola">
            <h3 class="woow">Office <div class="underlinee"><span></span></div></h3>
            <p class="bnam">ITPL road</p>
            <p class="bnam">Whitefield, Bangalore</p>
            <p class="bnam">Karnataka, PIN 560066, India</p>
            <p class="email-id">footprint@outlook.com</p>
            <h4 class="woo">+91 - 9008689831</h4>
          </div>
          <div class="cola">
            <h3 class="woow">Links<div class="underlinee"><span></span></div></h3>
            <ul>
            <li><a href="index.php">Home</a></li>
                  <li><a href="accessories.php">Accessories</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="accessories.php?gender=1">Men</a></li>
                  <li><a href="accessories.php?gender=2">Women</a></li>
            </ul>
          </div>
          <div class="cola">
            <h3 class="woow">Newsletter<div class="underlinee"><span></span></div></h3>
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
