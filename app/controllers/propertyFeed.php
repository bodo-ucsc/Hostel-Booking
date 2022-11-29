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

                    $id = $this->model('viewModel')->getID('user', 'UserId', 'Username', $session_name);
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

        // user can post advertisements only for boarding place which he joined
        public function addUpdate()
        {
            $name = $_SESSION['username'];
            //find user id for username
            $userid = $this->model('viewModel')->getID('user', 'UserId', 'Username', $name);
            $uid = $userid->fetch_assoc();
            //find place id of the user currently joined
            $place = $this->model('viewModel')->getID('boardingplacetenant', 'PlaceId', 'TenantId', $uid['UserId']);
            if ($place != null) {
                $row = $place->fetch_assoc();
                $this->view('propertyFeed/addUpdate', ['place' => $row]);
            } else {
                echo "You are not joined to any Boarding place yet";
            }
        }

        public function editUpdate($post_id = null)
        {
            if (isset($post_id)) {

                $res = $this->model('viewModel')->viewFeedInfo($post_id);
                if ($res != null) {

                    $row = $res->fetch_assoc();
                    $this->view('propertyFeed/updateFeed', ['res' => $row]);
                } else {
                    echo "No advertisement";
                }
            } else {
                echo "PostId not found";
            }
        }

        public function deleteUpdate($post_id)
        {
            if (isset($post_id)) {
                $this->model('deleteModel')->deleteAdvertisement($post_id);
            }
            $this->viewAdvertisements();
        }

        public function updateFeed()
        {
            if (isset($_POST['username'])) {
                //username of publisher
                $username = $_POST['username'];

                if (isset($_POST['postid'])) {

                    $pid = $_POST['postid'];

                    if (isset($_POST['placeid']) && isset($_POST['date']) && isset($_POST['message'])) {

                        $placeid = $_POST['placeid'];
                        //userid of publisher
                        $userid = $_POST['UserId'];
                        $dateTime = $_POST['date'];
                        $caption = $_POST['message'];

                        $res = $this->model('registerModel')->checkPlace($placeid);
                        if ($row = null) {
                            echo "This place doesn't exists";
                        } else {
                            //check whether this publisher is currently joined for this place
                            $res = $this->model('viewModel')->getID('boardingplacetenant', 'PlaceId', 'TenantId',  $userid);
                            if ($res != null) {
                                $place = $res->fetch_assoc();

                                if ($place['PlaceId'] == $placeid) {

                                    $this->model('registerModel')->editAdvertisement($pid, $userid, $placeid, $dateTime, $caption);
                                    echo 'Data updated successfully <br>';
                                    echo ' <br><a href="../propertyFeed/viewAdvertisements">View Records</a>  <br>';
                                    //$this->viewAdvertisements();
                                }
                            }else{
                                echo "Publisher not joined to this place";
                            }
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
