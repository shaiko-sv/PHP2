<?php
include_once "ChromePhp.php";
const SERVER = "localhost";
const USER = "root";
const PASS = "root";
const DB = "shop";


$con = mysqli_connect(SERVER, USER, PASS, DB);
// Check connection
if (!$con) {
    die(ChromePhp::log("Connect failed:".mysqli_connect_error()));
} else {
    ChromePhp::log("Подключен к базе данный '".DB."'");
}

$table = $_GET['table']??'images';
if($table == 'products'){
   $condition = "1";
   $limit = '';
   $sql = "SELECT * FROM ".$table." WHERE ".$condition;

   if(isset($_GET['id_product'])){
      $condition = " id_product=".$_GET['id_product'];
      $sql = "SELECT * FROM ".$table." WHERE ".$condition;
   }
   if(isset($_GET['limit'])){
       $limit = $_GET['limit'];
       $sql = "SELECT * FROM $table WHERE $condition LIMIT $limit";
   }
   if(isset($_GET['offset']) && isset($_GET['rowCount'])) {
       $offset = $_GET['offset'];
       $rowCount = $_GET['rowCount'];
       $sql = "SELECT * FROM $table WHERE $condition LIMIT $offset, $rowCount";
   }
    ChromePhp::log('$sql = ',$sql);
   $userData = mysqli_query($con,$sql);
}

if($table == 'cartItems'){
   $condition = "1";
   if(isset($_GET['id_cart'])){
      $condition = " id_cart=".$_GET['id_cart'];
   }
   $sql = "SELECT ".$table.".id_product, products.product_name, products.price, ".$table.".quantity FROM ".$table." 
               INNER JOIN products ON ".$table.".id_product = products.id_product WHERE ".$condition;
   $userData = mysqli_query($con,$sql);
}

$response = [];

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);
exit;
