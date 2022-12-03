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

	public function checkData($table,$condition)
	{
		$res = $this->get($table,$condition);
		return $res;
	}
		
	public function getID($table,$column,$condition){
        
		$res = $this->getColumnValue($table,$column,$condition);
		return $res;	      
    }

	public function tableValues($table, $condition, $column = null)
	{
		$res = $this->get($table,$condition);
		return $res;
	}
	
	public function viewFeedInfo($post_id)
	{
		$res=$this->get("postupdate, boardingplace, user", "postupdate.PostId = '$post_id' AND postupdate.UserId = user.UserId AND postupdate.PlaceId = boardingplace.PlaceId");
        return $res;	
	}
}
