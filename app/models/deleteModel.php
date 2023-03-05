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


    public function deleteUser($id){
        $result = $this->update('User', [
            'FirstName' => "Deleted",
            'LastName' => "User",
            'Email' => NULL,
            'Username' => NULL,
            'NIC' => NULL,
            'ContactNumber' => NULL,
            'ProfilePicture' => NULL,
            'Deleted' => "y"
        ], "UserId = '$id'");
        if ($result) {
            return 'success';
        } else {
            return 'failed';
        }
    }

}