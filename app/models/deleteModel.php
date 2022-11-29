<?php

class deleteModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    //this function can be used to every user,better to rename as deleteUser
    public function deleteUser($user_id)
    {
        $link= $this->delete('user',$user_id);
        if($link){
            echo "Successfully Deleted";
            header('Location '. BASEURL.'/#');
        }
    }

    public function deleteAdvertisement($post_id)
    {
        $link= $this->delete('postupdate',$post_id);
        if($link){
            echo "Successfully Deleted";
            header('Location '. BASEURL.'/propertyFeed/feedHome');
        }
    }

    public function deleteboardingowner($user_id)
    {
        $link= $this->delete('user',$user_id);
        if($link){
            echo "Successfully Deleted";
            header('Location '. BASEURL.'/boardingOwner/BOhome');
        }
    }



}