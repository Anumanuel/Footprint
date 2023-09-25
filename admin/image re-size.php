<?php
if(isset($_FILES['image'])){
$file_name = $_FILES['image']['name']; // The file name  
$file_temp = $_FILES['image']['tmp_name']; // File in the PHP tmp folder
$getext = explode(".", $file_name); // Split file name into an array using the dot
        $fileExt = end($getext); // Now target the last array element to get the file extension
$wmax = 660;
$hmax = 960;
        $new_file_path ='upload/';
img_resize($file_temp,$wmax, $hmax, $fileExt,$new_file_path);
 
 
}
function img_resize($target,$w, $h, $ext,$new_file_path) {
list($w_orig, $h_orig) = getimagesize($target);
$scale_ratio = $w_orig / $h_orig;
if (($w / $h) > $scale_ratio) {
   $w = $h * $scale_ratio;
} else {
   $h = $w / $scale_ratio;
}
$img = "";
$ext = strtolower($ext);
if ($ext == "gif"){
$img = imagecreatefromgif($target);
} else if($ext =="png"){
$img = imagecreatefrompng($target);
} else {
$img = imagecreatefromjpeg($target);
}
$tci = imagecreatetruecolor($w, $h);
imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
if ($ext == "gif"){
$res=imagegif($tci, $new_file_path.time(). "_thump.gif");
} else if($ext =="png"){
$res=imagepng($tci, $new_file_path.time(). "_thump.png");
} else {
$res=imagejpeg($tci, $new_file_path.time(). "_thump.jpg");
}
}
?>
 
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">        
<input type="file" name="image" />
<input type="submit"/>
</form>  
      
