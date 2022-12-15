<?php

class boardingOwner extends Controller{

    public function index()
    {
        $this->view('boardingowner/bohome');
    }
    public function addBoarding(){
        $this->view('property/addBoarding');
    }

    public function editDeleteBoarding($placeid = null){
        if (isset($placeid)) {
            $this->view('property/editDeleteBoarding', ['placeid' => $placeid]);
        }
        
    }

    public function viewAllBoardings(){
        $this->view('property/viewAllBoarding');
    }

    public function viewABoardingPlace($placeid = null){
        if (isset($placeid)) {
            $this->view('property/boardingManagement',  ['placeid' => $placeid]);
        }
    }

    public function boardingView($placeid = null)
    {
        if (isset($placeid)) {
            $this->view('property/boardingView',  ['placeid' => $placeid]);
        }
    }

    // public function boardingView()
    // {
    //     // if (isset($placeid)) {
    //         $this->view('boardingOwner/boardingView');
    //     // }
    // }

    public function addBoardingPlace(){

        $ownerid = $_SESSION['UserId'];
        
        
        $verifiedStatus = "not";
        $propertytitle = $_POST['propertytitle'];
        $price = $_POST['price'];
        $pricetype = "per month";
        $houseNo = $_POST['houseNo'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $googlemapsLink = "#";
        $propertytype = $_POST['propertytype'];
        $noofmembers = $_POST['noofmembers'];
//        $currentBoarderCount = 0;
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
        
        $this->model('addModel')->addABoarding($ownerid, $propertytitle, $verifiedStatus,
        $summary1, $summary2, $summary3, $description, $price, $pricetype, $houseNo, $street, $city, $googlemapsLink, $propertytype, 
        $noofmembers, $noofrooms, $noofwashrooms, $gender,
        $boardertype, $sqfeet, $parking);

        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");
    }

    public function editBoardingPlace(){

        $placeid = $_POST['placeid'];

        $propertytitle = $_POST['propertytitle'];
        $price = $_POST['price'];
        $houseNo = $_POST['houseNo'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $propertytype = $_POST['propertytype'];
        $noofmembers = $_POST['noofmembers'];
        $noofrooms = $_POST['noofrooms'];
        $noofwashrooms = $_POST['noofwashrooms'];
        $gender = $_POST['gender'];      
        $googlemapsLink = "#";  
        $boardertype = $_POST['boardertype'];
        $sqfeet = $_POST['sqfeet'];
        $parking = $_POST['parking'];
        $summary1 = $_POST['summary1'];
        $summary2 = $_POST['summary2'];
        $summary3 = $_POST['summary3'];
        $description = $_POST['description'];
        
        $this->model('editModel')->editABoarding( $placeid, $propertytitle, null, $summary1, $summary2, 
        $summary3,  $description, $price, null, $houseNo, $street,  $city, $googlemapsLink, $propertytype,
        $noofmembers, $noofrooms, $noofwashrooms, $gender, $boardertype, $sqfeet, $parking);

        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");

    }

    public function deleteBoardingPlace(){
        $placeid = $_POST['placeid'];
        $this->model('deleteModel')->deleteABoarding($placeid);
        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings");

    }

    public function viewBoardingPlaces($userid){
        $result = $this->model('viewModel')->viewAllBoarding($userid);
        if (isset($result)) {
            return $result;
        }      
    }

    public function viewBoardingPlace($placeid){
        $result = $this->model('viewModel')->viewABoarding($placeid);
        if (isset($result)) {
            return $result;
        }
        
    }

    public function howManyBoardings($table, $where = null)
    {
        $result = $this->model('viewModel')->howMany($table, $where);
        return $result;
    }

    public function getOwnerDetails($ownerid)
    {
        // $result = $this->model('boardingOwnerModel')->userDetails($ownerid);
        $result = $this->model('viewModel')->getUserById('boardingOwner', $ownerid);
        return $result;
    }

    public function getBoardingImages($placeid)
    {

        $result = $this->model('viewModel')->boardingImages($placeid);
        return $result;
        
    }

    public function getAllCities()
    {
        $result = $this->model('viewModel')->getCities();
        return $result;
    }
}