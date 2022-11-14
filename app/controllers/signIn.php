<?php 
session_start();
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
    public function verificationteam( $error= null , $code=null )
    {
     if($code==1){
            $code="Incorrect username";
        }
        else if($code==2){
            $code="Incorrect password";
        }
        else if($code==3){
            $code="Unknown Error";
        } 
        $this->view('signIn/verificationTeam' , ['error' => $error,'code' => $code]);
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

    public function adminLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //echo $username;
        //echo $password;

        $result = $this->model('loginModel')->adminLogin($username, $password);

        if ($result != null) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username']; 
            $_SESSION['role'] = 'admin'; 
            echo "success";

            header('Location: ' . BASEURL. '/adminhome');
        } else {
            
            echo "Invalid login";
            echo ' <br><a href="admin">Sign In Again</a>  <br>';
            
        }
    }

    public function verificationTeamLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
        echo $password;

        $result = $this->model('loginModel')->verificationTeamLogin($username, $password);
        if($result == "iu"){
            header('Location: ./verificationteam/error/1');
        }
        else if($result == "ip"){
            header('Location: ./verificationteam/error/2');
        } 
        else if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username']; 
            $_SESSION['role'] = 'student'; 
            echo "success";
            header('Location: ../home');
        } else { 

            header('Location: ./verificationteam/error/3');
 
        }
    }

}  
