<?php
class Product {
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "footprint";   
	private $productTable = 'product';
	private $proimg = 'product_image';
	private $probrand = 'brands';
	private $procat = 'category';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function getCat(){
		$sqlQuery = "
			SELECT DISTINCT(cat_name), cat_id
			FROM ".$this->procat." 
			WHERE cat_status = '1' ORDER BY cat_id ASC";
        return  $this->getData($sqlQuery);
	}		
	public function getBrand(){
		$sqlQuery = "
			SELECT brand_name, brand_id
			FROM ".$this->probrand." 
			WHERE brand_status = '1' ORDER BY brand_id ";
        return  $this->getData($sqlQuery);
	}
	
	public function searchProducts(){
		if(!empty($_POST['gender'])){
			$gender=$_POST['gender'];
			$g="&& a.pro_gender='$gender'";
			}else{
				$gender='0';
				$g='';
			}
			
			if(!empty($_POST['searchBox'])){
				$search=$_POST['searchBox'];
				$S="&& a.pro_name LIKE '%$search%'";
				}else{
					$search='';
					$S="";
				}

					if(!empty($_POST['category'])){
						$category=$_POST['category'];
						$c="&& a.cat_id='$category'";
						}else{
							$category='0';
							$c='';
						}

		$sqlQuery = "SELECT * FROM product a,brands b,product_image c WHERE a.brand_id=b.brand_id AND a.pro_id=c.pro_id AND a.pro_status='1' $g $S $c";
		if(isset($_POST["minPrice"], $_POST["maxPrice"]) && !empty($_POST["minPrice"]) && !empty($_POST["maxPrice"])){
			$sqlQuery .= "
			AND a.pro_price BETWEEN ".$_POST["minPrice"]." AND ".$_POST["maxPrice"]."";
		}
		if(isset($_POST["catid"])){
			$catFilterData = implode("','", $_POST["catid"]);
			$sqlQuery .= "
			AND a.cat_id IN('".$catFilterData."')";
		}
		if(isset($_POST["brand"])) {
			$brandFilterData = implode("','", $_POST["brand"]);
			$sqlQuery .= "
			AND a.brand_id IN('".$brandFilterData."')";
		}
		
		
		$sqlQuery .= " ORDER By a.pro_price";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$totalResult = mysqli_num_rows($result);
		$productItemsHTML  = '';
		if($totalResult > 0) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$productItemsHTML .= '<div class = "productx">
						<a href="prodetail.php?proid='. $row['pro_id'] .'">
							<div class = "product-contentx">
								<div class = "product-img">
									<img src = "admin/upload/'. $row['pro_img_png'] .'" alt = "product image">
								</div>
								<div class = "product-btns">
									<button type = "button" class = "btn-cart"> view product
									<span><i class="fa fa-eye" aria-hidden="true"></i></span>
									</button>
								</div>
							</div>
	
							<div class = "product-info">
								<div class = "product-info-top">
									<h2 class = "sm-title">'. $row['pro_name'] .'</h2>
								</div>
								<a href = "#" class = "product-name">'. $row['pro_detail'] .' </a>
								<p class = "product-price">'. $row['brand_name'].'</p>
								<p class = "product-price">₹<s>'. $row['pro_pre_price'] .'</s>   ₹'. $row['pro_price'] .'</p>
							</div>
	
							<div class = "off-info">
								<h2 class = "sm-title">'. $row['pro_quantity'] .'% off</h2>
							</div></a>
							</div>';
			}
		} else {
			$productItemsHTML  = '<div class="no-img"><img src="img/product-not-found.jpg">
			</div>';
		}
		return $productItemsHTML ;	
	}	
}
?>