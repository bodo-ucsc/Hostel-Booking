<?php

class userManagement extends Controller
{
    public function index($user = "student", $page = 1, $perPage = 10, $message = null)
    {
        if ($_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'VerificationTeam') {

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

            if ($user == 'admin') {
                header("Location: " . BASEURL . "/admin");
            } else if ($user == 'student') {
                $rowCount = $this->model('viewModel')->numRows('student');
                $result = restAPI("userManagement/getUser/student");
            } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
                $rowCount = $this->model('viewModel')->numRows('boardingowner');
                $result = restAPI("userManagement/getUser/boardingowner");
            } else if ($user == 'professional') {
                $rowCount = $this->model('viewModel')->numRows('professional');
                $result = restAPI("userManagement/getUser/professional");
            } else if ($user == 'verificationteam' || $user == 'verificationTeam') {
                $rowCount = $this->model('viewModel')->numRows('verificationteam');
                $result = restAPI("userManagement/getUser/verificationteam");
            } else if ($user == 'manager') {
                $rowCount = $this->model('viewModel')->numRows('manager');
                $result = restAPI("userManagement/getUser/manager");
            }

            if ($page <= 0) {
                header("Location: " . BASEURL . "/userManagement/$user/1/$perPage");
            }
            if ($perPage <= 0) {
                header("Location: " . BASEURL . "/userManagement/$user/1/10");
            }

            $this->view("userManagement/$user", ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);

        } else {
            header("Location: " . BASEURL);
        }
    }

    public function create($user = null, $message = null)
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

        if ($user == 'student') {
            $this->view('create/student', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
            $this->view('create/boardingOwner', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'professional') {
            $this->view('create/professional', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'manager') {
            $this->view('create/manager', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'verificationteam' || $user == 'verificationTeam') {
            $this->view('create/verificationTeam', ['message' => $message, 'alert' => $alert]);
        }
    }

    public function userEdit($user = "student", $id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . "/userManagement/$user");
        }


        $this->view("edit/$user", ['id' => $id]);
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
                //$array['NICScanLink'] = $row['NICScanLink'];
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
                //$array['NICScanLink'] = $row['NICScanLink'];
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
        } else if ($user == 'manager') {
            $result = $this->model('viewModel')->getUser("manager", $id);
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

    public function getVerified($userId = null)
    {
        $data = $this->model('viewModel')->getVerified($userId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['UserId'] = $row['UserId'];
            $array['VerifiedStatus'] = $row['VerifiedStatus'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
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

    public function universityRest()
    {
        $data = $this->model('viewModel')->getTable('University');
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['Name'] = $row['UniversityName'];
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
            $array['Contact'] = $row['ContactNumber'];
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
                header("Location: " . BASEURL . "/userManagement/verificationTeam/1/10/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];

                $email = $_POST['email'];
                $password = $_POST['password'];
                $usertype = "VerificationTeam";
                $gender = $_POST['gender'];
                $nic = $_POST['nic'];
                $ContactNumber = $_POST['mobile'];

                $id = $this->model('addModel')->register($firstname, $lastname, $username, $nic, $gender, $email, $ContactNumber, $password, $usertype);

                $password = $_POST['password'];
                $usertype = "VerificationTeam";

                echo $id;

                $dob = $_POST['dob'];
                $address = $_POST['address'];

                echo $dob;
                echo $address;

                $message = $this->model('addModel')->addVerificationTeam($id, $dob, $address);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/userManagement/verificationTeam/1/10/$message");
                } else {
                    header("Location: " . BASEURL . "/userManagement/verificationTeam/1/10/$message");
                }
            }
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function createManager()
    {
        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            //check user already exists
            $res = $this->model('viewModel')->checkUser('Username', $username);
            $res = $res->fetch_assoc();
            if ($res != null) {
                $message = "User name already exists";
                header("Location: " . BASEURL . "/userManagement/manager/1/10/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];

                $email = $_POST['email'];
                $password = $_POST['password'];
                $usertype = "Manager";
                $ContactNumber = $_POST['mobile'];
                $gender = $_POST['gender'];
                $nic = $_POST['nic'];


                $id = $this->model('addModel')->register($firstname, $lastname, $username, $nic, $gender, $email, $ContactNumber, $password, $usertype);

                $password = $_POST['password'];
                $usertype = "Manager";

                echo $id;

                $dob = $_POST['dob'];
                $address = $_POST['address'];


                $message = $this->model('addModel')->addManager($id, $dob, $address);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/userManagement/manager/1/10/$message");
                } else {
                    header("Location: " . BASEURL . "/userManagement/manager/1/10/$message");
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
                header("Location: " . BASEURL . "/userManagement/boardingOwner/1/10/$message");
            } else {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $usertype = "BoardingOwner";
                $Gender = $_POST['gender'];
                $NIC = $_POST['nic'];
                $ContactNumber = $_POST['mobile'];


                $BoardingOwnerId = $this->model('addModel')->register($firstname, $lastname, $username, $NIC, $Gender, $email, $ContactNumber, $password, $usertype);

                $DateOfBirth = $_POST['dob'];

                $Address = $_POST['address'];
                $Occupation = $_POST['occupation'];
                $WorkPlace = $_POST['workplace'];
                $VerifiedStatus = "verified";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }

                $message = $this->model('addModel')->addBoardingOwner($BoardingOwnerId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $Address, $WorkPlace, $Occupation);
                if ($message == "success") {
                    header("Location: " . BASEURL . "/userManagement/boardingOwner/1/10/$message");
                } else {
                    header("Location: " . BASEURL . "/userManagement/boardingOwner/1/10/$message");
                }
            }

        } else {
            header("Location: " . BASEURL . "/userManagement/boardingOwner");
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
                header("Location: " . BASEURL . "/userManagement/professional/1/10/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $usertype = "Professional";
                $Gender = $_POST['gender'];
                $NIC = $_POST['nic'];
                $ContactNumber = $_POST['mobile'];


                $ProfessionalId = $this->model('addModel')->register($firstname, $lastname, $username, $NIC, $Gender, $email, $ContactNumber, $password, $usertype);

                $DateOfBirth = $_POST['dob'];

                $Address = $_POST['address'];
                $Occupation = $_POST['occupation'];
                $WorkPlace = $_POST['workplace'];
                $VerifiedStatus = "verified";
                if (isset($_POST['niclink'])) {
                    $NICScanLink = $_POST['niclink'];
                } else {
                    $NICScanLink = "NULL";
                }

                $message = $this->model('addModel')->addBoarder($ProfessionalId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $Address);

                $message = $this->model('addModel')->addProfessional($ProfessionalId, $WorkPlace, $Occupation);

                if ($message == "success") {
                    header("Location: " . BASEURL . "/userManagement/professional/1/10/$message");
                } else {
                    header("Location: " . BASEURL . "/userManagement/professional/1/10/$message");
                }
            }
        } else {
            header("Location: " . BASEURL . "/userManagement/professional");
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
                header("Location: " . BASEURL . "/userManagement/student/1/10/$message");
            } else {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $usertype = "Student";
                $Gender = $_POST['gender'];
                $NIC = $_POST['nic'];
                $ContactNumber = $_POST['mobile'];



                $StudentId = $this->model('addModel')->register($firstname, $lastname, $username, $NIC, $Gender, $email, $ContactNumber, $password, $usertype);
echo $StudentId;


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



                $message = $this->model('addModel')->addBoarder($StudentId, $VerifiedStatus, $NICScanLink, $DateOfBirth, $Address);
                $message = $this->model('addModel')->addStudent($StudentId, $UniversityIDCopyLink, $StudentUniversity, $UniversityIDNo, $UniversityAdmissionLetterCopyLink);


                if ($message == "success") {
                    header("Location: " . BASEURL . "/userManagement/student/1/10/$message");
                } else {
                    header("Location: " . BASEURL . "/userManagement/student/1/10/$message");
                }
            }
        } else {
            header("Location: " . BASEURL . "/userManagement/student");
        }
    }

}