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
            $place = restAPI("listing/placeRest/$id");
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

    public function joinBoarding($placeId, $userId)
    {
        $data = $this->model('addModel')->addTenant($placeId, $userId);
        if ($data == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
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
            $array['Place'] = $row['Place'];
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['BoarderStatus'] = $row['BoarderStatus'];
            $array['ProfilePicture'] = $row['ProfilePicture'];
            $array['Tagline'] = $row['Tagline'];
            $array['Bed'] = $row['Bed'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function boardingMemberTypes($placeId = null)
    {
        $data = restAPI("property/boardingMembersRest/$placeId/boarded");
        $array = array();
        foreach ($data as $row => $value) {
            array_push($array, $value->Tagline);
        }
        $json = array_count_values($array);
        echo json_encode($json);

    }



    public function bedCountRest($placeId = null)
    {
        $data = $this->model('viewModel')->getColumn('BoardingPlace', 'NoOfMembers', "PlaceId = $placeId")->fetch_assoc()['NoOfMembers'];
        $json['Count'] = $data;
        $json_response = json_encode($json);
        echo $json_response;
    }
    public function bedRest($placeId = null)
    {
        $count = restAPI("property/bedCountRest/$placeId")->Count;
        $data = $this->model('viewModel')->retrieveBed($placeId);

        $json = array();

        for ($j = 1; $j <= $count; $j++) {
            $array['Bed'] = $j;
            $array['Id'] = null;
            $array['Name'] = null;
            array_push($json, $array);
        }


        if ($data != null) {
            while ($row = $data->fetch_assoc()) {
                $json[$row['Bed'] - 1]['Id'] = $row['UserId'];
                $json[$row['Bed'] - 1]['Name'] = $row['FirstName'] . " " . $row['LastName'];
            }
        }


        $json_response = json_encode($json);
        echo $json_response;

    }

    public function noBedRest($placeId = null)
    {
        $data = $this->model('viewModel')->retrieveNoBed($placeId);
        $json = array();
        if ($data != null) {
            while ($row = $data->fetch_assoc()) {
                $array['Id'] = $row['UserId'];
                $array['Name'] = $row['FirstName'] . " " . $row['LastName'];
                array_push($json, $array);
            }
        } else {
            $json = null;
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function changeBed($placeId = null, $userId = null, $bed = null)
    {
        if ($placeId == null) {
            header('Location: ' . BASEURL . '/property');
        }
        if ($userId == 'remove' || $bed == null) {
            $userId = null;
        }

        $data = $this->model('editModel')->changeBed($placeId, $bed, $userId);
        if ($data == true) {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
}