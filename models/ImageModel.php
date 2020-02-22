<?php

class ImageModel extends Model {

//    public function checkUser() {
//
//        $salt = "ger34yeHH_j5";
//        $login = $_POST['login'];
//        $password = $_POST['password'];
//        $password = md5($password).$salt;
//
//        $sql = "SELECT * FROM users WHERE login ='$login' AND password = '$password'";
//
//        $conn = $this->db;
//
//        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
//
//        $res = mysqli_num_rows($query);
//
//        if(!empty($res)) {
//            $_SESSION['user'] = $_POST['login'];
//            header("Location: /cabinet");
//        } else {
//            return false;
//        }
//    }

    public function getImageByID($id) {

        $sql = "SELECT * FROM images WHERE id=$id";
        $conn = $this->db;

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $result = $row;
        }
        return $result;

    }

}