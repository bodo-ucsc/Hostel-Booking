<?php

class addModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($firstname, $lastname, $username, $email, $contactNumber, $password, $usertype)
    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert('User', ['FirstName' => $firstname, 'LastName' => $lastname, 'Username' => $username, 'Email' => $email, 'ContactNumber' => $contactNumber, 'Password' => $password, 'UserType' => $usertype]);
        //return last id
        return $this->lastInsertId();
    }

    public function addAdvertisement($userid, $placeid, $date, $message)
    {
        $this->insert('PostUpdate', ['UserId' => $userid, 'PlaceId' => $placeid, 'DateTime' => $date, 'Caption' => $message]);

    }



    public function addVerificationTeam($id, $dob, $gender, $address, $nic)
    {
        $this->insert('VerificationTeam', ['VerificationTeamId' => $id, 'DateOfBirth' => $dob, 'NIC' => $nic, 'Address' => $address, 'Gender' => $gender]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addProfessional($ProfessionalId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $Address, $WorkPlace, $Occupation)
    {
        $this->insert('Manager', ['ManagerId' => $ProfessionalId, 'DateOfBirth' => $DateOfBirth, 'NIC' => $NIC, 'Address' => $Address, 'Gender' => $Gender]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addBoarder($BoarderId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender,  $Address)
    {
        $this->insert('Boarder', [
            'BoarderId' => $BoarderId,
            'VerifiedStatus' => $VerifiedStatus,
            'NICScanLink' => $NICScanLink,
            'DateOfBirth' => $DateOfBirth,
            'NIC' => $NIC,
            'Gender' => $Gender,
            'Address' => $Address,
            //'WorkPlace' => $WorkPlace,
            //'Occupation' => $Occupation
        ]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }
    public function addBoardingOwner($BoardingOwnerId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $Address, $WorkPlace, $Occupation)
    {
        $this->insert('BoardingOwner', [
            'BoardingOwnerId' => $BoardingOwnerId,
            'VerifiedStatus' => $VerifiedStatus,
            'NICScanLink' => $NICScanLink,
            'DateOfBirth' => $DateOfBirth,
            'NIC' => $NIC,
            'Gender' => $Gender,
            'Address' => $Address,
            'WorkPlace' => $WorkPlace,
            'Occupation' => $Occupation
        ]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }
    public function addStudent($StudentId, $VerifiedStatus, $NICScanLink, $UniversityIDCopyLink, $DateOfBirth, $NIC, $Gender, $Address, $StudentUniversity, $UniversityIDNo, $UniversityAdmissionLetterCopyLink)
    {
        $this->insert('Student', [
            'StudentId' => $StudentId,
            'VerifiedStatus' => $VerifiedStatus,
            'NICScanLink' => $NICScanLink,
            'UniversityIDCopyLink' => $UniversityIDCopyLink,
            'UniversityAdmissionLetterCopyLink' => $UniversityAdmissionLetterCopyLink,
            'DateOfBirth' => $DateOfBirth,
            'NIC' => $NIC,
            'Gender' => $Gender,
           // 'ContactNumber' => $ContactNumber,
            'Address' => $Address,
            'StudentUniversity' => $StudentUniversity,
            'UniversityIDNo' => $UniversityIDNo
        ]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addUniversity($uni)
    {
        $this->insert('university', ['UniversityName' => $uni]);
    }

    public function addABoarding($ownerid, $title, $verifiedStatus, $summaryL1, $summaryL2, $summaryL3, $description, $price, $priceType, $houseNo, $street, $cityName, $googleMaps, $propertyType, $noofMembers, $noofRooms, $noofWashRooms, $gender, $boarderType, $sqft, $parking)
    {
        $this->insert('boardingPlace', [
            'OwnerId' => $ownerid,
            'Title' => $title,
            'VerifiedStatus' => $verifiedStatus,
            'SummaryLine1' => $summaryL1,
            'SummaryLine2' => $summaryL2,
            'SummaryLine3' => $summaryL3,
            'Description' => $description,
            'Price' => $price,
            'PriceType' => $priceType,
            'HouseNo' => $houseNo,
            'Street' => $street,
            'CityName' => $cityName,
            'GoogleMap' => $googleMaps,
            'PropertyType' => $propertyType,
            'NoOfMembers' => $noofMembers,
            'NoOfRooms' => $noofRooms,
            'NoOfWashRooms' => $noofWashRooms,
            'Gender' => $gender,
            'BoarderType' => $boarderType,
            'SquareFeet' => $sqft,
            'Parking' => $parking
        ]);
    }
    public function addAComment($commenttext, $postid, $commentorid)
    {
        $this->insert('Comment', ['Post' => $postid, 'Commentor' => $commentorid, 'comment' => $commenttext]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }
    public function likePost($postid, $userid)
    {
        $this->insert('React', ['Post' => $postid, 'Liker' => $userid, 'Reaction' => 'y']);
    }
    public function postUpdate($userid, $placeid, $caption)
    {
        $this->insert('PostUpdate', ['UserId' => $userid, 'PlaceId' => $placeid, 'Caption' => $caption]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }
    public function addSupport($type, $userId, $support, $description, $requestTo = 7)
    {
        $this->insert('Support', ['SupportType' => $type, 'RequestBy' => $userId, 'SupportTitle' => $support, 'SupportMessage' => $description, 'RequestTo' => $requestTo]);
        if ($this->mysqli->affected_rows == 1) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function feedback($name, $email, $message){
        $this->insert('feedback', ['name'=>$name, 'email'=>$email, 'message'=>$message, 'status'=>'not']);
    }

}