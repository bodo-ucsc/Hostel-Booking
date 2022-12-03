<?php

class BoardingOwner extends Controller{

    public function addBoarding(){
        $this->view('boardingOwner/addBoarding');
    }

    public function editDeleteBoarding(){
        $this->view('boardingOwner/editDeleteBoarding');
    }

    public function viewAllBoardingPlaces(){
        $this->view('boardingOwner/viewAllBoarding');
    }

    public function viewABoardingPlace(){
        $this->view('boardingOwner/viewABoarding');
    }

    public function addBoardingPlace(){

        $userid = $_SESSION['userId'];

        $propertytitle = $_POST('propertytitle');
        $location=$_POST('location');
        $price = $_POST('price');
        $address = $_POST('address');
        $propertytype = $_POST('propertytitle');
        $noofusers = $_POST('noofusers');
        $gender = $_POST('gender');
        $bordertype = $_POST('boardertype');
        $sqfeet = $_POST('sqfeet');
        $parking = $_POST('parking');
        $summary1 = $_POST('summary1');
        $summary2 = $_POST('summary2');
        $summary3 = $_POST('summary3');
        $description = $_POST('description');
        
        $this->model('boardingOwnerModel')->addABoarding();
    }

    public function editBoardingPlace($placeid = null){

        $propertytitle = $_POST('propertytitle');
        $location=$_POST('location');
        $price = $_POST('price');
        $address = $_POST('address');
        $propertytype = $_POST('propertytitle');
        $noofusers = $_POST('noofusers');
        $gender = $_POST('gender');
        $bordertype = $_POST('boardertype');
        $sqfeet = $_POST('sqfeet');
        $parking = $_POST('parking');
        $summary1 = $_POST('summary1');
        $summary2 = $_POST('summary2');
        $summary3 = $_POST('summary3');
        $description = $_POST('description');
        
        $this->model('boardingOwnerModel')->editABoarding();
    }

    public function deleteBoardingPlace($placeid){
        $this->model('boardingOwnerModel')->deleteABoarding($placeid);

    }

    public function editDeleteBoardingPlace($placeid = null){
        if (isset($_POST['update_button'])) {
            $this->addBoardingPlace();
        } else if (isset($_POST['delete_button'])) {
            $this->editBoardingPlace($placeid);
        } else {
            echo "";
        }
    }

    public function viewBoardingPlaces(){
        $result = $this->model('boardingOwnerModel')->viewAllBoarding();
        $boardingPlaces = $result->fetch_assoc();
        return $boardingPlaces;
    }

    public function viewBoardingPlace($placeid){
        $result = $this->model('boardingOwnerModel')->viewAlBoarding($placeid);
        $boardingPlace = $result->fetch_assoc();
        return $boardingPlace;
    }
}