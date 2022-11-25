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

	public function getUserId($table,$username){
        
        $sql = "SELECT UserId FROM $table WHERE username = $username";
        $result = $this->runQuery($sql);
		return $result;
		      
    }


    // public function verificationTeamRegister($username, $password)
    // {
    //     //hashing the password
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $this->insert('verificationTeamLogin', ['username' => $username, 'password' => $password]);
    // }
	

}
