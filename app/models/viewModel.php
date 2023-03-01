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
    // feed

    public function getPost($PostId = NULL)
    {
        if (isset($PostId)) {
            $append = "AND PostId = $PostId";
        } else {
            $append = "";
        }
        $result = $this->getColumn("User, PostUpdate", "FirstName,LastName,UserType ,ProfilePicture,PostId ,PlaceId,DateTime,Caption", "User.UserId= PostUpdate.UserId $append");
        return $result;
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
        }   
        else {
            $append = null;
        }
        if (isset($status)) {
            $append .= "AND BoarderStatus = '$status'";
        }
        else {
            $append .= null;
        }
        // $result = $this->getColumn("User,Boarder,BoardingPlaceTenant", "UserId,FirstName,LastName,UserType,Place, BoarderStatus, ProfilePicture", "TenantId=BoarderId AND BoarderId=UserId  $append");
        $result = $this->unionMultiple("User,Boarder,BoardingPlaceTenant,Professional","User,Boarder,BoardingPlaceTenant,Student", "UserId,FirstName,LastName,WorkPlace AS Tagline,Place, BoarderStatus, ProfilePicture","UserId,FirstName,LastName,StudentUniversity AS Tagline,Place, BoarderStatus, ProfilePicture", "TenantId=BoarderId AND BoarderId=UserId AND UserType='Professional' AND ProfessionalId=UserId $append", "TenantId=BoarderId AND BoarderId=UserId AND UserType='Student' AND StudentId=UserId $append");
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
        }   
        else {
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
        }   
        else {
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
            $result = $this->get("User, Boarder, $user", 'UserId = BoarderId AND BoarderId = ' . $user . "Id $append");

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

    public function getPlace($PlaceId = null, $all =null)
    {
        if (isset($PlaceId)) {
            $append = "PlaceId = '$PlaceId'";
        } else {
            $append = null;
        }
        if (isset($all)) {
            $description = "Description,Title,VerifiedStatus,UtilityBillReceiptLink,(SELECT CONCAT(FirstName, ' ', LastName) FROM User WHERE UserId=OwnerId) AS OwnerName,";
        }
        else {
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
        $result = $this->getColumn("BoardingPlace,BoardingOwner,User", "FirstName, LastName, PlaceId, OwnerId, ProfilePicture ", "user.UserId=BoardingOwner.BoardingOwnerId AND BoardingOwner.BoardingOwnerId=BoardingPlace.OwnerId $append ");

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getOwnerPlace($ownerId = null)
    {
        if (isset($ownerId)) {
            $append = "OwnerId = '$ownerId'";
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
        "$append",
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
    public function getSupport($type, $userid = null)
    {
        if (isset($userid)) {
            $append = "AND UserId = $userid";
        } else {
            $append = null;
        }

        $result = $this->get("User,Support", "UserId = RequestBy AND SupportType = '$type' $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }


    public function getAllSupport($type, $page = 1, $perPage = 1)
    {
        $start = ($page - 1) * $perPage;
        $result = $this->get("User,Support", "UserId = RequestBy AND SupportType = '$type'", null, "$start,$perPage");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }


}