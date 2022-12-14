<?php

class BoardingOwner extends Controller{

    public function addBoarding(){
        $this->view('boardingOwner/addBoarding');
    }

    public function editDeleteBoarding($placeid = null){
        if (isset($placeid)) {
            $this->view('boardingOwner/editDeleteBoarding', ['placeid' => $placeid]);
        }
        
    }

    public function viewAllBoardings(){
        $this->view('boardingOwner/viewAllBoarding');
    }

    public function viewABoardingPlace($placeid = null){
        if (isset($placeid)) {
            $this->view('boardingOwner/boardingManagement',  ['placeid' => $placeid]);
        }
    }

    public function boardingView($placeid = null)
    {
        if (isset($placeid)) {
            $this->view('boardingOwner/boardingView',  ['placeid' => $placeid]);
        }
    }

    // public function boardingView()
    // {
    //     // if (isset($placeid)) {
    //         $this->view('boardingOwner/boardingView');
    //     // }
    // }

    public function addBoardingPlace(){

        $ownerid = $_SESSION['userid'];
        
        $location=$_POST['location'];
        
        $verifiedStatus = "not";
        $propertytitle = $_POST['propertytitle'];
        $price = $_POST['price'];
        $pricetype = "per month";
        $address = $_POST['address'];
        $city = "Wellawatta";
        $googlemapsLink = "#";
        $propertytype = $_POST['propertytitle'];
        $noofmembers = $_POST['noofmembers'];
        $currentBoarderCount = 0;
        $noofrooms = $_POST['noofrooms'];
        $noofwashrooms = $_POST['noofwashrooms'];
        $gender = $_POST['gender'];
        $boardertype = $_POST['boardertype'];
        $sqfeet = $_POST['sqfeet'];
        $parking = $_POST['parking'];
        $summary1 = $_POST['summary1'];
        $summary2 = $_POST['summary2'];
        $summary3 = $_POST['summary3'];
        $description = $_POST['description'];
        
        $this->model('boardingOwnerModel')->addABoarding($ownerid, $propertytitle, $verifiedStatus,
        $summary1, $summary2, $summary3, $description, $price, $pricetype, $address, $city, $googlemapsLink, $propertytype, 
        $noofmembers, $currentBoarderCount, $noofrooms, $noofwashrooms, $gender,
        $boardertype, $sqfeet, $parking);
    }

    public function editBoardingPlace(){

        $placeid = $_POST['placeid'];

        $propertytitle = $_POST['propertytitle'];
        $location=$_POST['location'];
        $price = $_POST['price'];
        $address = $_POST['address'];
        $propertytype = $_POST['propertytitle'];
        $noofmembers = $_POST['noofmembers'];
        $noofrooms = $_POST['noofrooms'];
        $noofwashrooms = $_POST['noofwashrooms'];
        $gender = $_POST['gender'];        
        //$boardertype = $_POST['boardertype'];
        $sqfeet = $_POST['sqfeet'];
        //$parking = $_POST['parking'];
        $summary1 = $_POST['summary1'];
        $summary2 = $_POST['summary2'];
        $summary3 = $_POST['summary3'];
        $description = $_POST['description'];
        
        $this->model('boardingOwnerModel')->editABoarding( $placeid, $propertytitle, null, $summary1, $summary2, 
        $summary3,  $description, $price, null, $address, null, null, $propertytype,
        $noofmembers, $noofrooms, $noofwashrooms, $gender, null, $sqfeet, null);

        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");

    }

    public function deleteBoardingPlace(){
        $placeid = $_POST['placeid'];
        $this->model('boardingOwnerModel')->deleteABoarding($placeid);
        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");

    }

    public function editDeleteBoardingPlace(){
        if (($_POST['update_button'])) {
            // $this->addBoardingPlace();

            $placeid = $_POST['placeid'];

            $propertytitle = $_POST['propertytitle'];
            $location=$_POST['location'];
            $price = $_POST['price'];
            $address = $_POST['address'];
            $propertytype = $_POST['propertytitle'];
            $noofmembers = $_POST['noofmembers'];
            $noofrooms = $_POST['noofrooms'];
            $noofwashrooms = $_POST['noofwashrooms'];
            $gender = $_POST['gender'];        
            //$boardertype = $_POST['boardertype'];
            $sqfeet = $_POST['sqfeet'];
            //$parking = $_POST['parking'];
            $summary1 = $_POST['summary1'];
            $summary2 = $_POST['summary2'];
            $summary3 = $_POST['summary3'];
            $description = $_POST['description'];
            
            $this->model('boardingOwnerModel')->editABoarding( $placeid, $propertytitle, null, $summary1, $summary2, 
            $summary3,  $description, $price, null, $address, null, null, $propertytype,
            $noofmembers, $noofrooms, $noofwashrooms, $gender, null, $sqfeet, null);
    
            header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");

        } else if (($_POST['delete_button'])) {
            // $this->editBoardingPlace();

            $placeid = $_POST['placeid'];
            $this->model('boardingOwnerModel')->deleteABoarding($placeid);

            header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");

        } else {
            echo "";
        }
    }

    public function viewBoardingPlaces($userid){
        $result = $this->model('boardingOwnerModel')->viewAllBoarding($userid);
        if (isset($result)) {
            return $result;
        }      
    }

    public function viewBoardingPlace($placeid){
        $result = $this->model('boardingOwnerModel')->viewABoarding($placeid);
        if (isset($result)) {
            return $result;
        }
        
    }

    public function howManyBoardings($table, $where = null)
    {
        $result = $this->model('boardingOwnerModel')->howMany($table, $where);
        return $result;
    }

    public function getOwnerDetails($ownerid)
    {
        $result = $this->model('boardingOwnerModel')->userDetails($ownerid);
        return $result;
    }

    public function getBoardingImages($placeid)
    {

        $result = $this->model('boardingOwnerModel')->boardingImages($placeid);
        return $result;
        
    }
}