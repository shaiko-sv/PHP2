<?php

class DB_PDO
{
    const DRIVER = 'mysql';
    const HOST = 'localhost';
    const DB_NAME = 'shop';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const CHARSET = 'utf8';
    const OPTIONS = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    public static function connToDB()
    {
        $driver = self::DRIVER;
        $host = self::HOST;
        $db_name = self::DB_NAME;
        $db_user = self::DB_USER;
        $db_pass = self::DB_PASS;
        $charset = self::CHARSET;
        $options = self::OPTIONS;

        try {
            return new
            PDO("$driver:host=$host;dbname=$db_name;charset=$charset",
                $db_user, $db_pass, $options);
            ChromePhp::log(new
            PDO("$driver:host=$host;dbname=$db_name;charset=$charset",
                $db_user, $db_pass, $options));
        } catch (PDOException $e) {
            die("Не могу подключиться к базе данных");
        }
    }
}

