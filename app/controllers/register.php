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

        echo $username;
        echo $password;

        $result = $this->model('loginModel')->verificationTeamLogin($username, $password);

        if ($result != null) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'student';
            echo "success";

            header('Location: ' . BASEURL . '/welcome');
        } else {
            // $this->view('register/student', ['error' => 'Invalid username or password']);
            echo "fail";
        }

    }
}
    
    public function boardingownerSignup()
    {
        if (isset($_POST['submit'])) {
            
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $nic = $_POST['nic'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $DOB = $_POST['DOB'];
            $address = $_POST['address'];
            $contactNo = $_POST['contactNo'];

            if ($_POST["password"] !== $_POST["ComPassword"]) {
                die("both password must be match");
            } else {
                $date = date_create();
                if ($date < $DOB) {
                    die("Date Of Birth is a future date");
                } else {

                    $passwordHash = password_hash($_POST["password"],PASSWORD_DEFAULT);
                    //$res = $this->model('registerModel')->check_boardingOwner($username, $passwordHash);

                    //in here have to check in user table in db not bo table
                    $count = $this->model('registerModel')->check_boardingOwner($username, $passwordHash); 
                    //if ($res->num_rows > 0) {
                    if ($count->num_rows > 0) {
                        echo 'This User Already Exists'; //have to look in users table in db
                        echo ' <br><a href="../adminhome/addBoardingOwner">Try Again</a>  <br>';
                    } else {
                        $data = array(
                            'username' => $username, //$_POST['username'],
                            'first_name' => $_POST['first_name'],
                            'last_name' => $_POST['last_name'],
                            'nic' => $_POST['nic'],
                            'email' => $_POST['email'],
                            'password' => $passwordHash,
                            'gender' => $_POST['gender'],
                            'DOB' => $_POST['DOB'],
                            'address' => $_POST['address'],
                            'contactNo' => $_POST['contactNo']
                        );
                        $userData = array(
                            'username' => $username, 
                            'passwordHash' => $passwordHash,
                            'role' => "boardingowner"
                        );

                        $this->model('registerModel')->userInsert($userData);

                        $this->model('registerModel')->boardingOwnerInsert($data);
                        echo "Data added successfully";?>
                        <br>
                        <?php
                        echo ' <br><a href="../adminhome/viewboardingOwner">View Records</a>  <br>';
                        //echo "header('Location: ' . BASEURL . '/adminhome')";
                    }
                }
            }
        } else {
            echo "Not Submitted";
            echo ' <br><a href="../adminhome/addBoardingOwner">Try Again</a>  <br>';
        }
    }
}
}
