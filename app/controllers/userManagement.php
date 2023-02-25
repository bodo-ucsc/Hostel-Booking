<?php

class userManagement extends Controller
{
    public function index()
    {
        header("Location: " . BASEURL . "/admin");
    }

    public function getUser($user = "admin", $id = null)
    {
        $json = array();
        if ($user == 'admin') {
            $result = $this->model('viewModel')->getUser("admin", $id);
            while ($row = $result->fetch_assoc()) {
                $array['UserId'] = $row['UserId'];
                $array['FirstName'] = $row['FirstName'];
                $array['LastName'] = $row['LastName'];
                $array['Username'] = $row['Username'];
                $array['Email'] = $row['Email'];
                $array['ContactNumber'] = $row['ContactNumber'];
                array_push($json, $array);
            }
        } else if ($user == 'student') {
            $result = $this->model('viewModel')->getUser("student", $id);
            while ($row = $result->fetch_assoc()) {
                $array['UserId'] = $row['UserId'];
                $array['FirstName'] = $row['FirstName'];
                $array['LastName'] = $row['LastName'];
                $array['Username'] = $row['Username'];
                $array['Email'] = $row['Email'];
                $array['Gender'] = $row['Gender'];
                $array['VerifiedStatus'] = $row['VerifiedStatus'];
                $array['StudentUniversity'] = $row['StudentUniversity'];
                $array['UniversityIDNo'] = $row['UniversityIDNo'];
                $array['DateOfBirth'] = $row['DateOfBirth'];
                $array['NIC'] = $row['NIC'];
                $array['ContactNumber'] = $row['ContactNumber'];
                $array['Address'] = $row['Address'];
                array_push($json, $array);
            }
        } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
            $result = $this->model('viewModel')->getUser("boardingowner", $id);
            while ($row = $result->fetch_assoc()) {
                $array['UserId'] = $row['UserId'];
                $array['FirstName'] = $row['FirstName'];
                $array['LastName'] = $row['LastName'];
                $array['Username'] = $row['Username'];
                $array['Email'] = $row['Email'];
                $array['Gender'] = $row['Gender'];
                $array['VerifiedStatus'] = $row['VerifiedStatus'];
                $array['WorkPlace'] = $row['WorkPlace'];
                $array['Occupation'] = $row['Occupation'];
                $array['DateOfBirth'] = $row['DateOfBirth'];
                $array['NIC'] = $row['NIC'];
                $array['ContactNumber'] = $row['ContactNumber'];
                $array['Address'] = $row['Address'];
                array_push($json, $array);
            }
        } else if ($user == 'professional') {
            $result = $this->model('viewModel')->getUser("professional", $id);
            while ($row = $result->fetch_assoc()) {
                $array['UserId'] = $row['UserId'];
                $array['FirstName'] = $row['FirstName'];
                $array['LastName'] = $row['LastName'];
                $array['Username'] = $row['Username'];
                $array['Email'] = $row['Email'];
                $array['Gender'] = $row['Gender'];
                $array['VerifiedStatus'] = $row['VerifiedStatus'];
                $array['WorkPlace'] = $row['WorkPlace'];
                $array['Occupation'] = $row['Occupation'];
                $array['DateOfBirth'] = $row['DateOfBirth'];
                $array['NIC'] = $row['NIC'];
                $array['ContactNumber'] = $row['ContactNumber'];
                $array['Address'] = $row['Address'];
                array_push($json, $array);
            }
        } else if ($user == 'verificationteam' || $user == 'verificationTeam') {
            $result = $this->model('viewModel')->getUser("verificationTeam", $id);
            while ($row = $result->fetch_assoc()) {
                $array['UserId'] = $row['UserId'];
                $array['FirstName'] = $row['FirstName'];
                $array['LastName'] = $row['LastName'];
                $array['Username'] = $row['Username'];
                $array['Email'] = $row['Email'];
                $array['Gender'] = $row['Gender'];
                $array['DateOfBirth'] = $row['DateOfBirth'];
                $array['NIC'] = $row['NIC'];
                $array['ContactNumber'] = $row['ContactNumber'];
                $array['Address'] = $row['Address'];
                array_push($json, $array);
            }
        }
        $json_response = json_encode($json);
        echo $json_response;

    }
    public function getUserName()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (isset($_POST['api_key']) && $_POST['api_key'] == "bodocode") {
            $data = $this->model('loginModel')->retrieveUserName();
            $json = array();
            if (isset($data)) {
                while ($row = $data->fetch_assoc()) {
                    $array['Username'] = $row['Username'];
                    array_push($json, $array);
                }
                $json_response = json_encode($json);
                echo $json_response;
            }
        } else {
            echo "You do not have access to this page";
        }
    }
    public function getUserNumber()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (isset($_POST['api_key']) && $_POST['api_key'] == "bodocode") {
            $data = $this->model('loginModel')->retrieveUserNumber();
            $json = array();
            if (isset($data)) {
                while ($row = $data->fetch_assoc()) {
                    $array['ContactNumber'] = $row['ContactNumber'];
                    array_push($json, $array);
                }
                $json_response = json_encode($json);
                echo $json_response;
            }
        } else {
            echo "You do not have access to this page";
        }
    }
    public function getUserEmail()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (isset($_POST['api_key']) && $_POST['api_key'] == "bodocode") {
            $data = $this->model('loginModel')->retrieveUserEmail();
            $json = array();
            if (isset($data)) {
                while ($row = $data->fetch_assoc()) {
                    $array['Email'] = $row['Email'];
                    array_push($json, $array);
                }
                $json_response = json_encode($json);
                echo $json_response;
            }
        } else {
            echo "You do not have access to this page";
        }
    }

    public function userRest($usertype = null)
    {
        $data = $this->model('viewModel')->retrieveUser($usertype);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['Id'] = $row['UserId'];
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['UserType'] = $row['UserType'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function boardingUserRest($usertype = null, $userId = null)
    {
        $data = $this->model('viewModel')->retrieveBoardingUsers($usertype, $userId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['Id'] = $row['UserId'];
            $array['Place'] = $row['PlaceId'];
            $array['Title'] = $row['Title'];
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['ProfilePicture'] = $row['ProfilePicture'];
            $array['UserType'] = $row['UserType'];
            array_push($json, $array);
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
                $ContactNumber = $_POST['mobile'];

                $id = $this->model('addModel')->register($firstname, $lastname, $username, $email, $ContactNumber, $password, $usertype);

                $password = $_POST['password'];
                $usertype = "VerificationTeam";

                echo $id;

                $dob = $_POST['dob'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $nic = $_POST['nic'];


                $message = $this->model('addModel')->addVerificationTeam($id, $dob, $gender, $address, $nic);
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
}