<?php

class RegisterModel extends Model {

    public function registerNewUser($regUser, $regLogin, $regEmail, $regPassword){
        $salt = ''; //"ger34yeHH_j5";
        $regPassword .= $salt;
        $sql = "INSERT INTO users(login, pass, name, email)
                    VALUES (:login, :pass, :name, :email)"; //TODO: add role of user in DB.shop.users
        $stmt = $this->db_pdo->prepare($sql);
        $stmt->bindValue(":login", $regLogin, PDO::PARAM_STR);
        $stmt->bindValue(":pass", $regPassword, PDO::PARAM_STR);
        $stmt->bindValue(":name", $regUser, PDO::PARAM_STR);
        $stmt->bindValue(":email", $regEmail, PDO::PARAM_STR);

        $stmt->execute();
    }

}