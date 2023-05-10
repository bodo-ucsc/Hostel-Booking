<?php



class property extends Controller
{

    public function index()
    {
        if (!($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'VerificationTeam' || $_SESSION['role'] == 'BoardingOwner' || $_SESSION['role'] == 'Manager')) {
            header('Location: ' . BASEURL);
        }
        if ($_SESSION['role'] == 'BoardingOwner') {
            header('Location: ' . BASEURL . '/property/place/' . $_SESSION['UserId']);
        } else {
            $this->view('property/index');
        }
    }

    public function place($id = null, $message = null)
    {
        if ($message == 'error') {
            $message = "Failed to add property. Please try again.";
            $alert = 'error';
        } else if ($message == 'success') {
            $message = "Property will be visible after verification.";
            $alert = 'success';
        } else {
            $message = null;
            $alert = null;
        }

        if (!($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'VerificationTeam' || $_SESSION['role'] == 'BoardingOwner' || $_SESSION['role'] == 'Manager')) {
            header('Location: ' . BASEURL);
        }
        if ($_SESSION['role'] == 'BoardingOwner') {
            if ($id != $_SESSION['UserId']) {
                header('Location: ' . BASEURL . '/property/place/' . $_SESSION['UserId']);
            }
        }

        if ($id == null) {
            header('Location: ' . BASEURL . '/property');
        } else {
            $this->view('property/place', ['id' => $id, 'message' => $message, 'alert' => $alert]);
        }
    }
    public function manage($id = null)
    {
        if (!($_SESSION['role'] == 'BoardingOwner' || $_SESSION['role'] == 'Manager')) {
            header('Location: ' . BASEURL . '/listing/viewPlace/' . $id);
        }
        if ($id == null) {
            header('Location: ' . BASEURL . '/property');
        } else {
            $place = restAPI("listing/placeRest/$id");
            $this->view('property/manage', ['id' => $id, 'place' => $place]);
        }
    }

    public function addPlace($id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . '/property');
        }
        if (!($_SESSION['role'] == 'BoardingOwner' || $_SESSION['role'] == 'Manager')) {
            header('Location: ' . BASEURL . '/property');
        } else {
            $this->view('property/add', ['id' => $id]);
        }
    }

    public function addProperty()
    {
        print_r($_POST);

        $OwnerId = $_POST['owner'];
        $Title = $_POST['title'];
        $UtilityBillReceiptLink = $_POST['utilityuploadlink'];
        $SummaryLine1 = $_POST['sml1'];
        $SummaryLine2 = $_POST['sml2'];
        $SummaryLine3 = $_POST['sml3'];
        $Description = $_POST['description'];
        $Description = nl2br($Description);
        $Price = $_POST['price'];
        $PriceType = $_POST['priceType'];
        $HouseNo = $_POST['houseNo'];
        $Street = $_POST['street'];
        $CityName = $_POST['city'];
        $PropertyType = $_POST['propertytype'];
        $NoOfMembers = $_POST['noofmembers'];
        $NoOfRooms = $_POST['noofrooms'];
        $NoOfWashRooms = $_POST['noofwashrooms'];
        $Gender = $_POST['gender'];
        $BoarderType = $_POST['boardertype'];
        $SquareFeet = $_POST['squarefeet'];
        $Parking = $_POST['parking'];

        $imagePaths = $_POST['imagePaths'];

        $PlaceId = $this->model('addModel')->addPlace($OwnerId, $Title, $UtilityBillReceiptLink, $SummaryLine1, $SummaryLine2, $SummaryLine3, $Description, $Price, $PriceType, $HouseNo, $Street, $CityName, $PropertyType, $NoOfMembers, $NoOfRooms, $NoOfWashRooms, $Gender, $BoarderType, $SquareFeet, $Parking);



        $imagePaths = explode(",", $imagePaths);

        $result = 'success';
        foreach ($imagePaths as $imagePath) {
            $result = $this->model('addModel')->addImage($PlaceId, $imagePath);
            if ($result == 'fail') {
                echo "Error";
                break;
            }
        }

        header('Location: ' . BASEURL . '/property/place/' . $OwnerId . '/success');
        // json_decode($imagePaths, true);
    }

    public function editImage()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (isset($_POST['PlaceId'])) {
            $PlaceId = $_POST['PlaceId'];
        } else {
            $PlaceId = null;
        }
        if (isset($_POST['ImagePaths'])) {
            $imagePaths = $_POST['ImagePaths'];
            $imagePaths = explode(",", $imagePaths);
            foreach ($imagePaths as $imagePath) {
                $result = $this->model('addModel')->addImage($PlaceId, $imagePath);
                if ($result == 'fail') {
                    $json['Status'] = "Failed";
                    break;
                }
            }
        }
        if ($result == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        echo json_encode($json);
    }

    public function edit($placeId = null)
    {
        if ($placeId == null) {
            header('Location: ' . BASEURL . '/property');
        }
        if (!($_SESSION['role'] == 'BoardingOwner' || $_SESSION['role'] == 'Manager')) {
            header('Location: ' . BASEURL . '/property');
        } else {
            $this->view('edit/property', ['id' => $placeId]);
        }

    }


    public function getBoardingOwner($id = null)
    {
        $prejson = array();
        $result = $this->model('viewModel')->getOwnerAll($id);
        while ($resrow = $result->fetch_assoc()) {
            $array['OwnerId'] = $resrow['BoardingOwnerId'];
            $array['Name'] = $resrow['FirstName'] . " " . $resrow['LastName'];
            $array['ProfilePicture'] = $resrow['ProfilePicture'];
            $array['Count'] = 0;
            array_push($prejson, $array);
        }
        // $json_response = json_encode($prejson);
        // echo $json_response;

        // echo json_encode(
        //     $result->fetch_all(MYSQLI_ASSOC)
        // );

        // $data = $this->model('viewModel')->getOwner($id);
        // $json = array();
        // if ($data != null) {
        //     $result = $data->fetch_assoc();
        //     $owner['OwnerId'] = $result['OwnerId'];
        //     $owner['Name'] = $result['FirstName'] . " " . $result['LastName'];
        //     $owner['ProfilePicture'] = $result['ProfilePicture'];
        //     $count = 1;
        //     while ($row = $data->fetch_assoc()) {

        //         if ($row['OwnerId'] == $owner['OwnerId']) {
        //             $count++;
        //         } else {
        //             $owner['Count'] = $count;
        //             array_push($json, $owner);
        //             $count = 1;
        //         }
        //         $owner['OwnerId'] = $row['OwnerId'];
        //         $owner['Name'] = $row['FirstName'] . " " . $row['LastName'];
        //         $owner['ProfilePicture'] = $row['ProfilePicture'];
        //     }
        //     $owner['Count'] = $count;
        //     array_push($json, $owner);
        // }
        // $json_response = json_encode($json);
        // echo $json_response;

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

        // echo json_encode($prejson);
        // echo "<br>";
        // echo "<br>";
        // echo json_encode($json);
        // echo "<br>";
        // echo "<br>";

        foreach ($json as $item) {
            foreach ($prejson as &$item1) {
                if ($item['OwnerId'] === $item1['OwnerId']) {
                    $item1['Count'] = $item['Count'];
                    break;
                }
            }
        }
        echo json_encode($prejson);
        // $json_response = json_encode($json);
        // echo $json_response;
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
        echo json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
    }

    public function boardingMemberStatusRest($userId = null, $status = null, $placeId = null)
    {
        $data = $this->model('viewModel')->retrieveBoardingMemberStatus($userId, $status, $placeId);
        echo json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
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

    public function boardingRent($placeId = null, $month = null)
    {
        if ($placeId == null) {
            $append = "";
        } else {
            $append = "Place = $placeId";
        }
        if ($month != null) {
            if ($append == "") {
                $append = "Month = $month";
            } else {
                $append = $append . " AND Month = '$month'";
            }
        }
        $data = $this->model('viewModel')->get("BoardingPlaceRent", "$append", "Month DESC");
        echo json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
    }

    //   CREATE EVENT `monthly_rent`
    //   ON SCHEDULE EVERY 1 SECOND
    //   STARTS CURRENT_TIMESTAMP + INTERVAL 1 SECOND
    //   ON COMPLETION NOT PRESERVE
    //   ENABLE
    //   DO
    //   INSERT INTO BoardingPlaceRent (Tenant, Place, Month, PaymentStatus) 
    //   SELECT bpt.TenantId, bpt.Place, DATE_FORMAT(NOW(), '%m-%Y'), 'Not Paid' 
    //   FROM BoardingPlaceTenant bpt 
    //   WHERE bpt.BoarderStatus = 'boarded'



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

    public function provinceRest()
    {
        $data = $this->model('viewModel')->get('Province');
        $json = array();
        while ($row = $data->fetch_assoc()) {
            array_push($json, $row['ProvinceName']);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function districtRest($province = null)
    {
        if ($province == null) {
            $data = $this->model('viewModel')->get('District');
        } else {
            $data = $this->model('viewModel')->get('District', "ProvinceName = '$province'");
        }
        $json = array();
        while ($row = $data->fetch_assoc()) {
            array_push($json, $row['DistrictName']);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
    public function cityRest($district = null)
    {
        if ($district == null) {
            $data = $this->model('viewModel')->get('City');
        } else {
            $data = $this->model('viewModel')->get('City', "DistrictName = '$district'");
        }
        $json = array();
        while ($row = $data->fetch_assoc()) {
            array_push($json, $row['CityName']);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function ratingCountRest($placeId = null){
        if ($placeId == null) {
            $append = "";
        }
        else{
            $append = "Place = $placeId";
        }
        $data = $this->model('viewModel')->get('placeratings', $append);
        echo json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
    }

    public function ratingRest($placeId = null){
        if ($placeId == null) {
            $append = "";
        }
        else{
            $append = "Place = $placeId";
        }
        $data = $this->model('viewModel')->get('placereviews', $append);
        echo json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
    }
}