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

    public function getBoardingUsers($PlaceId = null, $userId = null)
    {
        if (isset($PlaceId)) {
            $append = "AND PlaceId = $PlaceId";
        } else {
            $append = "";
        }
        if (isset($userId)) {
            $append .= "AND UserId != $userId";
        }
        $result = $this->unionalt("student,user,boardingplacetenant,boarder", "professional,user,boardingplacetenant,boarder", " firstname,lastname,studentuniversity as tagline, profilepicture", "firstname,lastname,usertype as tagline, profilepicture", "BoarderId = TenantID AND userId = BoarderId  AND userId=StudentId $append", "BoarderId = TenantID AND userId = BoarderId  AND userId=ProfessionalId $append");
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
    }
    public function getUser($user = "admin", $page = 1, $perPage = 1)
    {
        $start = ($page - 1) * $perPage;
        $result = $this->get("User,boarder,$user", 'UserId = ' . $user . 'Id group by UserId', null, "$start,$perPage");
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

    // public function getUser($user = "admin", $id = null)
    // {
    //     if (isset($id)) {
    //         $append = "AND UserId = '$id'";
    //     } else {
    //         $append = null;
    //     } 
    //     if ($user == "student" || $user == "profesional") { 
    //         $result = $this->get("User, Boarder, $user", 'UserId = BoarderId AND BoarderId = ' . $user . "Id $append"   );

    //     } else {
    //         $result = $this->get("User, $user", 'UserId = ' . $user . "Id $append" );

    //     }

    //     if ($result->num_rows > 0) {
    //         return $result;
    //     } else {
    //         return null;
    //     }
    // }

    public function getPlace($PlaceId = NULL)

    {
        $result = $this->getColumn("BoardingPlace", "PlaceId,SummaryLine1, SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking", "PlaceId = '$PlaceId'");
        return $result;
    }

    public function getCitiesAsc()
    {
        $result = $this->get('City', null, 'CityName ASC', null);
        return $result;
    }

    public function getCities($districtName = null)
    {
        $append = null;
        if (isset($districtName)) {
            $append = "DistrictName = '$districtName'";
        }
        $result = $this->get('city', $append);
        return $result;
    }

    public function getDistricts($provinceName = null)
    {
        $append = null;
        if (isset($provinceName)) {
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
        $result = $this->get('boardingplacetenant', "PlaceId = $placeid AND BoarderStatus = 'boarded'");
        return $result;
    }

    public function searchBoarding($query, $SortSearch = null, $Price = null, $PriceType = null, $PropertyType = null, $Province=null, $District=null, $Street = null, $CityName = null, $NoOfMembers = null, $NoOfRooms = null, $NoOfWashRooms = null, $Gender = null, $BoarderType = null, $SquareFeet = null, $Parking = null)
    {

        // $stopwords = array('the', 'and', 'a', 'an', 'of','in','is','to','for','on','that','this','with','need'');
        // $words = explode(" ", $query);
        // $filtered_words = array_diff($words, $stopwords);
        // $new_string = implode(' ', $filtered_words);


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
        if(isset($Province) && $Province != null){
            $append .= " AND Description LIKE '%$Province%'";
        }
        if(isset($District) && $District != null){
            $append .= " AND Description LIKE '%$District%'";
        }
        if (isset($Street) && $Street != null) {
            $append .= " AND Street LIKE '%$Street%'";
        }
        if (isset($CityName) && $CityName != null) {
            $append .= " AND CityName LIKE '%$CityName%'";
        }
        if (isset($NoOfRooms) && $NoOfRooms != 0) {
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

    public function getFromUser($userid)
    {
        $result = $this->get('user', "UserId = $userid");
        return $result;
    }

    public function getBoardingRequests($placeid)
    {
        $result = $this->get('boardingplacetenant', "PlaceId = $placeid AND BoarderStatus = 'not'");
        return $result;
    }
}
