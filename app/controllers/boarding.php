<?php

class Boarding extends Controller {
    public function index() {
        $this->view('boarding/index');
    }

    public function viewBoarders($uname){

        $result = $this->model('viewModel')->checkData('user,boardingplace,boardingplacetenant','Where user.username= $uname AND user.userID=boardingplacetenant.TenantID AND boardingplacetenat.place=boardingplace.placeID');   
        $json=array();
        
        while ($row = $result->fetch_assoc()) {
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['PlaceId'] = $row['PlaceId'];
            
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
}