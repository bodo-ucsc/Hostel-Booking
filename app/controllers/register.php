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
    public function verificationteam( )
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
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->model('registerModel')->verificationTeamRegister($username, $password);
    }

}  
