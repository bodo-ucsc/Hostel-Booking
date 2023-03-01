<?php

class Listing extends Controller
{
    public function index($placeId = null)
    {
        $base = BASEURL;
        new HTMLHeader("Listing | Place");
        new Navigation("listing");



        echo "<div class='navbar-offset full-width center'>
                    <div class='row center'>
                        <div class='col-12'>
                    ";

        new Search();
        echo "
                        </div>
                    </div>
                    ";

        if (isset($placeId)) {
            new PropertyCard($placeId);

        } else {
            $data = $this->model('viewModel')->getId('BoardingPlace', 'PlaceId');
            while ($row = $data->fetch_assoc()) {
                new PropertyCard($row['PlaceId']);
            }
        }
        echo "</div>";
        new HTMLFooter();
    }
    public function placeRest($PlaceId = null, $all = null)
    {
        if ($PlaceId == null) {
            header("Location: " . BASEURL . "/listing");
        } else {
            $data = $this->model('viewModel')->getPlace($PlaceId, $all);
            while ($row = $data->fetch_assoc()) {
                $array['PlaceId'] = $row['PlaceId'];
                $array['OwnerId'] = $row['OwnerId'];
                $array['Boarded'] = $row['Boarded'];
                $array['SummaryLine1'] = $row['SummaryLine1'];
                $array['SummaryLine2'] = $row['SummaryLine2'];
                $array['SummaryLine3'] = $row['SummaryLine3'];
                $array['Price'] = $row['Price'];
                $array['PriceType'] = $row['PriceType'];
                $array['PropertyType'] = $row['PropertyType'];
                $array['HouseNo'] = $row['HouseNo'];
                $array['Street'] = $row['Street'];
                $array['CityName'] = $row['CityName'];
                $array['NoOfMembers'] = $row['NoOfMembers'];
                $array['NoOfRooms'] = $row['NoOfRooms'];
                $array['NoOfWashRooms'] = $row['NoOfWashRooms'];
                $array['Gender'] = $row['Gender'];
                $array['BoarderType'] = $row['BoarderType'];
                $array['SquareFeet'] = $row['SquareFeet'];
                $array['Parking'] = $row['Parking'];
                if (isset($all)) {
                    $array['Description'] = $row['Description'];
                    $array['Title'] = $row['Title'];
                    $array['VerifiedStatus'] = $row['VerifiedStatus'];
                }
            }
        }
        $json_response = json_encode($array);
        echo $json_response;
    }
    public function placeRestArray()
    {
        $data = $this->model('viewModel')->getPlace(null, 'y');
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['PlaceId'] = $row['PlaceId'];
            $array['OwnerId'] = $row['OwnerId'];
            $array['OwnerName'] = $row['OwnerName'];
            $array['Boarded'] = $row['Boarded'];
            $array['SummaryLine1'] = $row['SummaryLine1'];
            $array['SummaryLine2'] = $row['SummaryLine2'];
            $array['SummaryLine3'] = $row['SummaryLine3'];
            $array['Price'] = $row['Price'];
            $array['PriceType'] = $row['PriceType'];
            $array['PropertyType'] = $row['PropertyType'];
            $array['HouseNo'] = $row['HouseNo'];
            $array['Street'] = $row['Street'];
            $array['CityName'] = $row['CityName'];
            $array['NoOfMembers'] = $row['NoOfMembers'];
            $array['NoOfRooms'] = $row['NoOfRooms'];
            $array['NoOfWashRooms'] = $row['NoOfWashRooms'];
            $array['Gender'] = $row['Gender'];
            $array['BoarderType'] = $row['BoarderType'];
            $array['SquareFeet'] = $row['SquareFeet'];
            $array['Parking'] = $row['Parking'];
            $array['Description'] = $row['Description'];
            $array['Title'] = $row['Title'];
            $array['VerifiedStatus'] = $row['VerifiedStatus'];
            $array['UtilityBillReceiptLink'] = $row['UtilityBillReceiptLink'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function imageRest($PlaceId = null)
    {
        $data = $this->model('viewModel')->getImage($PlaceId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['Place'] = $row['BoardingPlace'];
            $array['Image'] = $row['PictureLink'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
    public function viewPlace($PlaceId = null)
    {
        if (isset($PlaceId)) {
            $this->view('property/view', ['id' => $PlaceId]);
        } else {
            header("Location: " . BASEURL . "/listing");
        }
    }




}