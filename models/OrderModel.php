<?php

class OrderModel extends Model {

    public function getCartItems($id_cart) {
        $con = $this->db;
        $table = 'cartItems';
        $condition = " id_cart=".$id_cart;

        // Check connection
        if (!$con) {
            die(ChromePhp::log("Connect failed:".mysqli_connect_error()));
        }

        $sql = "SELECT ".$table.".id_product, products.product_name, products.price, ".$table.".quantity FROM ".$table." 
               INNER JOIN products ON ".$table.".id_product = products.id_product WHERE ".$condition;
        $userData = mysqli_query($con,$sql);

        $cartItems = [];

        while($row = mysqli_fetch_assoc($userData)){

            $cartItems[] = $row;
        }

        return $cartItems;
    }

}