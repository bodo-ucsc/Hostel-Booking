<?php
class Forgotpassword extends Controller
{

    public function index($err = null)
    {
        if (isset($err)) {
            $alert = 'error';
            if ($err == 1) {
                $message = "No user registered with this Email";
            } else if ($err == 2) {
                $message = "Invalid Email Address";
            }
            if ($err == 11) {
                $message = "Invalid OTP";
            } else if ($err == 12) {
                $message = "Email Address not found";
            } else if ($err == 13) {
                $message = "Please Enter OTP";
            }
        } else {
            $message = null;
            $alert = null;
        }

        $this->view('forgotPassword/forgot_password', ['message' => $message, 'alert' => $alert]);
    }


    public function Check()
    { 


        if (isset($_POST['submit']) || isset($_POST['resend'])) {

            if (isset($_POST['email'])) {
                $email = $_POST['email'];

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $info = $this->model('viewModel')->getTable("User", "Email = '$email'");
                    if (isset($info)) {
                        $result = $info->fetch_assoc();

                        $_SESSION['userType'] = $result['UserType'];


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
                        header("Location: " . BASEURL . "/forgotpassword/1");
                    }
                } else {
                    header("Location: " . BASEURL . "/forgotpassword/2");
                }
            } else {
                header("Location: " . BASEURL . "/forgotpassword");
            }
        } else {
            header("Location: " . BASEURL . "/forgotpassword");
        }
    }


    public function otpCheck(){

        if (isset($_POST['submit'])) {

            if (isset($_POST['otp'])) {

                $email = $_POST['email'];
                $inputedOTP = $_POST['otp'];

                $info = $this->model('viewModel')->getTable("user", "Email = '$email'");
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

                        header("Location: " . BASEURL . "/forgotpassword/13");
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
                            header("Location: " . BASEURL . "/forgotpassword/11"); 
                        }
                    }
                } else {
                    header("Location: " . BASEURL . "/forgotpassword/12");
                }
            } else {
                header("Location: " . BASEURL . "/forgotpassword/11");
            }
        } else if (isset($_POST['resend'])) {

            $this->Check();
        } else {
            header("Location: " . BASEURL . "/forgotpassword");
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

                        $this->model('editModel')->modifyData("user", ['Password' => $password], "UserId = '$userId'");
                        session_start();
                        $userType = $_SESSION['userType'];
                        header("Location: " . BASEURL . "/signin/$userType");
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