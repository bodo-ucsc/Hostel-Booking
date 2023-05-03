<?php

class SearchProperty extends Controller
{
    public function index()
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
   
}

