
<?php
class Adminhome extends Controller
{ 
    public function index()
    {
        $this->view('adminhome');
    }

    public function manageboardingOwner()
    {
        
        $this->view('boardingOwner/home');
    }
    public function AddBoardingOwner()
    {
        
        $this->view('boardingOwner/add');
    }

    public function signout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header('Location: ' . BASEURL . '/home');
        //$this->view('boardingOwner/process-add');
    }

    public function processAdd()
    {
        $this->view('boardingOwner/process-add');
    }
}

?>

