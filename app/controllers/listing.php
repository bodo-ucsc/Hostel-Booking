<?php

class Listing extends Controller
{
    public function index($placeId = null)
    {
        if (isset($placeId)) {
            $this->view('listing/index', ['placeId' => $placeId]);
        } else {
            $data = $this->model('viewModel')->getId('BoardingPlace', 'PlaceId', 'VerifiedStatus = "verified"');
            $this->view('listing/index', ['places' => $data]);
        }
    }

    public function search()
    {

        if (isset($_POST['submit'])) {

            if ($_POST['filters'] == 'no') {
                if (isset($_POST['searchText']) && !empty($_POST['searchText'])) {

                    //$search_query = mysqli_real_escape_string($this->model()->dbConnect, $_POST['q']);
                    $search_query = $_POST['searchText'];

                    $result = $this->model('viewModel')->searchBoarding($search_query);

                    if ($result == null) {
                        $resultCount = 0;
                    } else {
                        $resultCount = $result->num_rows;
                    }
                    $this->view('listing/index', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $search_query]);
                } else {
                    header('location: ' . BASEURL . '/listing');
                }
            } else {

                $text = $_POST['searchQuery'];
                $SortSearch = $_POST['sortSearch'];
                $Price = $_POST['price'];
                $Price = floatval($Price);
                $PriceType = $_POST['priceType'];
                $PropertyType = $_POST['propertyType'];
                $Street = $_POST['street'];
                $CityName = $_POST['city'];
                $NoOfRooms = $_POST['NoOfRooms'];
                $NoOfRooms = intval($NoOfRooms);
                $NoOfMembers = $_POST['NoOfMembers'];
                $NoOfMembers = intval($NoOfMembers);
                $NoOfWashRooms = $_POST['NoOfWashrooms'];
                $NoOfWashRooms = intval($NoOfWashRooms);
                $Gender = $_POST['gender'];
                $BoarderType = $_POST['boarderType'];
                $SquareFeet = $_POST['squareFeet'];
                $SquareFeet = floatval($SquareFeet);
                if (isset($_POST['parking']) && $_POST['parking'] != null) {
                    $Parking = $_POST['parking'];
                } else {
                    $Parking = null;
                }
                $result = $this->model('viewModel')->searchBoarding($text, $SortSearch, $Price, $PriceType, $PropertyType, $Street, $CityName, $NoOfMembers, $NoOfRooms, $NoOfWashRooms, $Gender, $BoarderType, $SquareFeet, $Parking);



                if ($result == null) {
                    $resultCount = 0;
                } else {
                    $resultCount = $result->num_rows;
                }

                // $json['searchQuery'] = $text;
                // $json['sortSearch'] = $SortSearch;
                // $json['price'] = $Price;
                // $json['priceType'] = $PriceType;
                // $json['propertyType'] = $PropertyType;
                // $json['street'] = $Street;
                // $json['city'] = $CityName;
                // $json['NoOfRooms'] = $NoOfRooms;
                // $json['NoOfMembers'] = $NoOfMembers;
                // $json['NoOfWashrooms'] = $NoOfWashRooms;
                // $json['gender'] = $Gender;
                // $json['boarderType'] = $BoarderType;
                // $json['squareFeet'] = $SquareFeet;
                // $json['parking'] = $Parking;

                // {
                //     "id": "propertyType",
                //     "value": "house"
                // }

                $json = array();

                if ($text != null && $text != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "searchQuery",
                            "value" => $text
                        )
                    );
                }

                if ($SortSearch != null && $SortSearch != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "sortSearch",
                            "value" => $SortSearch
                        )
                    );
                }
                ;
                if ($Price != null && $Price != 0) {
                    array_push(
                        $json,
                        array(
                            "id" => "price",
                            "value" => $Price
                        )
                    );
                }
                ;
                if ($PriceType != null && $PriceType != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "priceType",
                            "value" => $PriceType
                        )
                    );
                }
                ;
                if ($PropertyType != null && $PropertyType != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "propertyType",
                            "value" => $PropertyType
                        )
                    );
                }
                ;
                if ($Street != null && $Street != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "street",
                            "value" => $Street
                        )
                    );
                }
                ;
                if ($CityName != null && $CityName != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "city",
                            "value" => $CityName
                        )
                    );
                }
                ;
                if ($NoOfRooms != null && $NoOfRooms != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "NoOfRooms",
                            "value" => $NoOfRooms
                        )
                    );
                }
                ;
                if ($NoOfMembers != null && $NoOfMembers != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "NoOfMembers",
                            "value" => $NoOfMembers
                        )
                    );
                }
                ;
                if ($NoOfWashRooms != null && $NoOfWashRooms != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "NoOfWashrooms",
                            "value" => $NoOfWashRooms
                        )
                    );
                }
                ;
                if ($Gender != null && $Gender != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "gender",
                            "value" => $Gender
                        )
                    );
                }
                ;
                if ($BoarderType != null && $BoarderType != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "boarderType",
                            "value" => $BoarderType
                        )
                    );
                }
                ;
                if ($SquareFeet != null && $SquareFeet != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "squareFeet",
                            "value" => $SquareFeet
                        )
                    );
                }
                ;
                if ($Parking != null && $Parking != "") {
                    array_push(
                        $json,
                        array(
                            "id" => "parking",
                            "value" => $Parking
                        )
                    );
                }
                ;
                $filters = json_encode($json);



                $this->view('listing/index', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $text, 'filters' => $filters]);
            }

        }
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
            $json_response = json_encode($array);
            echo $json_response;

        }
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