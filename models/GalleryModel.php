<?php

class GalleryModel extends Model {

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

    public function getAllImages_PDO() {

        $conn_pdo = $this->db_pdo;
        $result = $conn_pdo->query('SELECT * FROM images');

        $result = $conn_pdo->query('SELECT * FROM images');

        return $result->fetchAll(PDO::FETCH_ASSOC);

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
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu',
            'я'=>'ya');

        return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
    }

    public function resizeImage($width, $height, $src, $newSrc, $type) {
        list($width_orig, $height_orig) = getimagesize($src);
        echo $width_orig;
        echo '<br>';
        echo $height_orig;
        $ratio_orig = $width_orig/$height_orig;

        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }
        echo '<br>';
        echo $width;
        echo '<br>';
        echo $height;

        $newImg = imagecreatetruecolor($width, $height);
        switch ($type) {
            case 'jpeg':
                $img = imagecreatefromjpeg($src);
                imagecopyresampled($newImg, $img, 0, 0, 0, 0,
                    $width, $height, $width_orig, $height_orig);
                imagejpeg($newImg, $newSrc);
                break;
            case 'png':
                $img = imagecreatefrompng($src);
                imagecopyresampled($newImg, $img, 0, 0, 0, 0,
                    $width, $height, $width_orig, $height_orig);
                imagepng($newImg, $newSrc);
                break;
            case 'gif':
                $img = imagecreatefromgif($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0,
                    $width, $height, $width_orig, $height_orig);
                imagegif($newImg, $newSrc);
                break;
        }
    }

    public function scanDir() {
        return array_slice(scandir(PHOTO_SMALL), 2);
    }

    //$result = $pdo->query('SELECT * FROM images');

    //while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    //    echo $row['file_name'] . $row['ext'] . "<br>";
    //}

    //$rows = $result->fetchAll(PDO::FETCH_ASSOC);
    //echo'<pre>';
    //var_dump($rows);

    //$sql = 'SELECT file_name FROM images WHERE ext = :ext';
    //$stmt = $pdo->prepare($sql);
    //
    //$params = [':ext' => 'png'];
    //$stmt->execute( $params );
    //
    //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo'<pre>';
    //var_dump($rows);

    //$sql_pos = 'SELECT file_name FROM images WHERE ext = ? and counter = ?';
    //$stmt_pos = $pdo->prepare($sql_pos);
    //
    //$stmt_pos->execute(['jpg', '0']);
    //$rows_pos = $stmt_pos->fetchAll(PDO::FETCH_ASSOC);
    //
    //echo'<pre>';
    //var_dump($rows_pos);
}