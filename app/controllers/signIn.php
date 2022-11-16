<?php  
if(isset($_SESSION['username'])){
    header('Location: '.BASEURL.'/home');
} 
class SignIn extends Controller
{
    public function index()
    {
        $this->view('signIn/student');
    }
    public function student()
    {
        $this->view('signIn/student');
    }
    public function verificationteam( $error= null   )
    {
        if($error=='error'){
            $code="Incorrect username or password";
        } 
        $this->view('signIn/verificationTeam' , ['error' => $error]);
    } 
    public function professional()
    {
        $this->view('signIn/professional');
    }
    public function admin()
    {
        $this->view('signIn/admin');
    }
    public function boardingowner()
    {
        $this->view('signIn/boardingowner');
    }


    public function verificationTeamLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
        echo $password;

        $result = $this->model('loginModel')->verificationTeamLogin($username, $password);
        if ($result->num_rows > 0) {
            session_destroy();
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username']; 
            $_SESSION['role'] = 'student'; 
            echo "success";
            header('Location: ../home');
        } else { 
            header('Location: ./verificationteam/error');
 
        }
    }

} 
 