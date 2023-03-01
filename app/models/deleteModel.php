<?php

class deleteModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function deleteData($table, $id1, $idvalue1, $id2 = null, $idvalue2 = null)
    {
        if ($id2 == null) {
            $result = $this->delete($table, "$id1 = '$idvalue1'");
        } else {
            $result = $this->delete($table, "$id1 = '$idvalue1' AND $id2 = '$idvalue2'");
        }
        if ($result) {
            return 'success';
        } else {
            return 'failed';
        }
    }


}