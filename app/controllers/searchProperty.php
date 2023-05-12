<?php

class SearchProperty extends Controller
{
    public function index1()
    {
        if (isset($_POST['submit'])) {
            
            if ($_POST['filters'] == 'no') {
                if (isset($_POST['searchText'])) {

                    //$search_query = mysqli_real_escape_string($this->model()->dbConnect, $_POST['q']);
                    $search_query = $_POST['searchText'];
                    $_SESSION['search'] = $search_query;

                    $result = $this->model('viewModel')->searchBoarding($search_query);

                    if ($result == null) {
                        $resultCount = 0;
                    } else {
                        $resultCount = $result->num_rows;
                    }
                    $this->view('search', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $search_query]);
                } else {
                    echo "No text search";
                }
            } else {
                if (isset($_POST['submit'])) {
                    
                    $text = $_SESSION['search'];
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
                        $result = $this->model('viewModel')->searchBoarding($text, $SortSearch, $Price, $PriceType, $PropertyType, $Street, $CityName, $NoOfMembers, $NoOfRooms, $NoOfWashRooms, $Gender, $BoarderType, $SquareFeet, $Parking);
                        
                    } else {
                        $result = $this->model('viewModel')->searchBoarding($text, $SortSearch, $Price, $PriceType, $PropertyType, $Street, $CityName, $NoOfMembers, $NoOfRooms, $NoOfWashRooms, $Gender, $BoarderType, $SquareFeet);
                    }

                    if ($result == null) {
                        $resultCount = 0;
                    } else {
                        $resultCount = $result->num_rows;
                    }
                    $this->view('search', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $text]);
                }
            }
        } else {
            //echo "Not submitted";
            $this->view('listing/index');
        }
    }


    public function index()
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
                // $Province = $_POST['province'];
                // $District = $_POST['district'];
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
               // $result = $this->model('viewModel')->searchBoarding($text, $SortSearch, $Price, $PriceType, $PropertyType,$Province,$District, $Street, $CityName, $NoOfMembers, $NoOfRooms, $NoOfWashRooms, $Gender, $BoarderType, $SquareFeet, $Parking);
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
                // if ($Province != null && $Province != "") {
                //     array_push(
                //         $json,
                //         array(
                //             "id" => "province",
                //             "value" => $Province
                //         )
                //     );
                // }
                // ;
                // if ($District != null && $District != "") {
                //     array_push(
                //         $json,
                //         array(
                //             "id" => "district",
                //             "value" => $District
                //         )
                //     );
                // }
                // ;
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
   
}

