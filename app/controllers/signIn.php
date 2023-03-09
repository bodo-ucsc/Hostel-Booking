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
        $this->view('signIn/index', ['message' => $message, 'alert' => $alert]);
    }

    // Login Implementation

    public function login()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $this->model('loginModel')->login($username, $password);

            if ($result != null) {
                session_destroy();
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $row['Username'];
                $_SESSION['firstname'] = $row['FirstName'];
                $_SESSION['lastname'] = $row['LastName'];
                $_SESSION['UserId'] = $row['UserId'];
                $_SESSION['role'] = $row['UserType'];
                if (isset($row['ProfilePicture']) && $row['ProfilePicture'] != null) {
                    $_SESSION['profilepic'] = $row['ProfilePicture'];
                }

                echo "success";
                if ($row['UserType'] == 'Admin') {
                    header('Location: ' . BASEURL . '/admin');
                }

                if ($row['UserType'] == 'BoardingOwner') {
                    header('Location: ' . BASEURL . '/BoardingOwner');
                }

                header('Location: ' . BASEURL);
            } else {
                echo "message";
                header("Location: " . BASEURL . "/signin/error");

            }

        } else {
            header("Location: " . BASEURL . "/signin");
        }
    }

    // SignIn Functionality


    public function forgot_password()
    {
        header('Location: ' . BASEURL . '/register/boardingowner');
        $this->view('forgot_password');
    }
}