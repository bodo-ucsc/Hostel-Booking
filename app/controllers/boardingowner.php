<?php
if (isset($_SESSION['username'])) {
    class BoardingOwner extends Controller
    {
        public function message($error = null)
        {
            if ($error == 'error') {
                $error = "Error Occured"; 
            }
            if ($error == 'success') {
                $error = "Data added Successfully";
            }
            if ($error == 'deleted') {
                $error = "Data deleted Successfully";
            }
            $this->view('boardingOwner/BOhome', ['error' => $error]);
        }
        
         
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
            $data = $this->model('viewModel')->checkData("user, boardingowner", "user.UserId = boardingowner.boardingOwnerId");
            $this->view('boardingOwner/BOhome', $data);
        }

        public function editBO($user_id = null)
        {
            if (isset($user_id)) {

                $res = $this->model('viewModel')->checkData("user,boardingowner","user.UserId = '$user_id' AND user.UserId = boardingowner.BoardingOwnerId");
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

                    $firstname = $_POST['firstname'];
                    $username = $_POST['username'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $usertype = "BoardingOwner";

                    $res = $this->model('registerModel')->checkUser('Username',$username);
                    $row = $res->fetch_assoc();
                    if ($row != null) {
                        if ($row['Username'] == $username && $row['UserId'] != $id) {
                            echo "Username already exists";
                        } else {

                            $this->model('registerModel')->EditUser($id, $firstname, $lastname, $username, $email, $usertype);

                            $gender = $_POST['gender'];
                            $dob = $_POST['dob'];
                            $nic = $_POST['nic'];
                            $mobile = $_POST['mobile'];
                            $occupation = $_POST['occupation'];
                            $address = $_POST['address'];
                            $workplace = $_POST['workplace'];
                            $email = $_POST['email'];

                            $this->model('registerModel')->updateBoardingOwner($id, $mobile, $dob, $gender, $address, $nic, $occupation, $workplace);
                            echo 'Data updated successfully <br>';
                            echo ' <br><a href="../adminhome/viewboardingOwner">View Records</a>  <br>';
                            //$this->viewboardingOwner();
                        }
                    } else {
                        echo "Error user does not exist";
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
                $this->model('deleteModel')->deleteRecord("boardingowner","BoardingOwnerId = $user_id");
                $this->message('deleted');
                //$this->viewboardingOwner();
            }
        }
    }
} else {
    echo "You have to sign in first";
}
