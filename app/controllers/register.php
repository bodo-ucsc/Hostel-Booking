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

            header('Location: ' . BASEURL . '/welcome');
        } else {
            // $this->view('register/student', ['error' => 'Invalid username or password']);
            echo "fail";
        }
    }
    public function boardingownerSignup()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $count = $this->model('insertModel')->check_boardingOwner($username,$password);
        if ($count->num_rows > 0) {
            echo 'This User Already Exists';
            echo ' <br><a href="../adminhome/addBoardingOwner">Try Again</a>  <br>';

        } else {
            $data = array(
                'username' => $username, //$_POST['username'],
                'password' => $password //$_POST['password']
            );
            $this->model('insertModel')->boardingOwnerInsert($data);
            echo ' <br><a href="../adminhome/manageboardingOwner">View Records</a>  <br>';

        }
    }

    // if (isset($_POST['submit'])) {
        //session_start();
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];

    //     //echo $username;
    //     //echo $password;

    //     $result = $this->model('insertModel')->check_boardingOwner($username, $password);
    // if ($count->num_rows > 0) {
    //     echo 'This User Already Exists';
    //     echo ' <br><a href="../adminhome/addBoardingOwner">Try Again</a>  <br>';

    // 
    //    } else {
         //   $data = array(
         //       'username' => $username, //$_POST['username'],
                //'fname' => $_POST['fname'],
                // 'lname' => $_POST['lname'],
                // 'nic'=> $_POST['nic'],
                // 'email' => $_POST['email'],
                // 'username' => $_POST['username'],
         //        'password' => $_POST['password'],
                // 'gender' => $_POST['gender'],
                // 'DOB' => $_POST['DOB'],
                // 'postcode' => $_POST['postcode'],
                // 'street' => $_POST['street'],
                // 'city' => $_POST['city'],
                // 'contactNo' => $_POST['contactNo']
      //      );

    // $this->model('insertModel')->boardingOwnerInsert($data);
    // echo ' <br><a href="../adminhome/manageboardingOwner">View Records</a>  <br>';
    
    //    }else{
        //echo "not submitted";
        //echo ' <br><a href="../adminhome/addBoardingOwner">Try Again</a>  <br>';
    //}






    // $count = $this->model('insertModel')->check_user($nic, $email);
    // if ($count > 0) {
    //     echo 'This User Already Exists';
    // } else {
    //     $data = array(
    //         // 'id' =>null,
    //         'fname' => $_POST['fname'],
    //         'lname' => $_POST['lname'],
    //         'nic' => $_POST['nic'],
    //         'email' => $_POST['email'],
    //         'password' => $_POST['password'],
    //         'gender' => $_POST['gender'],
    //         'DOB' => $_POST['DOB'],
    //         'postcode' => $_POST['postcode'],
    //         'street' => $_POST['street'],
    //         'city' => $_POST['city'],
    //         'contactNo' => $_POST['contactNo']

    //     );
    // $this->model('insertModel')->boardingOwnerInsert($data);
    // echo ' <br><a href="../adminhome/manageboardingOwner">View Records</a>  <br>';     
    // }
    //header('location:index');

}
