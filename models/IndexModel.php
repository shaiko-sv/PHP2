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

    public function getAllImages() {

        $result = [];
        $sql = "SELECT * FROM images";
        $conn = $this->db;

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $result[$row['id']] = $row;
        }
        return $result;

    }

    public function addImageToDB($name, $ext) {

        $sql = "INSERT INTO images
                    (id, file_name, ext, info, date_create, counter) VALUES
                    (NULL, '$name', '$ext', '', CURRENT_TIMESTAMP, '0')";
        $conn = $this->db;

        return mysqli_query($conn, $sql);

    }

    public function translit($string) {
        $translit = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я'=>'ya');

        return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
    }

    public function changeImage($h, $w, $src, $newsrc, $type) {
        $newimg = imagecreatetruecolor($h, $w);
        switch ($type) {
            case 'jpeg':
                $img = imagecreatefromjpeg($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagejpeg($newimg, $newsrc);
                break;
            case 'png':
                $img = imagecreatefrompng($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagepng($newimg, $newsrc);
                break;
            case 'gif':
                $img = imagecreatefromgif($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagegif($newimg, $newsrc);
                break;
        }
    }

    public function scanDir() {
        return array_slice(scandir(PHOTO_SMALL), 2);
    }

}