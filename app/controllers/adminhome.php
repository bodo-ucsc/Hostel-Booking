
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
        //$this->view('boardingOwner/BOhome');
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
