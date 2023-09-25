<?php
public function searchProducts(){

    $sqlQuery="SELECT * FROM product WHERE pro_status='1'";

    if(isset($_POST["minPrice"],["maxPrice"]) && !empty($_POST["minPrice"]) && !empty($_POST["maxPrice"])){

        $sqlQuery .="AND pro_price BETWEEN '".$_POST["minPrice"]."' AND '".$_POST["mixPrice"]."'";

    }
    if(isset($_POST["menswear"])){
        $menswearFilterData=implode("','", $_POST["menswear"]);
        $sqlQuery .="AND cat_id IN ('".$menswearFilterData."')";
    }
    $sqlQuery .=" ORDER By pro_price ";

    $result=mysqli_query($this->dbConnect, $sqlQuery);
    $totalResult=mysqli_num_rows($result);
    $productItemsHTML ='';
    if($totalResult > 0){
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $productItemsHTML  .='';
        }
    }else{
        $productItemsHTML ='<h3>no product found</h3>';
    }
    return $productItemsHTML ;
}

?>