<?php

class loginModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password, $usertype)
    {
        $result = $this->get('user', "Username = '$username' AND UserType = '$usertype'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['Password'])) {
                return $this->get('user', "Username = '$username' ");
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

    public function adminLogin($username,$password)
    {
        $result = $this->get('admin', "username = '$username'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(password_verify($password, $row["password"])){
                return $this->get('admin', "username = '$username' ");
            } else {
               return null;
            }
        } else {
            return null;
        }
    }
    public function boardingOwnerLogin($username, $password)
    {
        $result = $this->get('boardingOwner', "username = '$username' AND password = '$password'");
        return $result;
    }
}




