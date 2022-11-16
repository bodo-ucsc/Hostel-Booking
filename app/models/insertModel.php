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
    // public function boardingOwnerInsert($username, $password,$fname,$lname,$email,$gender,$DOB,$postcode,$street,$city,$contactNo,){

    //     $result = $this->insert('boardingowner', "username='$username',password='$password',fname='$fname',lname='$lname',
    //     email='$email',gender='$gender',DOB='$DOB',postcode='$postcode',street='$street',city='$city',contactNo='$contactNo'");
    //     return $result;
    // }

    public function check_boardingOwner($username,$password)
    {
        //$result = $this->get('user', "username = '$username' AND passwordHash = '$password'");
        $result = $this->get('boardingowner', "username = '$username' AND password = '$password'");
        return $result;
    }

    public function boardingOwnerInsert($data)
    {
        $this->insert('boardingowner', $data);
    }

    public function userInsert($data)
    {
        $this->insert('user', $data);
    }
    // public function insert_user($username, $password)
    // {
    //     $result = $this->insert('tmpbdowner', "$username,$password");
    //     return $result;
    // }
}
