<?php

namespace PHP2\Homework_2\classes;

/**
 * Class DB**
 *
 */
trait ConnToDB {

    public function connToDB() {

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        return mysqli_connect($host, $user, $pass, $db);
    }
}