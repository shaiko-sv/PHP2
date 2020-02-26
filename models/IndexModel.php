<?php

class IndexModel extends Model {

    public function checkUser() {

        $salt = "ger34yeHH_j5";
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password = md5($password).$salt;

        $sql = "SELECT * FROM users WHERE login ='$login' AND password = '$password'";

        $conn = $this->db;

        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

        $res = mysqli_num_rows($query);

        if(!empty($res)) {
            $_SESSION['user'] = $_POST['login'];
            header("Location: /cabinet");
        } else {
            return false;
        }
    }

    public function ajaxfile() {
        $table = $_GET['table']??'';
        if($table == 'products'){
            $condition = "1";
            if(isset($_GET['id_product'])){
                $condition = " id_product=".$_GET['id_product'];
            }

            $userData = mysqli_query($this->db,"SELECT * FROM ".$table." WHERE ".$condition);
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
        ChromePhp::log('$response = ',$response);

        return $response;
    }
}