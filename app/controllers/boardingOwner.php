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

    public function viewAllBoardings($message = null){
        if ($message == 'editsuccess') {
            $message = "Property has been edited";
            $alert = 'Edited';
        } else if ($message == 'deletesuccess') {
            $message = "Property has been deleted";
            $alert = 'Deleted';
        } else {
            $message = null;
            $alert = null;
        }

        $this->view('property/viewAllBoarding',['message' => $message, 'alert' => $alert]);
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

        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings/editsuccess");

    }

    public function deleteBoardingPlace(){
        $placeid = $_POST['placeid'];
        $this->model('deleteModel')->deleteABoarding($placeid);
        header("Location: " . BASEURL . "/boardingOwner/viewAllBoardings/deletesuccess");

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
        $result = $this->model('viewModel')->getCitiesAsc();
        return $result;
    }

//     public function cityRest($districName)
//     {
//         $data = $this->model('viewModel')->getCities($districName);
//         $json = array();
//         while ($row = $data->fetch_assoc()) {
//             $array['CityName'] = $row['CityName'];
//             $array['DistricName'] = $row['DistricName'];
//             array_push($json, $array);
//         }
//         $json_response = json_encode($json);
//         echo $json_response;
//     }

//     public function DistricRest($provinceName)
//     {
//         $data = $this->model('viewModel')->getDistrics($provinceName);
//         $json = array();
//         while ($row = $data->fetch_assoc()) {
//             $array['districName'] = $row['districName'];
//             $array['ProvinceName'] = $row['ProvinceName'];
//             array_push($json, $array);
//         }
//         $json_response = json_encode($json);
//         echo $json_response;
//     }

//     public function provinceRest()
//     {
//         $data = $this->model('viewModel')->getProvinces();
//         $json = array();
//         while ($row = $data->fetch_assoc()) {
//             $array['ProvinceName'] = $row['ProvinceName'];
//             array_push($json, $array);
//         }
//         $json_response = json_encode($json);
//         echo $json_response;
//         return $json_response;
//     }
 }