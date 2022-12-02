
<?php
class Forgotpassword extends Controller
{
    public function index()
    {
        $this->view('forgot_password');
    }


    public function check()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $result = $this->model('registerModel')->checkUser('Email', $email);
                    
//$result = $this->model('viewModel')->getID('Email', $email);
                    
                } else {
                    die("Invalid Email Address");
                }
            } else {
                die("Email not set");
            }
        }
        $this->view('forgot_password');
    }
}
