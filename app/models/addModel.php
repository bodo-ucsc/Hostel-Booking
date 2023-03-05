<?php

class addModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($firstname, $lastname, $username, $NIC, $Gender, $email, $ContactNumber, $password, $usertype, $profilepic = null)
    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->insert('User', ['FirstName' => $firstname, 'LastName' => $lastname, 'Username' => $username, 'NIC' => $NIC, 'Gender' => $Gender, 'Email' => $email, 'ContactNumber' => $ContactNumber, 'Password' => $password, 'UserType' => $usertype, 'ProfilePicture' => $profilepic]);
        //return last id
        return $this->lastInsertId();
    }

    public function addAdvertisement($userid, $placeid, $date, $message)
    {
        $result = $this->insert('PostUpdate', ['UserId' => $userid, 'PlaceId' => $placeid, 'DateTime' => $date, 'Caption' => $message]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }



    public function addVerificationTeam($id, $dob, $address)
    {
        $result = $this->insert('VerificationTeam', ['VerificationTeamId' => $id, 'DateOfBirth' => $dob, 'Address' => $address]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addManager($id, $dob, $address)
    {
        $result = $this->insert('Manager', ['ManagerId' => $id, 'DateOfBirth' => $dob, 'Address' => $address]);


        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addBoarder($BoarderId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $Address)
    {
        $result = $this->insert('Boarder', [
            'BoarderId' => $BoarderId,
            'VerifiedStatus' => $VerifiedStatus,
            'NICScanLink' => $NICScanLink,
            'DateOfBirth' => $DateOfBirth, 
            'Address' => $Address
        ]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addProfessional($ProfessionalId, $WorkPlace, $Occupation)
    {
        $result = $this->insert('Professional', [
            'ProfessionalId' => $ProfessionalId,
            'WorkPlace' => $WorkPlace,
            'Occupation' => $Occupation
        ]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }


    public function addStudent($StudentId, $UniversityIDCopyLink, $StudentUniversity, $UniversityIDNo, $UniversityAdmissionLetterCopyLink)
    {
        $result = $this->insert('Student', [
            'StudentId' => $StudentId,
            'UniversityIDCopyLink' => $UniversityIDCopyLink,
            'UniversityAdmissionLetterCopyLink' => $UniversityAdmissionLetterCopyLink,
            'StudentUniversity' => $StudentUniversity,
            'UniversityIDNo' => $UniversityIDNo
        ]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addBoardingOwner($BoardingOwnerId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $Address, $WorkPlace, $Occupation)
    {
        $result = $this->insert('BoardingOwner', [
            'BoardingOwnerId' => $BoardingOwnerId,
            'VerifiedStatus' => $VerifiedStatus,
            'NICScanLink' => $NICScanLink,
            'DateOfBirth' => $DateOfBirth, 
            'Address' => $Address,
            'WorkPlace' => $WorkPlace,
            'Occupation' => $Occupation
        ]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addUniversity($uni)
    {
        $result = $this->insert('university', ['UniversityName' => $uni]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addABoarding($ownerid, $title, $verifiedStatus, $summaryL1, $summaryL2, $summaryL3, $description, $price, $priceType, $houseNo, $street, $cityName, $googleMaps, $propertyType, $noofMembers, $noofRooms, $noofWashRooms, $gender, $boarderType, $sqft, $parking)
    {
        $result = $this->insert('boardingPlace', [
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
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addTenant($placeId, $userId)
    {
        $result = $this->insert('BoardingPlaceTenant', ['Place' => $placeId, 'TenantId' => $userId, 'BoarderStatus' => 'requested']);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function addAComment($commenttext, $postid, $commentorid)
    {
        $result = $this->insert('Comment', ['Post' => $postid, 'Commentor' => $commentorid, 'comment' => $commenttext]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }
    public function likePost($postid, $userid)
    {
        $result = $this->insert('React', ['Post' => $postid, 'Liker' => $userid, 'Reaction' => 'y']);
    }
    public function postUpdate($userid, $placeid, $caption)
    {
        $result = $this->insert('PostUpdate', ['UserId' => $userid, 'PlaceId' => $placeid, 'Caption' => $caption]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }
    public function addSupport($type, $userId, $support, $description, $requestTo = 7)
    {
        $result = $this->insert('Support', ['SupportType' => $type, 'RequestBy' => $userId, 'SupportTitle' => $support, 'SupportMessage' => $description, 'RequestTo' => $requestTo]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

}