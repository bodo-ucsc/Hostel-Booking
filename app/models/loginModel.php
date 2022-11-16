<?php

class loginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function studentLogin($username, $password)
    {
        $result = $this->get('student', "username = '$username'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return $result;
            } else {
                return null;
            }
        } else {
            return "incorrect";
        }
    }

    public function verificationTeamLogin($username, $password)
    {
        $result = $this->get('verificationTeamLogin', "username = '$username' ");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return $this->get('verificationTeamLogin', "username = '$username' ");
            } else {
                return null;
            }
        }
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