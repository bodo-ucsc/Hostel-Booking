<?php

class Register extends Controller
{
    public function index($message = null)
    {
        if (isset($message)) {

            $alert = 'error';
            if ($message == 'fail') {
                $message = "Insertion Failed";
            } else if ($message == 'success') {
                $message = "Inserted Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('register/student', ['message' => $message, 'alert' => $alert]);
    }
    public function student($message = null)
    {
        if (isset($message)) {

            $alert = 'error';
            if ($message == 'fail') {
                $message = "Insertion Failed";
            } else if ($message == 'success') {
                $message = "Inserted Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('register/student', ['message' => $message, 'alert' => $alert]);
    }
    public function verificationteam($message = null)
    {
        if (isset($message)) {

            $alert = 'error';
            if ($message == 'fail') {
                $message = "Insertion Failed";
            } else if ($message == 'success') {
                $message = "Inserted Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('register/verificationTeam', ['message' => $message, 'alert' => $alert]);
    }
    public function professional($message = null)
    {
        if (isset($message)) {

            $alert = 'error';
            if ($message == 'fail') {
                $message = "Insertion Failed";
            } else if ($message == 'success') {
                $message = "Inserted Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('register/professional', ['message' => $message, 'alert' => $alert]);
    }
    public function boardingowner($message = null)
    {
        if (isset($message)) {

            $alert = 'error';
            if ($message == 'fail') {
                $message = "Insertion Failed";
            } else if ($message == 'success') {
                $message = "Inserted Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('register/boardingOwner', ['message' => $message, 'alert' => $alert]);
    }

    public function boardingOwnerSignUp()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {

                $message = "User name already exists";
                header("Location: " . BASEURL . "/register/boardingOwner/$message"); 
            } else {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $contactNumber = $_POST['mobile'];
                $usertype = "BoardingOwner";

                $BoardingOwnerId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $contactNumber, $password, $usertype);

               
                $DateOfBirth = $_POST['dob'];

                $Gender = $_POST['gender'];
                $Address = $_POST['address'];
                $NIC = $_POST['nic-number'];
                $Occupation = $_POST['occupation'];
                $WorkPlace = $_POST['workplace'];
                $VerifiedStatus = "not";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }

                $message = $this->model('addModel')->addBoardingOwner($BoardingOwnerId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $Address, $WorkPlace, $Occupation);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/signin/boardingOwner/$message");
                } else {
                    header("Location: " . BASEURL . "/register/boardingOwner/$message");
                }
            }

        } else {
            header("Location: " . BASEURL . "/register/boardingOwner");
        }
    }


    public function professionalSignUp()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {

                $message = "User name already exists";
                header("Location: " . BASEURL . "/register/professional/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $contactNumber = $_POST['mobile'];
                $usertype = "Professional";

                $ProfessionalId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $contactNumber, $password, $usertype);

                
                $DateOfBirth = $_POST['dob'];

                $Gender = $_POST['gender'];
                $Address = $_POST['address'];
                $NIC = $_POST['nic-number'];
                $Occupation = $_POST['occupation'];
                $WorkPlace = $_POST['workplace'];
                $VerifiedStatus = "not";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }

                $message = $this->model('addModel')->addProfessional($ProfessionalId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $Address, $WorkPlace, $Occupation);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/signin/professional/$message");
                } else {
                    header("Location: " . BASEURL . "/register/professional/$message");
                }
            }
        } else {
            header("Location: " . BASEURL . "/register/professional");
        }
    }


    public function studentSignUp()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {

                $message = "User name already exists";
                header("Location: " . BASEURL . "/register/student/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $contactNumber = $_POST['mobile'];
                $usertype = "Student";


                $StudentId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $contactNumber, $password, $usertype);
                $VerifiedStatus = "not";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }
                if (isset($_POST['uniidlink'])) {
                    $UniversityIDCopyLink = $_POST['uniidlink'];
                } else {
                    $UniversityIDCopyLink = "NULL";
                }
                if (isset($_POST['uniid'])) {
                    $UniversityIDNo = $_POST['uniid'];
                } else {
                    $UniversityIDNo = "NULL";
                }
                if (isset($_POST['uniadmission'])) {
                    $UniversityAdmissionLetterCopyLink = $_POST['uniadmission'];
                } else {
                    $UniversityAdmissionLetterCopyLink = "NULL";
                }

                $DateOfBirth = $_POST['dob'];
                $NIC = $_POST['nic'];
                $Gender = $_POST['gender'];
               // $ContactNumber = $_POST['mobile'];
                $Address = $_POST['address'];
                $StudentUniversity = $_POST['uni'];

                echo ("$StudentId <br>");
                echo ("$VerifiedStatus <br>");
                echo ("$NICScanLink <br>");
                echo ("$UniversityIDCopyLink <br>");
                echo ("$DateOfBirth <br>");
                echo ("$NIC <br>");
                echo ("$Gender <br>");

        
                echo ("$Address <br>");
                echo ("$StudentUniversity <br>");
                echo ("$UniversityIDNo <br>");
                echo ("$UniversityAdmissionLetterCopyLink <br>");




                $message = $this->model('addModel')->addStudent($StudentId, $VerifiedStatus, $NICScanLink, $UniversityIDCopyLink, $DateOfBirth, $NIC, $Gender, $Address, $StudentUniversity, $UniversityIDNo, $UniversityAdmissionLetterCopyLink);
                if ($message == "success") {
                     header("Location: " . BASEURL . "/signin/$message");
                    echo $message;
                } else {
                    // header("Location: " . BASEURL . "/register/student/$message");
                    echo $message;
                }
            }
        } else {
            // header("Location: " . BASEURL . "/register/student");
            echo "error";
        }
    }
}