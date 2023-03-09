<?php

class editModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }
 

    public function changeBed($placeId, $bed = null, $userId = null)
    {
        if($userId == null){
            $result = $this->update('BoardingPlaceTenant', ['Bed' => $userId], "Place = $placeId AND Bed = $bed");
        }else {
            $result = $this->update('BoardingPlaceTenant', ['Bed' => $bed], "Place = $placeId AND TenantId = $userId");
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function toggleLike($PostId, $UserId, $Reaction)
    {
        $result = $this->update('React', ['Reaction' => $Reaction], "Post = $PostId AND Liker = $UserId");
    }

    public function addABoardingMember($userid,$placeid)
    {
        $result = $this->update('boardingplacetenant',['BoarderStatus'=>'boarded'],"TenantId = $userid AND PlaceId = $placeid");
        return $result;
    }

    public function modifyData($table, $data, $condition)
    {
        $result = $this->update($table, $data, $condition);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function verify($table, $id, $verified)
    {
        $data = ['VerifiedBy' => $verified,'VerifiedStatus' => "verified"];
        if($table=='Boarder'){
            $tableid = 'BoarderId';
        }
        else if($table=='BoardingOwner'){
            $tableid='BoardingOwnerId';
        }
        else if($table == 'BoardingPlace'){
            $tableid='PlaceId';

        }
        $condition = "$tableid = '$id'";
        
        $result = $this->update($table, $data, $condition);
        if ($result) {
            return true;
        } else { 
            return false;
        }
    }


}