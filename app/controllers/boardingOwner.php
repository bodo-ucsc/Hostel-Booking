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

    public function viewAllBoarding(){
        $this->view('boardingOwner/viewAllBoarding');
    }

    public function viewABoardingPlace($placeid = null){
        if (isset($placeid)) {
            $this->view('boardingOwner/boardingManagement',  ['placeid' => $placeid]);

        }
    }

    public function addBoardingPlace(){

        $ownerid = $_SESSION['userid'];

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

        $placeid = $_POST['placeid'];

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

    public function deleteBoardingPlace(){
        $placeid = $_POST['placeid'];
        $this->model('boardingOwnerModel')->deleteABoarding($placeid);

    }

    public function editDeleteBoardingPlace(){
        if (isset($_POST['update_button'])) {
            $this->addBoardingPlace();
        } else if (isset($_POST['delete_button'])) {
            $this->editBoardingPlace();
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
        $result = $this->model('boardingOwnerModel')->viewAllBoarding($placeid);
        if (isset($result)) {
            return $result;
        }
        
    }

    public function howManyBoardings($userid, $where = null)
    {
        $result = $this->model('boardingOwnerModel')->howMany($userid, $where);
        return $result;
    }
}