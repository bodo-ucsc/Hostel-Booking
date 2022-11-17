<?php

class deleteModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    //this function can be used to every user,better to rename as deleteUser
    public function deleteboardingowner($user_id)
    {
        $link= $this->delete('user',$user_id);
        if($link){
            echo "Successfully Deleted";
            header('Location '. BASEURL.'/boardingOwner/BOhome');
        }
    }




}