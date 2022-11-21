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

	public function viewOnerecord($user_id)
	{
	 echo $user_id;
        $res = $this->get('boardingowner',"user_id = '$user_id'");
		return $res;
	}


    // public function verificationTeamRegister($username, $password)
    // {
    //     //hashing the password
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $this->insert('verificationTeamLogin', ['username' => $username, 'password' => $password]);
    // }
	

}
