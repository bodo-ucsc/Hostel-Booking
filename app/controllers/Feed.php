<?php

if (isset($_SESSION['username'])) {

    class Feed extends Controller
    {
        public function index(){
            $this->view('Feed/index');
        }
        

        public function checkUserType()
        {

            // if (isset($_POST['type'])) {
            //     $type = $_POST['type'];

            //     if ($type == 'BoardingOwner') {
            //         //tableValues($table, $condition,$column = null)
            //         //SELECT UserId,PlaceId,Title,Username,FirstName,LastName FROM `user`,`boardingowner`,`boardingplace` WHERE user.UserId = boardingowner.BoardingOwnerId AND boardingowner.BoardingOwnerId = boardingplace.OwnerId;
            //         //$data = $this->model('viewModel')->tableValues("user, boardingowner, boardingplace ", "user.UserId = boardingowner.BoardingOwnerId AND boardingowner.BoardingOwnerId = boardingplace.OwnerId");
            //         //$this->view('propertyFeed/addupdate', $data);
            //     } else if ($type == 'Tenant') {
            //         //tableValues($table, $condition,$column = null)
            //         //SELECT UserId,boardingplace.PlaceId,Title,Username,FirstName,LastName FROM `user`,`boardingplacetenant`,`boardingplace` WHERE user.UserId = boardingplacetenant.TenantId AND boardingplacetenant.PlaceId = boardingplace.PlaceId;
            //         //$data = $this->model('viewModel')->tableValues("user, boardingplacetenant, boardingplace", "user.UserId = boardingplacetenant.TenantId AND boardingplacetenant.PlaceId = boardingplace.PlaceId ");
            //         //$this->view('propertyFeed/addupdate', $data);
            //     }
            // } else {
            //     echo "Please select a type";
            // }
            //SELECT FirstName,LastName,Title,DateTime,Caption FROM `user`,`postupdate`,`boardingplace` 
            //           WHERE user.UserId = postupdate.UserId AND postupdate.PlaceId = boardingplace.PlaceId;
            //$data = $this->model('viewModel')->moreTables('user', 'postupdate', 'boardingplace', 'UserId', 'PlaceId');
            //$this->view('propertyFeed/feedHome', $data);
        }


        public function postUpdate()
        {
            $session_name = $_SESSION['username'];

            if (isset($_POST['placeid'])) {

                //$username = $_POST['username'];
                $placeid = $_POST['placeid'];
                $date = $_POST['date'];
                $message = $_POST['message'];
                $usertype = "admin";

                $currentdate = date_create();
                if ($currentdate < $date) {
                    die("Invalid date");
                } else {

                    $id = $this->model('viewModel')->getID('user', 'UserId', "Username = '$session_name'");
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
            $data = $this->model('viewModel')->checkData("user, postupdate, boardingplace", "user.UserId = postupdate.UserId AND postupdate.PlaceId = boardingplace.PlaceId");
            $this->view('propertyFeed/feedHome', $data);
        }

       
        public function addUpdate()
        {
            $name = $_SESSION['username'];
            //find user id for username
            $userid = $this->model('viewModel')->getID('user', 'UserId', "Username = '$name'");
            $uid = $userid->fetch_assoc();
            $id=$uid['UserId'];
            //find place id of the user currently joined
            $place = $this->model('viewModel')->getID('boardingplacetenant', 'PlaceId', "TenantId = '$id'");
            if ($place != null) {
                $row = $place->fetch_assoc();
                $this->view('Feed/addUpdate', ['place' => $row]);
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
                    $this->view('Feed/updateFeed', ['res' => $row]);
                } else {
                    echo "No advertisement";
                }
            } else {
                echo "PostId not found";
            }
        }

        public function deleteUpdate($post_id = null)
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
                        $usertype = $_POST['usertype'];
                        $dateTime = $_POST['date'];
                        $caption = $_POST['message'];

                        $res = $this->model('viewModel')->checkData("BoardingPlace", "'PlaceId' = '$placeid'");
                        if ($row = null) {
                            echo "This place doesn't exists";
                        } else {

                            
                            //check whether the user is the owner of the place
                            if ($usertype == 'BoardingOwner') {

                                $res = $this->model('viewModel')->getID('boardingPlace', 'PlaceId', " OwnerId = '$userid'");
                            }
                            //check whether the user is the tenant of the place
                            else if ($usertype == 'Student' || $usertype == 'Professional') {

                                $res = $this->model('viewModel')->getID('boardingplacetenant', 'PlaceId'," TenantId = '$userid'");
                            } else {
                                echo "Invalid user type";
                                echo ' <br><a href="../propertyFeed/#">Try Again</a>  <br>';
                            }

                            if ($res != null) {
                                $place = $res->fetch_assoc();

                                if ($place['PlaceId'] == $placeid) {

                                    $this->model('registerModel')->editAdvertisement($pid, $userid, $placeid, $dateTime, $caption);
                                    echo 'Data updated successfully <br>';
                                    echo ' <br><a href="../Feed/viewAdvertisements">View Records</a>  <br>';
                                    //$this->viewAdvertisements();
                                }
                            }
                        }
                    } else {
                        echo "Fiedls cannot be empty";
                    }
                } else {
                    echo "PostId not entered";
                }
            } else {
                die(" Username not entered");
            }
        }
    }
} else {
    header("Location: " . BASEURL . "/signin/admin");
}
