<?php

class registerModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Register($firstname,$lastname,$username,$password,$usertype)

    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert('user', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username, 'Password' => $password, 'UserType' => $usertype]);
        //return last id
        return $this->lastInsertId();
    } 

    public function addVerificationTeam($id,$mobile,$dob,$email,$gender,$address,$nic){
        $this->insert('VerificationTeam', ['VerificationTeamId'=> $id, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'Email'=> $email, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender]);
        
    }
    
    public function addBoardingOwner($id,$verificationStatus,$nicLink,$mobile,$dob,$email,$gender,$address,$nic,$occupation,$workplace){
        $this->insert('BoardingOwner', ['BoardingOwnerId'=> $id, 'VerifiedStatus'=>$verificationStatus, 'NICScanLink'=>$nicLink, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'Email'=> $email, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender, 'Occupation'=>$occupation, 'WorkPlace'=>$workplace]);
        
    }
    
    
}