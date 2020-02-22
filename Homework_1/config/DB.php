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