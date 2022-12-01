<?php

class BoardingOwner extends Controller{

    public function addBoarding(){
        $this->view('boardingOwner/addBoarding');
    }

    public function editDeleteBoarding(){
        $this->view('boardingOwner/editDeleteBoarding');
    }

    public function addBoardingPlace(){

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

    public function editBoardingPlace(){

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