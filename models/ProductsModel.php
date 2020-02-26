<?php

class ProductsModel extends Model {

    public function getAllProducts() {
        $result = array();
        $sql = "SELECT * FROM products";
        $stmt = $this->db_pdo->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id_product']] = $row;
        }
        return $result;
    }

    public function addFromCSVPDO($data) {
        $sql = "INSERT INTO products (product_name, price, img, counter, description)
                    VALUES(:product_name, :price, :img, :counter, :desription)";

        $stmt = $this->db_pdo->prepare($sql);
        $stmt->bindValue(':product_name', $data[0], PDO::PARAM_STR);
        $stmt->bindValue(':price', $data[1], PDO::PARAM_INT);
        $stmt->bindValue(':img', $data[2], PDO::PARAM_STR);
        $stmt->bindValue(':counter', $data[3], PDO::PARAM_INT);
        $stmt->bindValue(':description', $data[4], PDO::PARAM_STR);
        $stmt->execute();

    }

    public function addFromCSV($data) {
//        $sql = "INSERT INTO products (product_name, price, img, counter, description)
//                    VALUES( '', $data[1], $data[2], $data[3], '', $data[5], $data[6])";

        $sql = "INSERT INTO `products`(`product_name`, `price`, `img`, `counter`, `description`)
                       VALUES ('$data[1]', $data[2], '$data[3]', $data[5], '$data[6]')";
        echo $sql."<br>";
        if($this->db->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }

    }

}
