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

    public function verificationTeamLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
        echo $password;

        $result = $this->model('loginModel')->verificationTeamLogin($username, $password);

        if ($result != null) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username']; 
            $_SESSION['role'] = 'student'; 
            echo "success";

            header('Location: ' . BASEURL. '/welcome');
        } else {
            // $this->view('register/student', ['error' => 'Invalid username or password']);
            echo "fail";
        }
    }

}  
