<?php
if (isset($_SESSION['username'])) {
    class BoardingOwner extends Controller
    {
        public function index()
        {
            $this->view('boardingOwner/BOhome');
        }

        public function addboardingOwner()
        {

            $this->view('register/boardingOwner');
        }
        public function viewboardingOwner()
        {
            $data = $this->model('viewModel')->joinTables('user', 'boardingowner', 'UserId', 'boardingOwnerId');
            $this->view('boardingOwner/BOhome', $data);
        }

        public function editBO($user_id = null)
        {
            if (isset($user_id)) {

                $res = $this->model('viewModel')->viewBOInfo($user_id);
                if ($res != null) {

                    $row = $res->fetch_assoc();
                    $this->view('boardingOwner/update', ['res' => $row]);
                } else {

                    echo "NO user";
                }
            } else {

                echo "UserId not found";
            }
            //$this->view('boardingOwner/BOhome');
        }

        public function updateBO()
        {
            // if we have POST data to create a new Bo
            if (isset($_POST["username"])) {

                if (isset($_POST['UserId'])) {

                    $id = $_POST['UserId'];

                    if (isset($_POST['password']) && isset($_POST['repassword'])) {

                        $firstname = $_POST['firstname'];
                        $username = $_POST['username'];
                        $lastname = $_POST['lastname'];
                        $password = $_POST['password'];
                        $usertype = "BoardingOwner";

                        $res = $this->model('registerModel')->checkUser($username);
                        $row = $res->fetch_assoc();
                        if ($row != null) {
                            if ($row['Username'] == $username && $row['UserId'] != $id) {
                                echo "Username already exists";
                            } else {

                                $this->model('registerModel')->EditUser($id, $firstname, $lastname, $username, $password, $usertype);

                                $gender = $_POST['gender'];
                                $dob = $_POST['dob'];
                                $nic = $_POST['nic'];
                                $mobile = $_POST['mobile'];
                                $occupation = $_POST['occupation'];
                                $address = $_POST['address'];
                                $workplace = $_POST['workplace'];
                                $email = $_POST['email'];

                                $this->model('registerModel')->updateBoardingOwner($id, $mobile, $dob, $email, $gender, $address, $nic, $occupation, $workplace);
                                echo 'Data updated successfully <br>';
                                echo ' <br><a href="../adminhome/viewboardingOwner">View Records</a>  <br>';
                                //$this->viewboardingOwner();
                            }
                        } else {
                            echo "Error user does not exist";
                        }
                    } else {
                        echo "Check login credentials and try again";
                    }
                } else {
                    die("Invalid UserId");
                }
            } else {
                die("Username not submitted");
            }
        }

        public function deleteBO($user_id)
        {
            if (isset($user_id)) {
                $this->model('deleteModel')->deleteboardingowner($user_id);
            }
            $this->viewboardingOwner();
        }
    }


    
} else {
    echo "You have to sign in first";
}
