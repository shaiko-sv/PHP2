<?php

class LoginModel extends Model {

    public function checkUser() {

        $salt = ''; //"ger34yeHH_j5";
        $login = $_POST['login']??"Sergii";
        $password = $_POST['password']??"Hel10s1976";
        $password = md5($password).$salt;

        $sql = "SELECT * FROM users WHERE login ='$login' AND pass = '$password'";

        $conn = $this->db;

        $query = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

        $res = mysqli_num_rows($query);
        //echo "LoginModel.php Line 19 $res";

        if(!empty($res)) {
            $_SESSION['user'] = $_POST['login'];
            header("Location: /cabinet");
        } else {
            return false;
        }
    }

}