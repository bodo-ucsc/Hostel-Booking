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


    public function addFriend($userid = null, $friendid = null)
    {
        // `MainFriendId`, `FriendId`, `status`
        $result = $this->insert('Friend', ['MainFriendId' => $userid, 'FriendId' => $friendid]);
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

    public function addPlace(
        $OwnerId,
        $Title,
        $UtilityBillReceiptLink,
        $SummaryLine1,
        $SummaryLine2,
        $SummaryLine3,
        $Description,
        $Price,
        $PriceType,
        $HouseNo,
        $Street,
        $CityName,
        $PropertyType,
        $NoOfMembers,
        $NoOfRooms,
        $NoOfWashRooms,
        $Gender,
        $BoarderType,
        $SquareFeet,
        $Parking
    ) {
        $result = $this->insert('BoardingPlace', [
            'OwnerId' => "$OwnerId",
            'Title' => "$Title",
            'UtilityBillReceiptLink' => "$UtilityBillReceiptLink",
            'SummaryLine1' => "$SummaryLine1",
            'SummaryLine2' => "$SummaryLine2",
            'SummaryLine3' => "$SummaryLine3",
            'Description' => "$Description",
            'Price' => "$Price",
            'PriceType' => "$PriceType",
            'HouseNo' => "$HouseNo",
            'Street' => "$Street",
            'CityName' => "$CityName",
            'PropertyType' => "$PropertyType",
            'NoOfMembers' => "$NoOfMembers",
            'NoOfRooms' => "$NoOfRooms",
            'NoOfWashRooms' => "$NoOfWashRooms",
            'Gender' => "$Gender",
            'BoarderType' => "$BoarderType",
            'SquareFeet' => "$SquareFeet",
            'Parking' => "$Parking"
        ]);
  
        if ($result) {
            return $this->lastInsertId();
        } else {
            return 'fail';
        }
    }

    public function addImage($placeId, $imageLink)
    {
        $result = $this->insert('BoardingPlacePicture', ['BoardingPlace' => "$placeId", 'PictureLink' => "$imageLink"]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function inviteFriend($userid, $friendid, $place)
    { 
        $result = $this->insert('FriendInvite', ['Tenant' => $userid, 'FriendId' => $friendid, 'PlaceId' => $place]);
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
    public function addSupport($type, $userId, $support, $description, $image, $requestTo = 'Admin')
    {
        $result = $this->insert('Support', ['SupportType' => $type, 'RequestBy' => $userId, 'SupportTitle' => $support, 'SupportMessage' => $description, 'SupportImageLink' => $image, 'RequestTo' => $requestTo]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function postReview($userId, $placeId, $rating, $review)
    { 
        $result = $this->insert('ReviewRating', ['BoarderId' => $userId, 'Place' => $placeId, 'Rating' => $rating, 'Review' => $review]);
        if ($result) {
            return 'success';
        } else {
            return 'fail';
        }
    }


}