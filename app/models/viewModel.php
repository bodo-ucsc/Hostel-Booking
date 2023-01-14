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
        return $result;
    }

    public function getPost($PostId = NULL)
    {
        if (isset($PostId)) {
            $append = "AND PostId = $PostId";
        } else {
            $append = "";
        }
        $result = $this->getColumn("User, PostUpdate, BoardingPlace", "FirstName,LastName,UserType ,ProfilePicture,PostId ,PostUpdate.PlaceId,DateTime,Caption ,Title,SummaryLine1,SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking", "User.UserId= PostUpdate.UserId AND PostUpdate.PlaceId=BoardingPlace.PlaceId $append");
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
    public function checkData($table, $condition = NULL)
    {
        $res = $this->getColumn($table, "*", $condition);
        return $res;
    }

    public function retrieveUser($user)
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
        $result = $this->get('city', null, 'CityName ASC', null);
        return $result;
    }

    public function getCities($districName)
    {
        $result = $this->get('city', "DistricName = $districName");
        return $result;
    }

    public function getDistrics($provinceName)
    {
        $result = $this->get('distric', "ProviceName = $provinceName");
        return $result;
    }

    public function getProvinces()
    {
        $result = $this->get('province');
        return $result;
    }
    public function getSupport($type,$userid = null)
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
       
    public function getAllSupport($type,$page = 1, $perPage = 1)
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