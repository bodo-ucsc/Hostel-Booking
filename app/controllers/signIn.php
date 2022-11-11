<?php

class SignIn extends Controller
{
    public function index()
    {
        $this->view('signIn/student');
    }
    public function student()
    {
        $this->view('signIn/student');
    }
    public function verificationteam()
    {
        $this->view('signIn/verificationTeam');
    }
    public function professional()
    {
        $this->view('signIn/professional');
    }
    public function admin()
    {
        $this->view('signIn/admin');
    }
    public function boardingowner()
    {
        $this->view('signIn/boardingowner');
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

            //header('Location: ' . BASEURL. '/welcome');
        } else {
            // $this->view('signIn/student', ['error' => 'Invalid username or password']);
            echo "fail";
        }
    }

    public function adminLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //echo $username;
        //echo $password;

        $result = $this->model('loginModel')->adminLogin($username, $password);

        if ($result != null) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username']; 
            $_SESSION['role'] = 'admin'; 
            echo "success";

            header('Location: ' . BASEURL. '/adminhome');
        } else {
            // $this->view('signIn/student', ['error' => 'Invalid username or password']);
            echo "fail";
        }
    }

}

?>