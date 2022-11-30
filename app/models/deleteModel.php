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

    public function deleteAdvertisement($post_id)
    {
        $link= $this->delete('postupdate',"PostId = $post_id");
        if($link){
            echo "Successfully Deleted";
            header('Location '. BASEURL.'/propertyFeed/feedHome');
        }
    }

    public function deleteboardingowner($user_id)
    {
        //this only delete from boardingowner table not from user table
        $link= $this->delete('boardingowner',"BoardingOwnerId = $user_id");
        if($link){
            echo "Successfully Deleted";
            //header('Location '. BASEURL.'/boardingOwner/BOhome');
        }
    }



}