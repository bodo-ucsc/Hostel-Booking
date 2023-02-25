<?php

class property extends Controller
{

    public function index()
    {
        $this->view('property/index');
    }

    public function place($id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . '/property');
        } else {
            $this->view('property/place', ['id' => $id]);
        }
    }
    public function manage($id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . '/property');
        } else {
            $place= restAPI("listing/placeRest/$id");
            $this->view('property/manage', ['id' => $id, 'place' => $place]);
        }
    }
 

    public function getBoardingOwner($id = null)
    {
        $data = $this->model('viewModel')->getOwner($id);
        $json = array();
        if ($data != null) {
            $result = $data->fetch_assoc();
            $owner['OwnerId'] = $result['OwnerId'];
            $owner['Name'] = $result['FirstName'] . " " . $result['LastName'];
            $owner['ProfilePicture'] = $result['ProfilePicture'];
            $count = 1;
            while ($row = $data->fetch_assoc()) {

                if ($row['OwnerId'] == $owner['OwnerId']) {
                    $count++;
                } else {
                    $owner['Count'] = $count;
                    array_push($json, $owner);
                    $count = 1;
                }
                $owner['OwnerId'] = $row['OwnerId'];
                $owner['Name'] = $row['FirstName'] . " " . $row['LastName'];
                $owner['ProfilePicture'] = $row['ProfilePicture'];
            }
            $owner['Count'] = $count;
            array_push($json, $owner);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function getBoardingPlace($id = null)
    {
        $data = $this->model('viewModel')->getOwnerPlace($id);
        $json = array();
        if ($data != null) {
            while ($row = $data->fetch_assoc()) {
                $place['PlaceId'] = $row['PlaceId'];
                $place['OwnerId'] = $row['OwnerId'];
                $place['Name'] = $row['FirstName'] . " " . $row['LastName'];
                $place['PictureLink'] = $row['PictureLink'];
                $place['CityName'] = $row['CityName'];
                $place['Address'] = $row['Address'];
                $place['NoOfMembers'] = $row['NoOfMembers'];
                $place['Boarded'] = $row['Boarded'];
                array_push($json, $place);
            }
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function boardingMembersRest($placeId = null, $status = null)
    {
        $data = $this->model('viewModel')->retrieveBoardingMembers($placeId, $status);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['Id'] = $row['UserId'];
            $array['Place'] = $row['PlaceId'];
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['BoarderStatus'] = $row['BoarderStatus'];
            $array['ProfilePicture'] = $row['ProfilePicture'];
            $array['UserType'] = $row['UserType'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
}