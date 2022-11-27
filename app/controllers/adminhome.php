
<?php
if (isset($_SESSION['username'])) {


    class Adminhome extends Controller
    {
        protected $editId;
        public function index()
        {
            if (isset($_SESSION['username'])) {

                $this->view('admin/adminhome');
            } else {

                echo "Invalid user";
                header("Location: " . BASEURL . "/signin");
            }
        }

        //boarding owner
        public function editboardingOwner($user_id = null)
        {
            if (isset($user_id)) {

                $editId = $user_id;
                $res = $this->model('viewModel')->editBO($user_id);
                if ($res != null) {

                    $row = $res->fetch_assoc();
                    $this->view('boardingOwner/update', ['res' => $row]);
                }
            } else {

                echo "NO user";
            }
            //$this->view('boardingOwner/BOhome');
        }

        public function updateboardingOwner()
        {
            // if we have POST data to create a new Bo
            if (isset($_POST["submit"])) {

                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])) {
                    if (isset($editId)) {

                        // $firstname = $_POST['firstname'];
                        // $lastname = $_POST['lastname'];
                        // $password = $_POST['password'];
                        // $usertype = "BoardingOwner";

                        // $gender = $_POST['gender'];
                        // $dob = $_POST['dob'];
                        // $nic = $_POST['nic'];
                        // $mobile = $_POST['mobile'];
                        // $occupation = $_POST['occupation'];
                        // $address = $_POST['address'];
                        // $workplace = $_POST['workplace'];
                        // $email = $_POST['email'];
                        //$this->model('registerModel')->addBoardingOwner($id, $mobile, $dob, $email, $gender, $address, $nic, $occupation, $workplace);
                    }
                };
            }
            // after BO has been edited
            $this->viewboardingOwner();
        }

        public function fetchBONames()
        {
            $data = $this->model('viewModel')->getCols('BoardingOwner');
            $this->view('boardingOwner/BOhome', $data);
        }

        // to view list of Boarding owners
        public function viewboardingOwner()
        {
            $data = $this->model('viewModel')->joinTables('user', 'boardingowner', 'UserId', 'boardingOwnerId');
            $this->view('boardingOwner/BOhome', $data);
        }


        public function deleteboardingOwner($user_id)
        {
            $this->model('deleteModel')->deleteboardingOwner($user_id);
            $this->view('boardingOwner/BOhome');
        }


        public function addBoardingOwner()
        {
            //$this->view('boardingOwner/add');
            //$this->view('register/boardingOwner');
            header('Location: ' . BASEURL . '/register/boardingowner');
        }

        //add Boarding Owner
        public function boardingownerSignup()
        {
            echo $_POST['username'];
            echo $_POST['password'];
            header('Location: ' . BASEURL . '/register/boardingownerSignup');
        }

        public function processAdd()
        {
            $this->view('boardingOwner/process-add');
        }

        public function signout()
        {
            session_start();
            session_destroy();
            unset($_SESSION['username']);
            header('Location: ' . BASEURL . '/signin/admin');
        }

        //student 
        public function managestudent()
        {
            $this->view('student/SThome');
        }
        public function addStudent()
        {
            $this->view('student/add');
        }

        public function studentSignup()
        {
            echo $_POST['username'];
            echo $_POST['password'];
            header('Location: ' . BASEURL . '/register/studentSignup');
        }

        //professional
        public function manageprofessional()
        {
            $this->view('professional/PFhome');
        }
        public function addProfessional()
        {
            $this->view('professional/add');
        }

        public function professionalSignup()
        {
            echo $_POST['username'];
            echo $_POST['password'];
            header('Location: ' . BASEURL . '/register/professionalSignup');
        }

        public function feed()
        {
            $this->viewUpdate();
        }
        public function addUpdate()
        {
            $this->view('propertyFeed/addUpdate');
        }
        public function postUpdate()
        {
            if (isset($_POST['username'])) {
                header('Location: ' . BASEURL . '/propertyFeed/postUpdate');
            } else {
                echo "Invalid submit";
            }
        }
        public function viewUpdate()
        {
            header('Location: ' . BASEURL . '/propertyFeed/viewAdvertisements');
        }
    }
} else {
    header("Location: " . BASEURL . "/signin/admin");
}
