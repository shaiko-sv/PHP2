<?php

class DB
{
    const HOST = "localhost";
    const USER = "root";
    const PASS = "root";
    const DB = "shop";

    public static function connToDB() {

        $host = self::HOST;
        $user = self::USER;
        $pass = self::PASS;
        $db = self::DB;

        return mysqli_connect($host, $user, $pass, $db);
    }
}
//class DB
//{
//    protected $db;
//
//    const HOST = "localhost";
//    const USER = "root";
//    const PASS = "root";
//    const DB = "shop";
//
//    private function __construct()
//    {
//        self::connToDB();
//    }
//
//    public static function connToDB() {
//
//        $user = self::USER;
//        $pass = self::PASS;
//        $host = self::HOST;
//        $db = self::DB;
//
//        return new PDO("mysql:dbname=$db;host=$host",$user,$pass);
//    }
//    public static function getObject() {
//        if ($this->db === null) {
//            $this->db = new DB;
//        }
//        return self::$db;
//    }
//
//    private function __clone()
//    {
//        // TODO: Implement __clone() method.
//    }
//
//    private function __wakeup()
//    {
//        // TODO: Implement __wakeup() method.
//    }
//}