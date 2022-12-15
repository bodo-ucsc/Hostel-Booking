<?php

class viewModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllrecords($table)
	{
		$res = $this->get($table);
		return $res;
	}

	public function checkData($table, $condition)
	{
		$res = $this->get($table, $condition);
		return $res;
	}

	public function getID($table, $column, $condition)
	{

		$res = $this->getColumnValue($table, $column, $condition);
		return $res;
	}

	public function columnValues($table, $condition, $column = null)
	{
		$res = $this->get($table, $condition);
		return $res;
	}
}
//     public function __construct()
//     {
//         parent::__construct();
//     }
//     public function checkUser($cond, $value)
//     {
//         $result = $this->get('user', "$cond = '$value'");
//         return $result;
//     }

//     public function getPost($PostId=NULL)
//     {
//         if(isset($PostId)){
//             $append = "AND PostId = $PostId";
//         }
//         else{
//             $append="";
//         }
//         $result = $this->getColumn("User, PostUpdate, BoardingPlace", "FirstName,LastName,UserType ,ProfilePicture,PostId ,PostUpdate.PlaceId,DateTime,Caption ,Title,SummaryLine1,SummaryLine2,SummaryLine3,Price,PriceType,HouseNo,Street,CityName,PropertyType,NoOfMembers,NoOfRooms,NoOfWashRooms,Gender,BoarderType,SquareFeet,Parking", "User.UserId= PostUpdate.UserId AND PostUpdate.PlaceId=BoardingPlace.PlaceId $append");
//         return $result;
//     }

//     public function getComment($PostId=NULL)
//     {
//         if(isset($PostId)){
//             $append = "AND Post = $PostId";
//         }
//         else{
//             $append="";
//         }
//         $result = $this->getColumn("User,Comment", "FirstName,LastName,DateTime,comment", "Commentor = UserId $append");
//         return $result;
//     }
//     public function getAllrecords($table)
//     {
//         $res = $this->get($table);
//         return $res;
//     }

//     public function getID($table, $column, $condition = NULL)
//     {
//         $res = $this->getColumn($table, $column, $condition);
//         return $res;
//     }

//     public function getUser($user = "admin", $page = 1, $perPage = 1)
//     {

//         $start = ($page - 1) * $perPage;
//         $result = $this->get("User,$user", 'UserId = ' . $user . 'Id', null, "$start,$perPage");
//         if ($result->num_rows > 0) {
//             return $result;
//         } else {
//             return null;
//         }
//     }

//     public function getUserById($user, $id )
//     {
//         $result = $this->get("User,$user", 'UserId = ' . $user . 'Id AND UserId = ' . $id);
//         if ($result->num_rows > 0) {
//             return $result;
//         } else {
//             return null;
//         }
//     }
// }
