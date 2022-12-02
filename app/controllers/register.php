<?php

class Register extends Controller
{
    public function index()
    {
        $this->view('register/student');
    }
    public function student()
    {
        $this->view('register/student');
    }
    public function verificationteam()
    {
        $this->view('register/verificationTeam');
    }
    public function professional()
    {
        $this->view('register/professional');
    }
    public function admin()
    {
        $this->view('register/admin');
    }
    public function boardingowner()
    {
        $this->view('register/boardingowner');
    }

    public function verificationTeamSignUp()
    {
        if (isset($_POST['username'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $usertype="VerificationTeam";

            $id = $this->model('registerModel')->register($firstname,$lastname,$username,$password,$usertype);

            echo $id;

            $mobile = $_POST['mobile'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $nic = $_POST['nic'];

            echo $mobile;
            echo $dob;
            echo $email;
            echo $gender;
            echo $address;
            echo $nic;
            
            $this->model('registerModel')->addVerificationTeam($id,$mobile,$dob,$email,$gender,$address,$nic);

            header("Location: " . BASEURL . "/signin/verificationTeam");
        } else {
            header("Location: " . BASEURL);
        }
    }

}