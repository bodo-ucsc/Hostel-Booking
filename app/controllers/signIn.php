<?php
if (isset($_SESSION['username'])) {
    header('Location: ' . BASEURL . '/home');
}
class SignIn extends Controller
{
    public function index($error = null)
    {
        if ($error == 'error') {
            $error = "Incorrect username or password";
        }
        $this->view('signIn/verificationTeam', ['error' => $error]);
    }

    public function student($error = null)
    {
        if ($error == 'error') {
            $error = "Incorrect username or password";
        }
        $this->view('signIn/student', ['error' => $error]);
    }

    public function verificationteam($error = null)
    {
        if ($error == 'error') {
            $error = "Incorrect username or password";
        }
        $this->view('signIn/verificationTeam', ['error' => $error]);
    }

    public function professional($error = null)
    {
        if ($error == 'error') {
            $error = "Incorrect username or password";
        }
        $this->view('signIn/professional', ['error' => $error]);
    }

    public function admin($error = null)
    {
        if ($error == 'error') {
            $error = "Incorrect username or password";
        }
        $this->view('signIn/admin', ['error' => $error]);
    }

    public function boardingowner($error = null)
    {
        if ($error == 'error') {
            $error = "Incorrect username or password";
        }
        $this->view('signIn/boardingowner', ['error' => $error]);
    }

    // Login Implementation

    public function adminLogin()
    { 
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'Admin');
        }
        else {
            header("Location: " . BASEURL . "/signin/admin");
        }
    }

    public function verificationTeamLogin()
    { 
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'VerificationTeam');
        }
        else {
            header("Location: " . BASEURL . "/signin/verificationTeam");
        }
    }

    public function studentLogin()
    { 
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'Student');
        }
        else {
            header("Location: " . BASEURL . "/signin/student");
        }
    }

    public function professionalLogin()
    { 
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'Professional');
        }
        else {
            header("Location: " . BASEURL . "/signin/professional");
        }
    }

    public function boardingOwnerLogin()
    { 
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'BoardingOwner');
        }
        else {
            header("Location: " . BASEURL . "/signin/boardingOwner");
        }
    }

    // SignIn Functionality

    public function login($username = null, $password = null, $usertype = null)
    {
        if ($username != null) {

            echo $username;

            $result = $this->model('loginModel')->login($username, $password, $usertype);

            if ($result!=null) {
                session_destroy();
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $row['Username'];
                $_SESSION['firstname'] = $row['FirstName'];
                $_SESSION['lastname'] = $row['LastName'];
                $_SESSION['UserId'] = $row['UserId'];
                $_SESSION['role'] = $row['UserType'];
                echo "success";
                header('Location: ../home');
            } else {
                echo "error";
                header("Location: ./$usertype/error");

            }

        } else {
            header("Location: " . BASEURL . "/signin");
        }

    }

}