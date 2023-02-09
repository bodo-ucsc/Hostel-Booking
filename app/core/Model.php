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

    public function getGroup($table, $column = '*', $where = null, $group = null)
    {
        $sql = "SELECT $column FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($group != null) {
            $sql .= " GROUP BY $group";
        }
        $result = $this->runQuery($sql);
        return $result;
    }
     
    public function getColumn($table,$column, $where = null, $order = null) 
    {

        $sql = "SELECT $column FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }
        $result = $this->runQuery($sql);
        return $result;
    }

    public function union($table1, $table2, $column, $where1 = null, $where2 = null)
    {
        $sql = "SELECT $column FROM $table1";
        if ($where1 != null) {
            $sql .= " WHERE $where1";
        }
        $sql .= " UNION ";
        $sql .= "SELECT $column FROM $table2";
        if ($where2 != null) {
            $sql .= " WHERE $where2";
        }
        $result = $this->runQuery($sql);
        return $result;
    }
    public function unionalt($table1, $table2, $column1, $column2, $where1 = null, $where2 = null)
    {
        $sql = "SELECT $column1 FROM $table1";
        if ($where1 != null) {
            $sql .= " WHERE $where1";
        }
        $sql .= " UNION ";
        $sql .= "SELECT $column2 FROM $table2";
        if ($where2 != null) {
            $sql .= " WHERE $where2";
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


    public function numRows($table)
    {
        //count of rows 
        $sql = "SELECT COUNT(1) FROM $table";
        $result = $this->runQuery($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function numRowsWhere($table, $where)
    {
        //count of rows 
        $sql = "SELECT COUNT(1) FROM $table ";
        if (isset($where)) {
            $sql .= " WHERE $where";
        }
        $result = $this->runQuery($sql); 
        $row = $result->fetch_row();
        return $row[0];
    }

} 