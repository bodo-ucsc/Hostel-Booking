<?php
if (isset($_SESSION['username'])) {
    header('Location: ' . BASEURL . '/home');
}
class SignIn extends Controller
{
    public function index($message = null)
    {
        if ($message == 'error') {
            $message = "Incorrect username or password";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Successfully registered";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('signIn/student', ['message' => $message, 'alert' => $alert]);
    }

    public function student($message = null)
    {
        if ($message == 'error') {
            $message = "Incorrect username or password";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Successfully registered";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('signIn/student', ['message' => $message, 'alert' => $alert]);
    }

    public function verificationteam($message = null)
    {
        if ($message == 'error') {
            $message = "Incorrect username or password";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Successfully registered";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('signIn/verificationTeam', ['message' => $message, 'alert' => $alert]);
    }

    public function professional($message = null)
    {
        if ($message == 'error') {
            $message = "Incorrect username or password";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Successfully registered";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('signIn/professional', ['message' => $message, 'alert' => $alert]);
    }

    public function admin($message = null)
    {
        if ($message == 'error') {
            $message = "Incorrect username or password";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Successfully registered";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('signIn/admin', ['message' => $message, 'alert' => $alert]);
    }

    public function boardingowner($message = null)
    {
        if ($message == 'error') {
            $message = "Incorrect username or password";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Successfully registered";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('signIn/boardingowner', ['message' => $message, 'alert' => $alert]);
    }


    // Login Implementation

    public function adminLogin()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'Admin');
        } else {
            header("Location: " . BASEURL . "/signin/admin");
        }
    }

    public function verificationTeamLogin()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'VerificationTeam');
        } else {
            header("Location: " . BASEURL . "/signin/verificationTeam");
        }
    }

    public function studentLogin()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'Student');
        } else {
            header("Location: " . BASEURL . "/signin/student");
        }
    }

    public function professionalLogin()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'Professional');
        } else {
            header("Location: " . BASEURL . "/signin/professional");
        }
    }

    public function boardingOwnerLogin()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->login($username, $password, 'BoardingOwner');
        } else {
            header("Location: " . BASEURL . "/signin/boardingOwner");
        }
    }

    // SignIn Functionality

    public function login($username = null, $password = null, $usertype = null)
    {
        if ($username != null) {

            //echo $username;
            $result = $this->model('loginModel')->login($username, $password, $usertype);

            if ($result != null) {
                session_destroy();
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['userid'] = $row['UserId'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['firstname'] = $row['FirstName'];
                $_SESSION['lastname'] = $row['LastName'];
                $_SESSION['UserId'] = $row['UserId'];
                $_SESSION['role'] = $row['UserType'];
                //echo "success";
                // header('Location: ../home');
                if ($row['UserType'] == 'Admin') {
                    header('Location: ' . BASEURL . '/adminhome');
                }
                if ($row['UserType'] == 'Professional') {
                    
                    header('Location: ' . BASEURL . '/myboarding');
                }
            } else {
                echo "message";
                header("Location: ./$usertype/message");

            }

        } else {
            
            echo "Username not submited";
            header("Location: " . BASEURL . "/signin");
        }

    }

    public function forgot_password()
    {
        header('Location: ' . BASEURL . '/register/boardingowner');
        $this->view('forgot_password');
    }
}