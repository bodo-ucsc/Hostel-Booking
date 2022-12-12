
<?php
class Forgotpassword extends Controller
{

    public function index()
    {

        $this->view('forgotPassword/forgot_password');
    }

    public function Check()
    {
        if (isset($_POST['submit']) || isset($_POST['resend'])) {

            if (isset($_POST['email'])) {
                $email = $_POST['email'];

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $info = $this->model('viewModel')->checkData("user", "Email = '$email'");
                    $result = $info->fetch_assoc();
                    $userid = $result['UserId'];

                    if ($result != null) {

                        $otp = mt_rand(100000, 999999);
                        $_SESSION['otp'] = $otp;
                        $starttime = $_SERVER['REQUEST_TIME'];

                        //$timestamp = $_SERVER['REQUEST_TIME'];
                        //$tt = date('Y-m-d H:i:s', $timestamp);

                        if (isset($_POST['resend'])) {

                            $otp = mt_rand(100000, 999999);
                            $_SESSION['otp'] = $otp;
                            $starttime = $_SERVER['REQUEST_TIME'];
                        } 

                        $_SESSION['reqTime'] = date('Y-m-d H:i:s', $starttime);
                        $tt = $_SESSION['reqTime'];

                        $username = $result['Username'];
                        $to = $email;
                        $subject = "Forgot Password - OTP Verification";
                        $body = "Your username is " . $username . " and your OTP is " . $otp . ". This OTP will expire in 5 minutes. Time begins from at " . $tt;

                        sendEmail($to, $subject, $body);
                        //directed to OTP enter page
                        $this->view('forgotPassword/password_message', ['info' => $result]);
                    } else {
                        echo "No user registered with this Email";
                    }
                } else {
                    die("Invalid Email Address");
                }
            } else {
                die("Email not set");
            }
        } else {
            echo "Submit not set";
        }
    }


    public function otpCheck()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['otp'])) {

                $email = $_POST['email'];
                $inputedOTP = $_POST['otp'];
                $userId = $_POST['userId'];

                $info = $this->model('viewModel')->checkData("user", "Email = '$email'");
                $res = $info->fetch_assoc();

                if ($res != null) {

                    //date convertion
                    $requstedTime = $_SESSION['reqTime'];
                    $timeREQ = strtotime("$requstedTime");

                    $currentTime = $_SERVER['REQUEST_TIME'];
                    $ctime = date('Y-m-d H:i:s', $currentTime);
                    $nowtime = strtotime("$ctime");
                    
                    //OTP expire check 
                    //set to within 3 minutes 60*5 = 300
                    if ($nowtime - $timeREQ > 300) {

                        echo 'alert("OTP Expired, Try again")';
                        //$this->view('forgotPassword/password_message', ['info' => $res]);
                    } else {
                       
                        if ($_SESSION['otp'] == $inputedOTP) {
                        
                            unset($_SESSION['otp']);
                            unset($inputedOTP);
                            unset($_SESSION['reqTime']);
                            unset($requstedTime);
                            unset($currentTime);
                            unset($nowtime);
                            unset($timeREQ);
                            $this->view('forgotPassword/new_password', ['info' => $res]);
                        } else {
                            echo "Invalid OTP";
                        }
                    }
                } else {
                    echo "No email found";
                }
            } else {
                die("OTP Not Entered");
            }
        } else if (isset($_POST['resend'])) {

            $this->Check();
        } else {
            echo "Not submited";
        }
    }

    public function updatePassword()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['userId'])) {

                if (isset($_POST['password']) && isset($_POST['Re-password'])) {

                    $userId = $_POST['userId'];
                    $password = $_POST['password'];
                    $Re_password = $_POST['Re-password'];

                    if ($password == $Re_password) {

                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $this->model('registerModel')->modifyData("user", ['Password' => $password], "UserId = '$userId'");

                        $this->model('deleteModel')->deleteRecord("password_reset", "UserId = $userId");
                        echo '<script>alert("Password Changed Successfully")</script>';
                        header("Location: " . BASEURL . "/signin/admin");
                    } else {
                        echo "Password not matched";
                    }
                } else {
                    echo "Password not set";
                }
            } else {
                die("UserID not set");
            }
        } else {
            echo "Not submited";
        }
    }
}
