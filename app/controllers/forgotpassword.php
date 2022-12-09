
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

                        if (isset($_POST['resend'])) {
                            
                            $this->model('registerModel')->modifyData("password_reset", ['OTP' => $otp], "Email = '$email'");
                         
                        } else {

                            $this->model('registerModel')->insertData("password_reset", ['UserId' => $userid, 'Email' => $email, 'OTP' => $otp]);
                        }
                            $username = $result['Username'];
                            $to = $email;
                            $subject = "Forgot Password - OTP Verification";
                            $body = "Your username is " . $username . " and your OTP is " . $otp;

                            sendEmail($to, $subject, $body);
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
                $otp = $_POST['otp'];
                $userId = $_POST['userId'];

                $result = $this->model('viewModel')->checkData("password_reset", "Email = '$email'");
                $result = $result->fetch_assoc();
                if ($result != null) {
                    $dbOTP = $result['OTP'];
                } else {
                    echo "results null";
                }
                $info = $this->model('viewModel')->checkData("user", "Email = '$email'");
                $res = $info->fetch_assoc();
                if ($dbOTP == $otp) {

                    $this->view('forgotPassword/new_password', ['info' => $res]);
                } else {
                    echo "Invalid OTP";
                }
            } else {
                die("OTP not set");
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
