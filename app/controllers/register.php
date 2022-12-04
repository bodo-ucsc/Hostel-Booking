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
            $email = $_POST['email'];
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


            // header("Location: " . BASEURL . "/signin/verificationTeam");
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
                // if( !empty($_POST['email']) || !filter_var($_POST["email"])) {
                //     die("Valid email is required");
                // }
                // if(strlen($_POST["password"])<  5){
                //     die("password must be at least 5 characters");
                // }
                // if(! preg_match("/[a-z]/i",$_POST["password"])){
                //     die("password must contain at least one letter");
                // }

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $usertype="BoardingOwner";

            $id = $this->model('registerModel')->register($firstname,$lastname,$username,$password,$usertype);

            $mobile = $_POST['mobile'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $nic = $_POST['nic-number'];
            $occupation = $_POST['occupation'];
            $verificationStatus = "not";
            $workplace = $_POST['workplace'];
            $nicLink = $_POST['niclink'];
            
            $this->model('registerModel')->addBoardingOwner($id,$verificationStatus,$nicLink,$mobile,$dob,$email,$gender,$address,$nic,$occupation,$workplace);


                // if(! preg_match("/[0-9]/i",$_POST["password"])){
                //     die("password must contain at least one number");
                // }

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
}

    public function professionalSignUp()
    {
        if (isset($_POST['username'])) {
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
        } else {
            header("Location: " . BASEURL);
        }
    }

}
