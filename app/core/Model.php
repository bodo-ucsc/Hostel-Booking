<?php



class Model extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($table, $where = null, $order = null, $limit = null)
    {
        $sql = "SELECT * FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }
        if ($limit != null) {
            $sql .= " LIMIT $limit";
        }
        $result = $this->runQuery($sql);
        return $result;
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = '$value', ";
        }
        $sql = substr($sql, 0, -2);
        echo $sql;
        $result = $this->runQuery($sql);
        return $result;
    }

    public function update($table, $data, $where)
    {
        $sql = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = '$value', ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE $where";
        $result = $this->runQuery($sql);
        return $result;
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";
        $result = $this->runQuery($sql);
        return $result;
    }

<<<<<<< HEAD
=======

    public function numRows($table)
    {
        //count of rows 
        $sql = "SELECT COUNT(1) FROM $table";
        $result = $this->runQuery($sql);
        $row = $result->fetch_row();
        return $row[0];
    }




>>>>>>> Develop
} 