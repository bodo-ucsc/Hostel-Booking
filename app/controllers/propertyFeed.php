<?php

if (isset($_SESSION['username'])) {

    class PropertyFeed extends Controller
    {
        public function postUpdate()
        {
            $session_name = $_SESSION['username'];

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

                    $id = $this->model('viewModel')->getID('user', 'UserId', $session_name);
                    //convert to string
                    $Uid = $id->fetch_assoc();
                    if ($Uid != null) {
                        $userid = $Uid['UserId'];
                        $this->model('registerModel')->addAdvertisement($userid, $placeid, $date, $message);
                        echo 'Data added successfully <br>';
                        echo ' <br><a href="../adminhome/feed">View Updates</a>  <br>';
                        //$this->viewAdvertisements();
                    } else {
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
            $data = $this->model('viewModel')->moreTables('user', 'postupdate', 'boardingplace', 'UserId', 'PlaceId');
            $this->view('propertyFeed/feedHome', $data);
        }

        public function addUpdate()
        {
            $this->view('propertyFeed/addUpdate');
        }

        public function editUpdate($post_id = null)
        {
            if (isset($post_id)) {

                $res = $this->model('viewModel')->viewFeedInfo($post_id);
                if ($res != null) {

                    $row = $res->fetch_assoc();
                    $this->view('propertyFeed/updateFeed', ['res' => $row]);
                } else {

                    echo "NO advertisement";
                }
            } else {

                echo "Invalid PostId";
            }
            //$this->view('propertyFeed/feedHome');
        }

        public function updateFeed()
        {
            // if we have POST data to create a new Bo
            if (isset($_POST["username"])) {

                if (isset($_POST['PostId'])) {

                    $pid = $_POST['PostId'];

                    if (isset($_POST['PlaceId']) && isset($_POST['DateTime']) && isset($_POST['Caption'])) {

                        $username = $_POST['username'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $placeid = $_POST['PlaceId'];
                        $userid = $_POST['UserId'];
                        $dateTime = $_POST['DateTime'];
                        $caption = $_POST['Caption'];
                        //$usertype = "BoardingOwner";

                        $res = $this->model('registerModel')->checkPlace($placeid);
                        if ($row = null) {
                            echo "This place doesn't exists";
                        } else {

                            $this->model('registerModel')->editAdvertisement($pid, $userid, $placeid, $dateTime, $caption);
                            echo 'Data updated successfully <br>';
                            echo ' <br><a href="../propertyFeed/viewAdvertisements">View Records</a>  <br>';
                            //$this->viewAdvertisements();
                        }
                    } else {
                        echo "Place is missing or invalid";
                    }
                } else {
                    die("Invalid PostId");
                }
            } else {
                die("Invalid UserName");
            }
        }
    }
} else {
    header("Location: " . BASEURL . "/signin/admin");
}
