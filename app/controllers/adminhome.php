
<?php
class Adminhome extends Controller
{
    public function index()
    {
        $this->view('adminhome');
    }

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

    public function signout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header('Location: ' . BASEURL . '/signin/admin');
        //$this->view('boardingOwner/process-add');
    }

    public function processAdd()
    {
        $this->view('boardingOwner/process-add');
    }
}

?>

