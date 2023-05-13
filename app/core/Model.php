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
        $bind_params = array();
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }
        if ($limit != null) {
            $sql .= " LIMIT ?";
            $bind_params[] = $limit;
        }

        $stmt = $this->mysqli->prepare($sql);
        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function getGroup($table, $column = '*', $where = null, $group = null)
    {
        $sql = "SELECT $column FROM $table";
        $bind_params = array();

        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($group != null) {
            $sql .= " GROUP BY $group";

        }

        $stmt = $this->mysqli->prepare($sql);
        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function getColumn($table, $column, $where = null, $order = null)
    {

        $sql = "SELECT $column FROM $table";
        $bind_params = array();

        if ($where != null) {
            $sql .= " WHERE $where";
        }

        if ($order != null) {
            $sql .= " ORDER BY $order";
        }

        $stmt = $this->mysqli->prepare($sql);
        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function getColumnGroup($table, $column, $where = null, $group = null, $order = null)
    {

        $sql = "SELECT $column FROM $table";
        $bind_params = array();

        if ($where != null) {
            $sql .= " WHERE $where";
        }

        if ($group != null) {
            $sql .= " GROUP BY $group";
        }
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }

        $stmt = $this->mysqli->prepare($sql);
        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }


    public function union($table1, $table2, $column, $where1 = null, $where2 = null)
    {

        $sql = "SELECT $column FROM $table1";
        $bind_params = array();
        if ($where1 != null) {
            $sql .= " WHERE $where1";
        }

        $sql .= " UNION ";

        $sql .= "SELECT $column FROM $table2";
        if ($where2 != null) {
            $sql .= " WHERE $where2";
        }

        $stmt = $this->mysqli->prepare($sql);
        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;

    }
    public function unionMultiple($table1, $table2, $column1, $column2, $where1 = null, $where2 = null)
    {
        $sql = "SELECT $column1 FROM $table1";
        $bind_params = array();
        if ($where1 != null) {
            $sql .= " WHERE $where1";
        }

        $sql .= " UNION ";

        $sql .= "SELECT $column2 FROM $table2";
        if ($where2 != null) {
            $sql .= " WHERE $where2";
        }

        $stmt = $this->mysqli->prepare($sql);
        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $values = array_values($data);
        $placeholders = implode(',', array_fill(0, count($keys), '?'));

        $sql = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES ($placeholders)";

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($values)), ...$values);
        $result = $stmt->execute();
        if ($result) {
            $result = 1;
        }
        else {
            $result = null;
        }
        $stmt->close();



        return $result;
    }

    public function update($table, $data, $where)
    {
        $sql = "UPDATE $table SET ";
        $bind_params = array();
        foreach ($data as $key => $value) {
            if ($value == null) {
                $sql .= "$key = NULL, ";
            } else {
                $sql .= "$key = ?, ";
                $bind_params[] = $value;
            }
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE $where";

        $stmt = $this->mysqli->prepare($sql);

        if (!empty($bind_params)) {
            $types = str_repeat('s', count($bind_params));
            $stmt->bind_param($types, ...$bind_params);
        }

        $result = $stmt->execute();
        if ($result) {
            $result = 1;
        }
        else {
            $result = null;
        }
        $stmt->close();

        return $result;
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";

        $stmt = $this->mysqli->prepare($sql);

        $stmt->execute();
        $result = $stmt->execute();
        if ($result) {
            $result = 1;
        }
        else {
            $result = null;
        }
        $stmt->close();

        return $result;
    }


    public function numRows($table)
    {
        //count of rows 
        $count = 0;
        $sql = "SELECT COUNT(1) FROM $table";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        
        return $count;
    }

    public function numRowsWhere($table, $where)
    {
        //count of rows 
        $count = 0;
        $sql = "SELECT COUNT(1) FROM $table ";
        if (isset($where)) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->mysqli->prepare($sql);
        // if (isset($where)) {
        //     $stmt->bind_param('s', $where);
        // }
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        
        return $count;
    }

}