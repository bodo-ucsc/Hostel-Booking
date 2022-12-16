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

    public function deleteABoarding($placeid)
    {
        $r0 = $this->delete('boardingplacepicture', "BoardingPlace = $placeid");
        $r1 = $this->delete('boardingplacetenant', "PlaceId = $placeid");
        $r2 = $this->delete('friendinvite', "PlaceId = $placeid");
        $r3 = $this->delete('postupdate', "PlaceId = $placeid");
        $r4 = $this->delete('reviewrating', "Place = $placeid");
        $r5 = $this->delete('boardingplace', "PlaceId = $placeid");

        // $sql = "DELETE FROM boardingplacepicture WHERE BoardingPlace = $placeid";
        // $result0 = $this->runQuery($sql);
        // $sql = "DELETE FROM boardingplacetenant WHERE PlaceId = $placeid";
        // $result1 = $this->runQuery($sql);
        // $sql = "DELETE FROM friendinvite WHERE PlaceId = $placeid";
        // $result2 = $this->runQuery($sql);
        // $sql = "DELETE FROM postupdate WHERE PlaceId = $placeid";
        // $result3 = $this->runQuery($sql);
        // $sql = "DELETE FROM reviewrating WHERE Place = $placeid";
        // $result4 = $this->runQuery($sql);
        // $sql = "DELETE FROM boardingplace WHERE PlaceId = $placeid";
        // $result5 = $this->runQuery($sql);
    }



}