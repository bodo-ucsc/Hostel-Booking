<?php

class viewModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllrecords($table)
	{
        $res=$this->get($table);
        return $res;
	}

	public function viewOnerecord($Userid)
	{
	 //echo $Userid;
        $res = $this->get('boardingowner',"Userid = '$Userid'");
		return $res;
		
	}

	public function viewBOInfo($user_id)
	{
		$res=$this->joinCols('user','boardingowner', "user.UserId = '$user_id' AND user.UserId = boardingowner.BoardingOwnerId");
        return $res;	
	}

	public function getID($table,$column,$condition,$value){
        
		//$res = $this->getColumnValue($table,$column,"Username = '$value'");
		$res = $this->getColumnValue($table,$column,"$condition = '$value'");
		return $res;	      
    }

	public function getCols($type)
    {
		$res=$this->getMoreCols('user','FirstName','LastName',"UserType = '$type'");
        return $res;
    }

	//join 2 tables
	public function joinTables($tb1,$tb2,$col1,$col2)
    {
		//select * from 'user','boardingowner' where user.UserId = boardingowner.boardingOwnerId;
		$res=$this->joinCols($tb1,$tb2,"$tb1.$col1 = $tb2.$col2");
        return $res;
    }

	//join 3 tables
	public function moreTables($tb1,$tb2,$tb3,$col1,$col2)
    {
		$res=$this->Threetables($tb1,$tb2,$tb3,"$tb1.$col1 = $tb2.$col1 AND $tb2.$col2 = $tb3.$col2");
        return $res;
    }

	public function viewFeedInfo($post_id)
	{
		$res=$this->Threetables('postupdate','boardingplace','user', "postupdate.PostId = '$post_id' AND postupdate.UserId = user.UserId AND postupdate.PlaceId = boardingplace.PlaceId");
        return $res;	
	}
}
