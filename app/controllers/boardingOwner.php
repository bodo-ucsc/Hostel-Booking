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
        

    }
}