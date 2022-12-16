<?php

class userManagement extends Controller
{
    public function index()
    {
        header("Location: " . BASEURL . "/admin");
    }

    public function userRest($usertype=null){
        $data = $this->model('viewModel')->retrieveBoardingUsers($usertype);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['Id'] = $row['UserId'];
            $array['Place'] = $row['Place'];
            $array['Title'] = $row['Title'];
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName']; 
            $array['UserType'] = $row['UserType']; 
            array_push($json,$array);
        } 
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function createVerificationTeam()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {
                $message = "User name already exists";
                header("Location: " . BASEURL . "/admin/userManagement/verificationTeam/1/2/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];

                $email = $_POST['email'];
                $password = $_POST['password'];
                $usertype = "VerificationTeam";

                $id = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);

                $password = $_POST['password'];
                $usertype = "VerificationTeam";

                echo $id;

                $mobile = $_POST['mobile'];
                $dob = $_POST['dob'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $nic = $_POST['nic'];

                echo $mobile;
                echo $dob;
                echo $email;
                echo $gender;
                echo $address;
                echo $nic;

                $message = $this->model('addModel')->addVerificationTeam($id, $mobile, $dob, $gender, $address, $nic);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/admin/userManagement/verificationTeam/1/2/$message");
                } else {
                    header("Location: " . BASEURL . "/admin/userManagement/verificationTeam/1/2/$message");
                }
            }
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function createBoardingOwner()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {

                $message = "User name already exists";
                header("Location: " . BASEURL . "/admin/userManagement/boardingOwner/1/2/$message");
            } else {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $usertype = "BoardingOwner";

                $BoardingOwnerId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);

                $ContactNumber = $_POST['mobile'];
                $DateOfBirth = $_POST['dob'];

                $Gender = $_POST['gender'];
                $Address = $_POST['address'];
                $NIC = $_POST['nic-number'];
                $Occupation = $_POST['occupation'];
                $WorkPlace = $_POST['workplace'];
                $VerifiedStatus = "verified";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }

                $message = $this->model('addModel')->addBoardingOwner($BoardingOwnerId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $ContactNumber, $Address, $WorkPlace, $Occupation);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/admin/userManagement/boardingOwner/1/2/$message");
                } else {
                    header("Location: " . BASEURL . "/admin/userManagement/boardingOwner/1/2/$message");
                }
            }

        } else {
            header("Location: " . BASEURL . "/admin/userManagement/boardingOwner");
        }
    }


    public function createProfessional()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {

                $message = "User name already exists";
                header("Location: " . BASEURL . "/admin/userManagement/professional/1/2/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $usertype = "Professional";

                $ProfessionalId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);

                $ContactNumber = $_POST['mobile'];
                $DateOfBirth = $_POST['dob'];

                $Gender = $_POST['gender'];
                $Address = $_POST['address'];
                $NIC = $_POST['nic-number'];
                $Occupation = $_POST['occupation'];
                $WorkPlace = $_POST['workplace'];
                $VerifiedStatus = "verified";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }

                $message = $this->model('addModel')->addProfessional($ProfessionalId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $ContactNumber, $Address, $WorkPlace, $Occupation);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/admin/userManagement/professional/1/2/$message");
                } else {
                    header("Location: " . BASEURL . "/admin/userManagement/professional/1/2/$message");
                }
            }
        } else {
            header("Location: " . BASEURL . "/admin/userManagement/professional");
        }
    }


    public function createStudent()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {

                $message = "User name already exists";
                header("Location: " . BASEURL . "/admin/userManagement/student/1/2/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $usertype = "Student";


                $StudentId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);
                $VerifiedStatus = "verified";
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
                $ContactNumber = $_POST['mobile'];
                $Address = $_POST['address'];
                $StudentUniversity = $_POST['uni'];

                echo ("$StudentId <br>");
                echo ("$VerifiedStatus <br>");
                echo ("$NICScanLink <br>");
                echo ("$UniversityIDCopyLink <br>");
                echo ("$DateOfBirth <br>");
                echo ("$NIC <br>");
                echo ("$Gender <br>");

                echo ("$ContactNumber <br>");
                echo ("$Address <br>");
                echo ("$StudentUniversity <br>");
                echo ("$UniversityIDNo <br>");
                echo ("$UniversityAdmissionLetterCopyLink <br>");




                $message = $this->model('addModel')->addStudent($StudentId, $VerifiedStatus, $NICScanLink, $UniversityIDCopyLink, $DateOfBirth, $NIC, $Gender, $ContactNumber, $Address, $StudentUniversity, $UniversityIDNo, $UniversityAdmissionLetterCopyLink);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/admin/userManagement/student/1/2/$message");
                } else {
                    header("Location: " . BASEURL . "/admin/userManagement/student/1/2/$message");
                }
            }
        } else {
            header("Location: " . BASEURL . "/admin/userManagement/student");
        }
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
                $usertype = "BoardingOwner";

                $BoardingOwnerId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);

                $ContactNumber = $_POST['mobile'];
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

                $message = $this->model('addModel')->addBoardingOwner($BoardingOwnerId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $ContactNumber, $Address, $WorkPlace, $Occupation);
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
                $usertype = "Professional";

                $ProfessionalId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);

                $ContactNumber = $_POST['mobile'];
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

                $message = $this->model('addModel')->addProfessional($ProfessionalId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $NIC, $Gender, $ContactNumber, $Address, $WorkPlace, $Occupation);
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
                $usertype = "Student";


                $StudentId = $this->model('addModel')->register($firstname, $lastname, $username, $email, $password, $usertype);
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
                $ContactNumber = $_POST['mobile'];
                $Address = $_POST['address'];
                $StudentUniversity = $_POST['uni'];

                echo ("$StudentId <br>");
                echo ("$VerifiedStatus <br>");
                echo ("$NICScanLink <br>");
                echo ("$UniversityIDCopyLink <br>");
                echo ("$DateOfBirth <br>");
                echo ("$NIC <br>");
                echo ("$Gender <br>");

                echo ("$ContactNumber <br>");
                echo ("$Address <br>");
                echo ("$StudentUniversity <br>");
                echo ("$UniversityIDNo <br>");
                echo ("$UniversityAdmissionLetterCopyLink <br>");




                $message = $this->model('addModel')->addStudent($StudentId, $VerifiedStatus, $NICScanLink, $UniversityIDCopyLink, $DateOfBirth, $NIC, $Gender, $ContactNumber, $Address, $StudentUniversity, $UniversityIDNo, $UniversityAdmissionLetterCopyLink);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/signin/student/$message");
                } else {
                    header("Location: " . BASEURL . "/register/student/$message");
                }
            }
        } else {
            header("Location: " . BASEURL . "/register/student");
        }
    }
}