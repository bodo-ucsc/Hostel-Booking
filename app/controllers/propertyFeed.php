<?php

class PropertyFeed extends Controller
{

    public function postUpdate()
    {

        // echo $_POST['username'];
        // echo $_POST['date'];
        // echo $_POST['placeid'];
        // echo $_POST['message'];

            if (isset($_POST['username'])) {

                $username = $_POST['username'];
                $placeid = $_POST['placeid'];
                $date = $_POST['date'];
                $message = $_POST['message'];
                $usertype = "admin";

                $currentdate = date_create();
                if ($currentdate < $date) {
                    die("Invalid date");
                } else {

                    $id= $this->model('viewModel')->getID('user','UserId', $username);
                    if($id != null){
                        $info = $id->Fetch_assoc();
                        //echo "hello";
                        echo ['id' => $info];
                    }
                //     $Userid= $id->fetch_assoc();
                //     echo $Userid;
                //    // $Userid = $this->model('viewModel')->getID('user','UserId', $username);
                //     $this->model('registerModel')->addAdvertisement($Userid, $placeid, $date, $message);
                //     echo 'Data added successfully <br>';
                //     echo ' <br><a href="../adminhome/feed">View Updates</a>  <br>';
                    //$this->viewAdvertisements();
                }
            
        } else {
            echo "Invalid submit";
        }
    }

    public function viewAdvertisements()
    {
        $data = $this->model('viewModel')->getAllrecords('postupdate');
       // print_r($data);
        $this->view('propertyFeed/feedHome', $data);
    }
}
