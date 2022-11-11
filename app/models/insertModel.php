<?php

class insertModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function studentInsert($username, $password)
    {
        $result = $this->insert('student', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function verificationTeamInsert($username, $password)
    {
        $result = $this->insert('verificationTeamLogin', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function professionalInsert($username, $password)
    {
        $result = $this->insert('professional', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function adminInsert($username, $password)
    {
        $result = $this->insert('multi', "username = '$username' AND password = '$password'");
        return $result;
    }
    public function boardingOwnerInsert($username, 
                                        $password,
                                        $fname,
                                        $lname,
                                        $email,
                                        $gender,
                                        $DOB,
                                        $postcode,
                                        $street,
                                        $city,
                                        $contactNo,)
    {
        $result = $this->insert('boardingowner', "");
        return $result;
    }
}


?>