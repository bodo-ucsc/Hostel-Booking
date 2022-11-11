<?php

class Database
{

    public $mysqli;

    public function __construct()
    {
        $this->db_connect();
    }

    private function db_connect()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $this->mysqli;
    }

    public function numRows($result)
    {
        return $result->num_rows;
    }

    public function runQuery($sql)
    {
        $result = $this->mysqli->query($sql);
        return $result;
    }

} 
