<?php

class registerModel extends Model
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

  
    public function checkUser($username)
    {
        $result = $this->get('user', "username = '$username'");
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

    public function Register($firstname,$lastname,$username,$password,$usertype)
    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert('user', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username, 'Password' => $password, 'UserType' => $usertype]);
        //return last id
        return $this->lastInsertId();
    } 

    public function EditUser($id,$firstname,$lastname,$username,$password,$usertype)
    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->update('user', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username, 'Password' => $password, 'UserType' => $usertype],"UserId = '$id'");
    } 

    public function addVerificationTeam($id,$mobile,$dob,$email,$gender,$address,$nic){
        $this->insert('VerificationTeam', ['VerificationTeamId'=> $id, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'Email'=> $email, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender]);
        
    }

    public function addBoardingOwner($id,$mobile,$dob,$email,$gender,$address,$nic,$occupation,$workplace){
        $this->insert('BoardingOwner', ['BoardingOwnerId'=> $id, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'Email'=> $email, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender ,'Occupation'=> $occupation, 'Workplace'=> $workplace]);
        
    }

    public function updateBoardingOwner($id, $mobile, $dob, $email, $gender, $address, $nic, $occupation, $workplace)
    {
        $this->update('BoardingOwner', ['DateOfBirth'=> $dob, 'NIC'=> $nic, 'Email'=> $email, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender ,'Occupation'=> $occupation, 'Workplace'=> $workplace],"BoardingOwnerId = '$id'");  
    } 

    public function addAdvertisement($userid,$placeid,$date,$message){
        $this->insert('postupdate', ['UserId'=> $userid, 'PlaceId'=> $placeid, 'DateTime'=> $date, 'Caption'=> $message]);
        
    }
    public function checkPlace($placeid)
    {
        $result = $this->get('BoardingPlace', "PlaceId = '$placeid'");
        return $result;
    }

    public function editAdvertisement($pid,$userid,$placeid,$date,$message){
        $this->update('postupdate', ['UserId'=> $userid, 'PlaceId'=> $placeid, 'DateTime'=> $date, 'Caption'=> $message],"PostId = '$pid'");
        
    }



    
    
    
}
