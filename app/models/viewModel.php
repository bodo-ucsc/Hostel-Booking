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

	public function editBO($user_id)
	{
		$res=$this->joinCols('user','boardingowner'," user.UserId = boardingowner.BoardingOwnerId AND user.UserId = $user_id");
        return $res;
		
	}

	public function getID($table,$column,$value){
        
		$res = $this->getColumnValue($table,$column,"Username = '$value'");
		return $res;
		
		      
    }
	public function getCols($type)
    {
		$res=$this->getMoreCols('user','FirstName','LastName',"UserType = '$type'");
        return $res;
    }

	public function joinTables($tb1,$tb2,$col1,$col2)
    {
		//select * from 'user','boardingowner' where user.UserId = boardingowner.boardingOwnerId;
		$res=$this->joinCols($tb1,$tb2,"$tb1.$col1 = $tb2.$col2");
        return $res;
    }
	
}
