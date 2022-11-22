<?php

class registerModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function verificationTeamRegister($username, $password)
    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert('verificationTeamLogin', ['username' => $username, 'password' => $password]);
    } 

    
    
}