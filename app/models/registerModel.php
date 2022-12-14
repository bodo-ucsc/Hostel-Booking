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

    public function checkUser($cond,$value)
    {
        $result = $this->get('user', "$cond = '$value'");
        return $result;
    }

    public function insertData($table,$data)
    {
        $result = $this->insert($table, $data);
        return $result;
    }
  
    public function modifyData($table,$data,$condition)
    {
        $result = $this->update($table,$data,$condition);
        return $result;
    }

    public function Register($firstname, $lastname, $username,$email, $password, $usertype)
    {
        //hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert('user', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username, 'Email' => $email, 'Password' => $password, 'UserType' => $usertype]);
        //return last id
        return $this->lastInsertId();
    } 

    public function EditUser($id, $firstname, $lastname, $username, $email, $usertype)
    {
        $this->update('user', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username, 'UserType' => $usertype, 'Email' => $email],"UserId = '$id'");
    } 

    public function addVerificationTeam($id,$mobile,$dob,$gender,$address,$nic){
        $this->insert('VerificationTeam', ['VerificationTeamId'=> $id, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender]);
        
    }

    public function addBoardingOwner($id, $mobile, $dob, $gender, $address, $nic, $occupation, $workplace){
        $this->insert('BoardingOwner', ['BoardingOwnerId'=> $id, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender ,'Occupation'=> $occupation, 'Workplace'=> $workplace]);
        
    }

    public function updateBoardingOwner($id, $mobile, $dob, $gender, $address, $nic, $occupation, $workplace)
    {
        $this->update('BoardingOwner', ['DateOfBirth'=> $dob, 'NIC'=> $nic, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender ,'Occupation'=> $occupation, 'Workplace'=> $workplace],"BoardingOwnerId = '$id'");  
    } 

    public function addAdvertisement($userid,$placeid,$date,$message){
        $this->insert('postupdate', ['UserId'=> $userid, 'PlaceId'=> $placeid, 'DateTime'=> $date, 'Caption'=> $message]);
        
    }
   
    public function editAdvertisement($pid,$userid,$placeid,$date,$message){
        $this->update('postupdate', ['UserId'=> $userid, 'PlaceId'=> $placeid, 'DateTime'=> $date, 'Caption'=> $message],"PostId = '$pid'");
        
    }

    public function addProfessional($id,$verificationStatus,$nicLink,$mobile,$dob,$gender,$address,$nic,$occupation,$workplace){
        $this->insert('Professional', ['ProfessionalId'=> $id, 'VerifiedStatus'=>$verificationStatus, 'NICScanLink'=>$nicLink, 'DateOfBirth'=> $dob, 'NIC'=> $nic, 'ContactNumber'=> $mobile, 'Address'=> $address, 'Gender'=> $gender, 'Occupation'=>$occupation, 'WorkPlace'=>$workplace]);
        
    }
    
}
