<?php


class Tenent extends Controller
{
    public function index($message = null)
    {

        // if(isset($_POST['leave'])) {
        //   // The button has been clicked
        //   echo "The button has been clicked!";
        // }


        // $this->view('signIn/index', ['message' => $message, 'alert' => $alert]);
    }

    // Login Implementation

    public function leave()
    {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];

            if (isset($_POST['leaveWithoutReview'])) {
                $res = $this->model('viewModel')->getID("user", "UserId", "Username= '$username'");
                $uID=$res->fetch_assoc();
                echo $uID['UserId']; 
                $uID = $uID['UserId'];
                $result = $this->model('editModel')->leaveBoardingMember($uID);


                if ($result) {
                    
                }

            } else if (isset($_POST['leaveWithReview'])) {



            } else {
                echo "hello";
                //header('location: ' . BASEURL . '/boarding');
            }
        }else{
            echo "no username set";
        }
    }

// SignIn Functionality



}