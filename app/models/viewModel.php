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
    public function getComment($PostId=NULL)
    {
        if(isset($PostId)){
            $append = "AND Post = $PostId";
        }
        else{
            $append="";
        }
        $result = $this->getColumn("User,Comment", "FirstName,LastName,DateTime,comment", "Commentor = UserId $append","DateTime ASC");
        return $result;
    }

	public function getID($table, $column, $condition=null)
	{
		$res = $this->getColumn($table, $column, $condition);
		return $res;
	}

	public function columnValues($table, $condition, $column = null)
	{
		$res = $this->get($table, $condition);
		return $res;
	}
}
