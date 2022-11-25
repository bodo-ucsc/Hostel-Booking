<?php

class advertisements extends Controller
{

    public function postUpdate()
    {
        $username =$_POST['username'];

        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])) {

                $name = $_POST['name'];
                $date = $_POST['date'];
                $placeid = $_POST['placeid'];
                $message = $_POST['message'];
                $usertype = "admin";
                
                $currentdate = date_create();
                    if ($currentdate < $date) {
                        die("Invalid date");
                    } else {
                    
                        $Userid= $this->model('viewModel')->getUserId('user',$username);
                        $this->model('registerModel')->addAdvertisement($Userid,$placeid,$date,$message);
                        echo 'Data added successfully <br>'; 
                        echo ' <br><a href="../adminhome/feed">View Updates</a>  <br>';
                        //$this->viewAdvertisements();
                        
                        
                    }

            }}
        
    }

    public function viewAdvertisements()
    {
        $data = $this->model('viewModel')->getAllrecords('postupdate');
        $this->view('propertyFeed/feedHome', $data);
    }

}