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
        $this->view('register/boardingOwner');
    }

    public function verificationTeamSignUp()
    {
        if (isset($_POST['username'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usertype="VerificationTeam";

            $id = $this->model('registerModel')->register($firstname, $lastname, $username,$email, $password, $usertype);

            $password = $_POST['password'];
            $usertype="VerificationTeam";



            //echo $id;

            $mobile = $_POST['mobile'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $nic = $_POST['nic'];



            $this->model('registerModel')->addVerificationTeam($id, $mobile, $dob, $gender, $address, $nic);

            echo $mobile;
            echo $dob;
            echo $email;
            echo $gender;
            echo $address;
            echo $nic;
            
            $this->model('registerModel')->addVerificationTeam($id,$mobile,$dob,$email,$gender,$address,$nic);


            header("Location: " . BASEURL . "/signin/verificationTeam");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function boardingOwnerSignUp()
    {
        if (isset($_POST['username'])) {
            
            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('registerModel')->checkUser('Username',$username);
            $res = $res->fetch_assoc();
            if ($res != null) {
                 
                    echo "User name is already exists";
                    echo ' <br><a href="../adminhome/addBoardingOwner">Try Again</a>  <br>';
            }else{

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $usertype = "BoardingOwner";

                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $nic = $_POST['nic'];
                $mobile = $_POST['mobile'];
                $occupation = $_POST['occupation'];
                $address = $_POST['address'];
                $workplace = $_POST['workplace'];
                $email = $_POST['email'];

                if ($_POST["password"] !== $_POST["repassword"]) {
                    die("both password must be match");
                } else {
                    $date = date_create();
                    if ($date < $dob) {
                        die("Date Of Birth is a future date");
                    } else {

                        //password hashing done in registerModel
                        $id = $this->model('registerModel')->register($firstname, $lastname, $username, $password, $usertype);
                        //echo $id;
                        $this->model('registerModel')->addBoardingOwner($id, $mobile, $dob, $email, $gender, $address, $nic, $occupation, $workplace);

                        echo 'Data added successfully <br>';
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


    public function professionalSignUp(){
        $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $usertype="Professional";

            $id = $this->model('registerModel')->register($firstname,$lastname,$username,$password,$usertype,$email);

            $mobile = $_POST['mobile'];
            $dob = $_POST['dob'];
          
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $nic = $_POST['nic-number'];
            $occupation = $_POST['occupation'];
            $verificationStatus = "not";
            $workplace = $_POST['workplace'];
            $nicLink = $_POST['niclink'];
            
            $this->model('registerModel')->addProfessional($id,$verificationStatus,$nicLink,$mobile,$dob,$gender,$address,$nic,$occupation,$workplace);

            header("Location: " . BASEURL . "/signin/professional");
    }


 public function studentSignUp()
    {
        if (isset($_POST['username'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
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

