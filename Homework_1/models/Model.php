<?php
    class Model {
        protected $db = null;

        public function __construct()
        {
            echo 'HW1';
            $this->db = DB::connToDB();
        }
    }