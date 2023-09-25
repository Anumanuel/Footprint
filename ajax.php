<?php
//Including Database configuration file.
include "connectdb.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['searchBox'])) {
//Search box value assigning to $Name variable.
   $pro_name = $_POST['searchBox'];
//Search query.
   $Query = "SELECT pro_name FROM product WHERE Name LIKE '%$Name%'";
//Query execution
   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onClick='fill("<?php echo $Result['pro_name']; ?>")'>
   <a>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['pro_name']; ?>
   </li></a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</ul>