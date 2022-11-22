
<?php
class Adminhome extends Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {

            $this->view('adminhome');
        }else {

            echo "Invalid user";
            header("Location: " . BASEURL . "/signin");
        }
    }

    //boarding owner
    public function editboardingOwner($user_id = null)
    {

        if (isset($user_id)) {

            $res = $this->model('viewModel')->viewOnerecord($user_id);
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
            //$this->model->updateboardingOwner($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
        }

        // where to go after BO has been added
        //header('location: ' . BASEURL . 'boardingOwner/BOhome');
        $this->viewboardingOwner();
    }

    // to view list of BO s
    public function viewboardingOwner()
    {
        $data = $this->model('viewModel')->getAllrecords();
        $this->view('boardingOwner/BOhome', $data);
    }

    public function deleteboardingOwner($user_id)
    {
        $this->model('deleteModel')->deleteboardingOwner($user_id);
        $this->view('boardingOwner/BOhome');
    }


    public function addBoardingOwner()
    {
        $this->view('boardingOwner/add');
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
}
