<?php

class editModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function EditUser($id, $firstname, $lastname, $username, $email, $usertype)
    {
        $this->update('user', ['FirstName' => $firstname, 'LastName' => $lastname, 'Username' => $username, 'UserType' => $usertype, 'Email' => $email], "UserId = '$id'");
    }

    public function updateBoardingOwner($id, $mobile, $dob, $gender, $address, $nic, $occupation, $workplace)
    {
        $this->update('BoardingOwner', ['DateOfBirth' => $dob, 'NIC' => $nic, 'ContactNumber' => $mobile, 'Address' => $address, 'Gender' => $gender, 'Occupation' => $occupation, 'Workplace' => $workplace], "BoardingOwnerId = '$id'");
    }

    public function editAdvertisement($pid, $userid, $placeid, $date, $message)
    {
        $this->update('postupdate', ['UserId' => $userid, 'PlaceId' => $placeid, 'DateTime' => $date, 'Caption' => $message], "PostId = '$pid'");

    }
 
    public function modifyData($table,$data,$condition)
    {
        $result = $this->update($table,$data,$condition);
        return $result;
    }

}