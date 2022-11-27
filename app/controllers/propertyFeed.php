<?php

if (isset($_SESSION['username'])) {

class PropertyFeed extends Controller
{
    public function postUpdate()
    {
        $session_name= $_SESSION['username'];

            if (isset($_POST['placeid'])) {

                $username = $_POST['username'];
                $placeid = $_POST['placeid'];
                $date = $_POST['date'];
                $message = $_POST['message'];
                $usertype = "admin";

                $currentdate = date_create();
                if ($currentdate < $date) {
                    die("Invalid date");
                } else {

                    $id= $this->model('viewModel')->getID('user','UserId', $session_name);
                    //convert to string
                    $Uid= $id->fetch_assoc();
                    if($Uid != null){
                        $userid= $Uid['UserId'];
                        $this->model('registerModel')->addAdvertisement($userid, $placeid, $date, $message);
                        echo 'Data added successfully <br>';
                        echo ' <br><a href="../adminhome/feed">View Updates</a>  <br>';
                        //$this->viewAdvertisements();
                    }else{
                        echo "Invalid userId";
                    }
                }
            
        } else {
            echo "Invalid placeId";
        }
    }

    public function viewAdvertisements()
    {
        //SELECT FirstName,LastName,Title,DateTime,Caption FROM `user`,`postupdate`,`boardingplace` 
        //           WHERE user.UserId = postupdate.UserId AND postupdate.PlaceId = boardingplace.PlaceId;
        $data = $this->model('viewModel')->joinTables('user','postupdate','UserId','UserId');
        $this->view('propertyFeed/feedHome', $data);
    }

    public function addUpdate()
    {
        $this->view('propertyFeed/addUpdate');
    }
}

}else{
    header("Location: ".BASEURL."/signin/admin");
}