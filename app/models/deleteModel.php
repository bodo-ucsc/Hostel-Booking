<?php

class deleteModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    //this function can be used to every user
    public function deleteUser($user_id)
    {
        $link= $this->delete('user',"UserId = $user_id");
        if($link){
            echo "Successfully Deleted";
            header('Location '. BASEURL.'/#');
        }
    }

    public function deleteRecord($table,$condition)
    {
        
        $link= $this->delete($table,$condition);
        if($link){
            //echo "Successfully Deleted";
        }
    }



}