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
}