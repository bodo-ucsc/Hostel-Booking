<?php

class SignIn extends Controller
{
    public function index()
    {
        $this->view('signIn/student/index');
    }
    public function student()
    {
        $this->view('signIn/student/index');
    }
    public function verificationteam()
    {
        $this->view('signIn/verificationTeam/index');
    }
    public function professional()
    {
        $this->view('signIn/professional/index');
    }
}

?>