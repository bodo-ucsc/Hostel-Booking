<?php

class viewModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllrecords()
	{
        $res=$this->get('boardingowner');
        return $res;
	}

    
	public function viewOnerecord($id)
	{
		//return $this->db->select("SELECT * FROM `mvc` WHERE id='".$id."' LIMIT 1");
        return $this->get('boardingowner',"user_id = '$id'");
	}


    // public function verificationTeamRegister($username, $password)
    // {
    //     //hashing the password
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $this->insert('verificationTeamLogin', ['username' => $username, 'password' => $password]);
    // }
	

}
