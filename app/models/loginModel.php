<?php

class loginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function studentLogin($username, $password)
    {
        $result = $this->get('student', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function verificationTeamLogin($username, $password)
    {
        $result = $this->get('verificationTeamLogin', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function professionalLogin($username, $password)
    {
        $result = $this->get('professional', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function adminLogin($username, $password)
    {
        $result = $this->get('admin', "username = '$username' AND password = '$password'");
        return $result;
    }
    public function boardingOwnerLogin($username, $password)
    {
        $result = $this->get('boardingOwner', "username = '$username' AND password = '$password'");
        return $result;
    }
}