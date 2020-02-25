<?php

class Model {
    protected $db;
    protected $db_pdo;

    public function __construct()
    {
        $this->db = DB::connToDB();
        $this->db_pdo = DB_PDO::connToDB();
    }
}