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

    public function checkData($table, $condition = NULL)
    {
        $result = $this->get($table, $condition);
        
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getBoardingUsers($PlaceId=null,$userId=null){
        if(isset($PlaceId)){
            $append = "AND PlaceId = $PlaceId";
        }else{
            $append = "";
        }
        if(isset($userId)){
            $append .= "AND UserId != $userId";
        }
        $result = $this->unionalt("student,user,boardingplacetenant,boarder","professional,user,boardingplacetenant,boarder"," firstname,lastname,studentuniversity as tagline, profilepicture","firstname,lastname,usertype as tagline, profilepicture","BoarderId = TenantID AND userId = BoarderId  AND userId=StudentId $append","BoarderId = TenantID AND userId = BoarderId  AND userId=ProfessionalId $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

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
    public function getLike($PostId = NULL,$userId = NULL)
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

    public function getAllrecords($table)
    {
        $res = $this->get($table);
        return $res;
    }

    public function getID($table, $column, $condition = NULL)
    {
        $res = $this->getColumn($table, $column, $condition);
        return $res;
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
    public function retrieveBoardingUsers($usertype = null)
    {
        if (isset($usertype)) {
            $append = "AND UserType = '$usertype'";
        } else {
            $append = null;
        }
        $result = $this->union("User,BoardingPlaceTenant,BoardingPlace", "User,BoardingPlaceTenant,BoardingPlace,BoardingOwner", "UserId,FirstName,LastName,UserType,Place,Title", "TenantId=UserId AND PlaceId = Place $append", "PlaceId = Place AND OwnerId=BoardingOwnerId AND BoardingOwnerId=UserId $append");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function getUser($user = "admin", $page = 1, $perPage = 1)
    {
        $start = ($page - 1) * $perPage;
        $result = $this->get("User,$user", 'UserId = ' . $user . 'Id', null, "$start,$perPage");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getUserById($user, $id)
    {
        $result = $this->get("User,$user", 'UserId = ' . $user . 'Id AND UserId = ' . $id);
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

    public function getPlace($PlaceId)
    {
        $result = $this->getColumn("BoardingPlace", "PlaceId,SummaryLine1, SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking", "PlaceId = '$PlaceId'");
        return $result;
    }



    public function getPlace($PlaceId=NULL)
    {
        if(isset($PlaceId)){
            $append = "AND PlaceId = $PlaceId";
        }
        else{
            $append="";
        }
        $result = $this->getColumn("BoardingPlace","PlaceId,SummaryLine1, SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking");
        return $result;
    }

     public function getCitiesAsc()
    {
         $result = $this->get('City', null, 'CityName ASC', null);
         return $result;
     }
    // public function getCities()
    // {
    //     $result = $this->get('City', null, 'CityName ASC', null);
    //     return $result;
    // }

    public function getCities($districtName=null)
    {
        $append = null;
        if(isset($districtName)){
            $append = "DistrictName = '$districtName'";
        }
        $result = $this->get('city', $append);
        return $result;
    }

    public function getDistricts($provinceName = null)
    {
        $append = null;
        if(isset($provinceName)){
            $append = "ProvinceName = '$provinceName'";
        }
        $result = $this->get('district', $append);
        // $sql = "SELECT * FROM distric WHERE ProvinceName = $provinceName";
        // $result = $this->runQuery($sql);
        return $result;
        // return $result;
    }

    public function getProvinces()
    {
        $result = $this->get('province');
        return $result;
    }
    // public function getSupport($type, $userid = null)
    // {
    // }
    // public function getPlace($PlaceId)
    // {
    //     $result = $this->getColumn("BoardingPlace", "PlaceId,SummaryLine1, SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking", "PlaceId = '$PlaceId'");
    //     return $result;
    // }

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

    public function howMany($table, $where = null)
    {
        //        $result = $this->numRowsWhere($table, $where);
        $sql = "SELECT COUNT(1) FROM $table WHERE $where";
        $result = $this->runQuery($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function boardingImages($placeid)
    {
        $result = $this->get('boardingplacepicture', "BoardingPlace = $placeid");
        // $sql = "SELECT * FROM boardingplacepicture WHERE BoardingPlace = $placeid";
        // $result = $this->runQuery($sql);
        return $result;
    }

    public function viewAllBoarding($userid)
    {
        $result = $this->get('boardingPlace', "OwnerId = $userid");
        return $result;
    }

    public function viewABoarding($placeid)
    {
        $result = $this->get('boardingPlace', "PlaceId = $placeid");
        // $sql = "SELECT * FROM boardingPlace WHERE PlaceId = $placeid LIMIT 1";
        // $result = $this->runQuery($sql);
        return $result;
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

    public function getBoardingReviewsbyPlace($placeId)
    {
        // $result = $this->get('reviewrating',"Place = $placeId");
        $sql = "SELECT * FROM reviewrating INNER JOIN user ON reviewrating.BoarderId = user.UserId AND reviewrating.Place = $placeId";
        $result = $this->runQuery($sql);
        return $result;
    }

    public function getRentCount($placeid)
    {
        $sql = "SELECT COUNT($placeid) AS numrows FROM boardingplacerent";
        // $result = $this->numRowsWhere('boardingplacerent',"PlaceId = $placeid");
        $result = $this->runQuery($sql);
        return $result;
    }

    public function getCurrentlyBoarded($placeid)
    {
        $result = $this->get('boardingplacetenant',"PlaceId = $placeid AND BoarderStatus = 'boarded'");
        return $result;
    }

    

    public function getFromUser($userid)
    {
        $result = $this->get('user',"UserId = $userid");
        return $result;
    }

    public function getBoardingRequests($placeid)
    {
        $result = $this->get('boardingplacetenant', "PlaceId = $placeid AND BoarderStatus = 'not'");
        return $result;
    }


}