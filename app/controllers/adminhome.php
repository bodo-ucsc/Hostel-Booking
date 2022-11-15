
<?php
class Adminhome extends Controller
{
    public function index()
    {
        $this->view('adminhome');
    }


//boarding owner
    public function manageboardingOwner()
    {
        session_start();
        $this->view('boardingOwner/BOhome');
    }
    public function addBoardingOwner()
    {
        $this->view('boardingOwner/add');
    }

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
        //$this->view('boardingOwner/process-add');
    }




    //student 

    public function managestudent()
    {
        session_start();
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
        session_start();
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

?>

