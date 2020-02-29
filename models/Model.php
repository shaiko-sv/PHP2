<?php
class Model {
    public $db;
    public $db_pdo;

    public function __construct()
    {
        $this->db = DB::connToDB();
        $this->db_pdo = DB_PDO::connToDB();
    }

    public function getOrdersCount() {
        $sql = "SELECT COUNT(*) FROM orders";

        $conn = $this->db;

        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

        $res = mysqli_fetch_assoc($query);
        return implode("", $res);
    }

    public function getProductsCount() {
        $sql = "SELECT COUNT(*) FROM products";

        $conn = $this->db;

        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

        $res = mysqli_fetch_assoc($query);
        return implode("", $res);
    }

    public function getUserCount() {
        $sql = "SELECT COUNT(*) FROM users";

        $conn = $this->db;

        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

        $res = mysqli_fetch_assoc($query);
        return implode("", $res);
    }

    public function getOrders() {
        $sql = "SELECT
                    orders.id AS id,
                    orders.amount AS total,
                    users.fullName,
                    users.email
                FROM orders
                LEFT JOIN users ON user.id = orders.user_id
        ";

        $res = [];
        $conn = $this->db;
        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

        while($row = mysqli_fetch_assoc($query)) {
            $res[] = $row;
        }
        return $res;
    }
}