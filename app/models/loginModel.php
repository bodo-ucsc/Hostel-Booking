<?php

class loginModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $result = $this->union('User', 'User', '*', "Username = '$username' ", "Email = '$username'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['Password'])) {
                return $this->union('User', 'User', '*', "Username = '$username' ", "Email = '$username'");
            } else {
                return null;
            }
        }
    }

    public function retrieveUserName()
    {
        $result = $this->getColumn('User', 'Username');
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function retrieveUserEmail()
    {
        $result = $this->getColumn('User', 'Email');
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function retrieveUserNumber()
    {
        $result = $this->getColumn('User', 'ContactNumber');
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
} 