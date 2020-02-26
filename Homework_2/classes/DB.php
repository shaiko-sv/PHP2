<?php

namespace PHP2\Homework_2\classes;

class DB
{
    use ConnToDB;

    protected static $db;

    const HOST = "localhost";
    const USER = "root";
    const PASS = "root";
    const DB = "shop";

    private function __construct()
    {
        self::connToDB();
    }

    public static function getObject() {
        if (self::$db === null) {
            self::$db = new DB;
        }
        return self::$db;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}