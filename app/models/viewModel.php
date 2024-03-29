<?php

class viewModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkUser($cond, $value)
    {
        $result = $this->get('user', "$cond = '$value'");
        if ($result != null) {
            return $result;
        } else {
            return null;
        }
    }


    public function getID($table, $column, $condition = NULL)
    {
        $res = $this->getColumn($table, $column, $condition);
        return $res;
    }

    public function getTable($table, $condition = NULL)
    {
        $result = $this->get($table, $condition);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getFriend($user = null, $status = null, $friend = null)
    {
        // `MainFriendId`, `FriendId`, `status`
        if (isset($user) && isset($friend) && isset($status)) {
            $result = $this->get('Friend', "(MainFriendId = '$user' AND FriendId = '$friend') OR (MainFriendId = '$friend' AND FriendId = '$user')  AND status = '$status'");
        } else if (isset($user) && isset($status)) {
            $result = $this->get('Friend', "(MainFriendId = '$user' OR FriendId = '$user') AND status = '$status'");
        } else if (isset($user)) {
            $result = $this->get('Friend', "MainFriendId = '$user' OR FriendId = '$user'");
        } else {
            $result = $this->get('Friend');
        }
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getBoarderDetails($userIdarray = null)
    {
        if (isset($userIdarray)) {
            // $array['UserId'] = $row['MainFriendId'];
            // $array['type'] = 'main';
            $result = $this->get('boarderdetails', "UserId IN (" . implode(',', array_map(function ($entry) {
                return $entry['UserId'];
            }, $userIdarray)) . ")");
        } else {
            $result = $this->get('boarderdetails');
        }
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }



    public function searchBoarding($query, $SortSearch = null, $Price = null, $PriceType = null, $PropertyType = null, $Street = null, $CityName = null, $NoOfMembers = null, $NoOfRooms = null, $NoOfWashRooms = null, $Gender = null, $BoarderType = null, $SquareFeet = null, $Parking = null)
    {
        $terms = explode(" ", $query);
        $sql = "(Title LIKE '%$terms[0]%' OR PropertyType LIKE '%$terms[0]%' OR Description LIKE '%$terms[0]%')";
        for ($i = 1; $i < count($terms); $i++) {
            $sql .= " AND (Title LIKE '%$terms[$i]%' OR PropertyType LIKE '%$terms[$i]%' OR Description LIKE '%$terms[$i]%')";
        }
        //echo $sql;
        $append = null;
        if (isset($Price) && $Price != 0) {
            $append .= " AND Price BETWEEN '0' AND $Price";
        }
        if (isset($PriceType) && $PriceType != null) {
            $append .= " AND PriceType = '$PriceType'";
        }
        if (isset($PropertyType) && $PropertyType != null) {
            $append .= " AND PropertyType LIKE '%$PropertyType%'";
        }
        if (isset($Street) && $Street != null) {
            $append .= " AND Street LIKE '%$Street%'";
        }
        if (isset($CityName) && $CityName != null) {
            $append .= " AND CityName LIKE '%$CityName%'";
        }
        if (isset($NoOfRooms) && $NoOfRooms != 0) {
            echo "rooms=" . $NoOfRooms;
            $append .= " AND NoOfRooms = '$NoOfRooms'";
        }
        if (isset($NoOfMembers) && $NoOfMembers != 0) {
            $append .= " AND NoOfMembers >= '$NoOfMembers'";
        }
        if (isset($NoOfWashRooms) && $NoOfWashRooms != 0) {
            $append .= " AND NoOfWashRooms >= '$NoOfWashRooms'";
        }
        if (isset($Gender) && $Gender != null) {
            $append .= " AND Gender = '$Gender'";
        }
        if (isset($BoarderType) && $BoarderType != null) {
            $append .= " AND BoarderType = '$BoarderType'";
        }
        if (isset($SquareFeet) && $SquareFeet != 0) {
            $append .= " AND SquareFeet >= '$SquareFeet'";
        }
        if (isset($Parking) && $Parking != null) {
            $append .= " AND Parking = '$Parking'";
        }
        if (isset($SortSearch) && $SortSearch != null) {
            if ($SortSearch == 'lowTohigh') {
                $order = " ORDER BY Price ASC";
                $append .= $order;
            } else if ($SortSearch == 'highTolow') {
                $order = " ORDER BY Price DESC";
                $append .= $order;
            } elseif ($SortSearch == 'bestMatch') {
                $order = null;
                $append .= $order;
            }
        }
        //$result = $this->get('boardingplace', "(Title LIKE '%$query%' OR PropertyType LIKE '%$query%' OR Description LIKE '%$query%' OR CityName LIKE '%$query%')$append");
        $result = $this->get('boardingplace', "$sql $append");
        return $result;
    }


    // feed

    public function getPost($PostId = NULL, $OwnerId = NULL)
    {
        if (isset($PostId) && $PostId != 'null') {
            $append = "AND PostId = $PostId";
        } else {
            $append = "";
        }
        if (isset($OwnerId)) {
            $append .= " AND OwnerId = $OwnerId";
            $result = $this->getColumn("User, BoardingOwner, BoardingPlace, PostUpdate", "FirstName,LastName,User.UserId, UserType ,ProfilePicture,PostId ,PostUpdate.PlaceId,DateTime,Caption,User.UserId", "User.UserId= PostUpdate.UserId AND PostUpdate.PlaceId = BoardingPlace.PlaceId AND OwnerId = BoardingOwnerId $append");
        } else {
            $result = $this->getColumn("User, PostUpdate", "FirstName,LastName,User.UserId, UserType ,ProfilePicture,PostId ,PlaceId,DateTime,Caption", "User.UserId= PostUpdate.UserId $append");
        }

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getCommentCount($PostId = NULL)
    {
        if (isset($PostId)) {
            $append = " Post = $PostId";
        } else {
            $append = "";
        }
        $result = $this->getGroup("Comment", "Post, COUNT(Post) AS Comments", "$append", "Post");
        return $result;
    }
    public function getComment($PostId = NULL)
    {
        if (isset($PostId)) {
            $append = "AND Post = $PostId";
        } else {
            $append = "";
        }
        $result = $this->getColumn("User,Comment", "FirstName,LastName,DateTime,comment", "Commentor = UserId $append", "DateTime ASC");
        return $result;
    }

    public function getLikeCount($PostId = NULL)
    {
        if (isset($PostId)) {
            $append = "AND Post = $PostId";
        } else {
            $append = "";
        }
        $result = $this->getGroup("React", "Post, COUNT(Post) AS Likes", "Reaction = 'y' $append", "Post");
        return $result;
    }
    public function getLike($PostId = NULL, $userId = NULL)
    {
        if (isset($PostId) && $PostId != 0) {
            $append = "AND Post = '$PostId'";
        } else {
            $append = "";
        }
        if (isset($userId)) {
            $append .= "AND UserId = '$userId'";
        } else {
            $append .= "";
        }
        $result = $this->getColumn("User,React", "FirstName,LastName,Liker,Post,DateTime,Reaction", "UserId = Liker $append", "Post ASC");
        if ($result != null) {
            return $result;
        } else {
            return null;
        }
    }

    public function getVerified($userId = NULL)
    {
        if (isset($userId)) {
            $append1 = "AND BoarderId = '$userId'";
            $append2 = "AND BoardingOwnerId = '$userId'";
        } else {
            $append1 = "";
            $append2 = "";
        }
        $result = $this->unionMultiple("Boarder", "BoardingOwner", "BoarderId AS UserId,VerifiedStatus", "BoardingOwnerId AS UserId,VerifiedStatus", "VerifiedStatus = 'verified' $append1", "VerifiedStatus = 'verified' $append2");
        if ($result != null) {
            return $result;
        } else {
            return null;
        }
    }

    public function retrieveUser($user = null)
    {
        if (isset($user)) {
            $append = "UserType = '$user'";
        } else {
            $append = null;
        }
        $result = $this->get("User", "$append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function retrieveBoardingUsers($usertype = null, $userId = null)
    {
        if (isset($usertype)) {
            $append = "AND UserType = '$usertype'";
        } else {
            $append = null;
        }
        if (isset($userId)) {
            $append .= "AND UserId = '$userId'";
        } else {
            $append .= null;
        }
        $result = $this->union("User,Boarder,BoardingPlaceTenant,BoardingPlace", "User,BoardingPlace,BoardingOwner", "UserId,FirstName,LastName,UserType,PlaceId,Title, ProfilePicture, ContactNumber", "TenantId=BoarderId AND BoarderId=UserId  AND PlaceId = Place AND BoarderStatus='boarded' $append", "OwnerId=BoardingOwnerId AND BoardingOwnerId=UserId $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function retrieveBoardingMembers($placeId = null, $status = null)
    {
        if (isset($placeId)) {
            $append = "AND Place = '$placeId'";
        } else {
            $append = null;
        }
        if (isset($status)) {
            $append .= "AND BoarderStatus = '$status'";
        } else {
            $append .= null;
        }
        // $result = $this->getColumn("User,Boarder,BoardingPlaceTenant", "UserId,FirstName,LastName,UserType,Place, BoarderStatus, ProfilePicture", "TenantId=BoarderId AND BoarderId=UserId  $append");
        $result = $this->unionMultiple("User,Boarder,BoardingPlaceTenant,Professional", "User,Boarder,BoardingPlaceTenant,Student", "UserId,FirstName,LastName,WorkPlace AS Tagline,Place, BoarderStatus, ProfilePicture, ContactNumber, DateTime, LeaveNotice", "UserId,FirstName,LastName,StudentUniversity AS Tagline,Place, BoarderStatus, ProfilePicture, ContactNumber, DateTime, LeaveNotice", "TenantId=BoarderId AND BoarderId=UserId AND UserType='Professional' AND ProfessionalId=UserId $append", "TenantId=BoarderId AND BoarderId=UserId AND UserType='Student' AND StudentId=UserId $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function retrieveBoardingMemberStatus($userId = null, $status = null, $placeId = null)
    {
        if (isset($userId)) {
            $append = "AND BoarderId = '$userId'";
        } else {
            $append = null;
        }
        if (isset($status)) {
            $append .= "AND BoarderStatus = '$status'";
        } else {
            $append .= null;
        }
        if (isset($placeId)) {
            $append .= "AND Place = '$placeId'";
        } else {
            $append .= null;
        }
        $result = $this->getColumn("User,Boarder,BoardingPlaceTenant", "BoarderId, Place, BoarderStatus", "TenantId=BoarderId AND BoarderId=UserId  $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function retrieveBed($placeId = null)
    {
        if (isset($placeId)) {
            $append = "AND Place = '$placeId'";
        } else {
            $append = null;
        }
        $result = $this->getColumn("User,Boarder,BoardingPlaceTenant", "UserId,FirstName,LastName,Bed", "TenantId=BoarderId AND BoarderId=UserId AND BoarderStatus = 'boarded' AND Bed IS NOT NULL $append", "Bed ASC");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function retrieveNoBed($placeId = null)
    {
        if (isset($placeId)) {
            $append = "AND Place = '$placeId'";
        } else {
            $append = null;
        }
        $result = $this->getColumn("User,Boarder,BoardingPlaceTenant", "UserId,FirstName,LastName", "TenantId=BoarderId AND BoarderId=UserId AND BoarderStatus = 'boarded' AND Bed IS NULL $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getImage($PlaceId = NULL)
    {
        if (isset($PlaceId)) {
            $append = "BoardingPlace = '$PlaceId'";
        } else {
            $append = null;
        }
        $result = $this->get("BoardingPlacePicture", "$append");
        return $result;
    }

    public function getUser($user = "admin", $id = null)
    {
        if (isset($id)) {
            $append = "AND UserId = '$id'";
        } else {
            $append = null;
        }
        if ($user == "student" || $user == "professional") {
            $result = $this->get("User, Boarder, $user", 'UserId = BoarderId AND BoarderId = ' . $user . "Id AND Deleted='n' $append");

        } else {
            $result = $this->get("User, $user", 'UserId = ' . $user . "Id $append");

        }

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getCities()
    {
        $result = $this->get('City', null, 'CityName ASC', null);
        return $result;
    }

    public function getPlace($PlaceId = null, $all = null)
    {
        if (isset($PlaceId)) {
            $append = "PlaceId = '$PlaceId'";
        } else {
            $append = null;
        }
        if (isset($all)) {
            $description = "Description,Title,VerifiedStatus,UtilityBillReceiptLink,(SELECT CONCAT(FirstName, ' ', LastName) FROM User WHERE UserId=OwnerId) AS OwnerName,";
        } else {
            $description = null;
        }
        $result = $this->getColumn("BoardingPlace", "PlaceId, OwnerId,(SELECT COUNT(Place) FROM BoardingPlaceTenant WHERE Place = PlaceId AND BoarderStatus='boarded') AS Boarded, $description SummaryLine1, SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking", "$append");
        return $result;
    }

    public function getOwner($ownerId = null)
    {
        if (isset($ownerId)) {
            $append = "AND OwnerId = '$ownerId'";
        } else {
            $append = null;
        }
        $result = $this->getColumn("BoardingPlace,BoardingOwner,User", "FirstName, LastName, PlaceId, OwnerId, ProfilePicture ", "user.UserId=BoardingOwner.BoardingOwnerId AND BoardingOwner.BoardingOwnerId=BoardingPlace.OwnerId AND BoardingPlace.VerifiedStatus='verified' $append ");

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getOwnerAll($ownerId = null)
    {
        if (isset($ownerId)) {
            $append = "AND BoardingOwnerId = '$ownerId'";
        } else {
            $append = null;
        }
        $result = $this->getColumn(" BoardingOwner,User", "FirstName, LastName, BoardingOwnerId, ProfilePicture ", "UserId=BoardingOwnerId  AND BoardingOwner.VerifiedStatus='verified'  $append ");

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getOwnerPlace($ownerId = null)
    {
        if (isset($ownerId)) {
            $append = "AND OwnerId = '$ownerId'";
        } else {
            $append = null;
        }
        $result = $this->getColumnGroup(
            "BoardingPlace 
        JOIN BoardingOwner ON OwnerId = BoardingOwnerId
        JOIN User ON BoardingOwnerId = UserId 
        LEFT JOIN BoardingPlacePicture ON BoardingPlace= PlaceId",
            "FirstName, 
         LastName, 
         PlaceId, 
         OwnerId,  
         MAX(PictureLink) AS PictureLink,
        CityName,
        CONCAT(HouseNo, ', ', Street) AS Address,
        NoOfMembers,
        (SELECT COUNT(Place) FROM BoardingPlaceTenant WHERE Place = PlaceId AND BoarderStatus='boarded') AS Boarded",
            " BoardingPlace.VerifiedStatus='verified' $append",
            " FirstName, 
        LastName, 
        PlaceId, 
        OwnerId, 
        ProfilePicture"
        );

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    // support
    public function getSupport($type, $userType, $userid = null)
    {
        if (isset($userType)) {
            $append = "AND RequestTo = $userType";
        } else {
            $append = null;
        }
        if (isset($userid)) {
            $append .= "AND UserId = $userid";
        } else {
            $append .= null;
        }

        $result = $this->get("User,Support", "UserId = RequestBy AND SupportType = '$type' $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }



    public function getWorkUni($usertype = null, $id = null)
    {
        if (isset($id)) {
            $append = "AND UserId = $id";
        } else {
            $append = null;
        }

        if ($usertype == 'Student') {
            $result = $this->getColumn("User,Boarder,Student", "StudentUniversity AS Place", "BoarderId=UserId AND UserType='Student' AND StudentId=UserId $append");
        } else if ($usertype == 'Professional') {
            $result = $this->getColumn("User,Boarder,Professional", "WorkPlace AS Place", "BoarderId=UserId AND UserType='Professional' AND ProfessionalId=UserId $append");
        }

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }



}