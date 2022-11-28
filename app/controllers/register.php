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

            // header("Location: " . BASEURL . "/signin/verificationTeam");
        } else {
            header("Location: " . BASEURL);
        }
    }



 public function studentSignUp()
    {
        if (isset($_POST['username'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $usertype="Student";

            $id = $this->model('registerModel')->register($firstname,$lastname,$username,$password,$usertype);

            echo $id;

            $verfiedstatus = "not";
            $niclink = $_POST['niclink'];
            $uniidlink = $_POST['uniidlink'];
            //$uniadmissionlink = $_POST['uniadmissionlink'];
            //$verifiedby = $_POST['verifiedby'];
            $dob = $_POST['dob'];
            $nic = $_POST['nic'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $uni = $_POST['uni'];
            $uniid = $_POST['uniid'];




            echo $verfiedstatus;
            echo $niclink;
            echo $uniidlink;
            //echo $uniadmissionlink;
            //echo $verifiedby;
            echo $dob;
            echo $nic;
            echo $gender;
            echo $email;
            echo $mobile;
            echo $address;
            echo $uni;
            echo $uniid;

            $this->model('registerModel')->addUniversity($uni);


            $this->model('registerModel')->addStudent($id,$verfiedstatus, $niclink,$uniidlink,$dob,$nic,$gender,$email,$mobile,$address,$uni,$uniid);

            // header("Location: " . BASEURL . "/signin/student");
        } else {
            header("Location: " . BASEURL);
        }
    }


}


