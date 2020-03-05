<?php

class CartModel extends Model {

    public function ajaxRequest($id_cart) {
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
        $response = ['amount' => 46600,
                     'countGoods' => 4,
                     'contents' => $cartItems];

        return json_encode($response);
    }

    public function addToCart($id,$id_cart=1)
    {
        $con = $this->db;
        $table = 'cartItems';
        $condition = " id_cart=".$id_cart;

        $sql = "SELECT * FROM $table WHERE $condition";
        $query = mysqli_query($con,$sql);

        // Check connection
        if (!$con) {
            die(ChromePhp::log("Connect failed:".mysqli_connect_error()));
        }

        $sql = "SELECT * FROM $table WHERE $condition AND id_product=$id";

        $query = mysqli_query($con,$sql);

        if(mysqli_num_rows($query) == 0) {
            $sql = "INSERT INTO $table (id_cart, id_product, quantity)
                VALUES ($id_cart, $id, 1)";
            $userData = mysqli_query($con,$sql);
            if(!empty($userData)){
                return 1;
            }
        } else {
            $row = mysqli_fetch_assoc($query);
            $quantity = $row['quantity'] + 1;
            $sql = "UPDATE $table SET quantity=$quantity WHERE id_cart=$id_cart AND id_product=$id";
            $userData = mysqli_query($con,$sql);
            if(!empty($userData)){
                return 1;
            }
        }
        return 0;
    }

    public function removeFromCart($id,$id_cart=1)
    {
        $con = $this->db;
        $table = 'cartItems';
        $condition = " id_cart=".$id_cart;

        // Check connection
        if (!$con) {
            die(ChromePhp::log("Connect failed:".mysqli_connect_error()));
        }

        $sql = "SELECT * FROM $table WHERE $condition AND id_product=$id";

        $query = mysqli_query($con,$sql);

        $row = mysqli_fetch_assoc($query);
        $quantity = $row['quantity'];

        if($quantity == 1) {
            $sql = "DELETE FROM $table WHERE $condition AND id_product=$id";
            $userData = mysqli_query($con,$sql);
            if(!empty($userData)){
                return 1;
            }
        } else {
            $quantity = $quantity - 1;
            $sql = "UPDATE $table SET quantity=$quantity WHERE id_cart=$id_cart AND id_product=$id";
            $userData = mysqli_query($con,$sql);
            if(!empty($userData)){
                return 1;
            }
        }
        return 0;
    }
}