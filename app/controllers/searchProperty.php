<?php

class SearchProperty extends Controller
{
    public function Search()
    {
        $text=$_POST['searchText'];
        if (isset($_POST['submit'])) {


            if ($_POST['filters'] == 'yes') {
                if (isset($_POST['submit'])) {
                    
                    $append=null;
                    //$search_query = $_POST['searchText'];
                    // $search_query = explode(" ", $search_query);
                    // $search_query = implode("%", $search_query);

                    if (isset($_POST['price'])) {
                        $Price = floatval($_POST['price']);
                        if ($Price != 0) {
                            $append .= "Price BETWEEN '0' AND $Price AND ";
                        }
                    }
                    if (isset($_POST['priceType']) && $_POST['priceType'] != null) {
                        $PriceType = $_POST['priceType'];
                        $append .= "PriceType = '$PriceType' AND ";
                    }
                    if (isset($_POST['street']) && $_POST['street'] != null) {
                        $Street = $_POST['street'];
                        $append .= "Street = '$Street' AND ";
                    }
                    if (isset($_POST['city']) && $_POST['city'] != null) {
                        $CityName = $_POST['city'];
                        $append .= "CityName = '$CityName' AND ";
                    }
                    if (isset($_POST['NoOfRooms']) && $_POST['NoOfRooms'] != 0) {
                        $NoOfRooms = $_POST['NoOfRooms'];
                        $append .= "NoOfRooms = '$NoOfRooms' AND ";
                    }
                    if (isset($_POST['NoOfMembers']) && $_POST['NoOfMembers'] != 0) {
                        $NoOfMembers = $_POST['NoOfMembers'];
                        $append .= "NoOfMembers = '$NoOfMembers' AND ";
                    }
                    if (isset($_POST['NoOfWashrooms']) && $_POST['NoOfWashrooms'] != 0) {
                        $NoOfWashRooms = $_POST['NoOfWashrooms'];
                        $append .= "NoOfWashRooms= '$NoOfWashRooms' AND ";
                    }
                    if (isset($_POST['gender']) && $_POST['gender'] != null) {
                        $gender = $_POST['gender'];
                        $append .= "Gender = '$gender' AND ";
                    }
                    if (isset($_POST['boarderType']) && $_POST['boarderType'] != null) {
                        $BoarderType = $_POST['boarderType'];
                        $append .= "BoarderType= '$BoarderType' AND ";
                    }
                    if (isset($_POST['squareFeet']) && $_POST['squareFeet'] != 0) {
                        $SquareFeet = $_POST['squareFeet'];
                        $append .= "SquareFeet = '$SquareFeet' AND ";
                    }
                    if (isset($_POST['parking']) && $_POST['parking'] != null) {
                        $Parking = $_POST['parking'];
                        $append .= "Parking = '$Parking'";
                    }
                    $append= rtrim($append, 'AND ');
                    echo "<br>" . $append . "<br>";

                    // $result = $this->model('viewModel')->FilterBoarding($text,$append);
                    // if ($result == null) {
                    //     $resultCount = 0;
                    // } else {
                    //     $resultCount = $result->num_rows;
                    // }
                    // $this->view('search', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $text]);
                }
            } else {

                if (isset($_POST['searchText'])) {

                    //$search_query = mysqli_real_escape_string($this->model()->dbConnect, $_POST['q']);
                    $search_query = $_POST['searchText'];

                    $search_query = explode(" ", $search_query);
                    $search_query = implode("%", $search_query);

                    //$result = $this->model('viewModel')->filterProperty($search_query,$Price,$PriceType,$Street,$CityName,$NoOfMembers,$NoOfRooms,$NoOfWashRooms,$Gender,$BoarderType,$SquareFeet,$Parking);

                    $result = $this->model('viewModel')->searchBoarding($search_query);

                    if ($result == null) {
                        $resultCount = 0;
                    } else {
                        $resultCount = $result->num_rows;
                    }
                    $this->view('search', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $search_query]);
                } else {
                    echo "Not text set";
                }
            }

        } else {
            $this->view('home/index');
        }
    }
    /*
    public function FilterProperty($text = null)
    {
        if ($text != null) {
            $searchquery = $text;
        }
        if (isset($_POST['submit'])) {

            $append = null;
            // if (isset($_POST['searchText'])) {

            //$search_query = $_POST['searchText'];
            // $search_query = explode(" ", $search_query);
            // $search_query = implode("%", $search_query);

            if ($_POST['price'] != 0) {
                $Price = $_POST['price'];
                //echo $Price."<br>";
                $append = "Price = '$Price'";
            }
            if ($_POST['price-type'] != '') {
                $PriceType = $_POST['price-type'];
                //echo $PriceType."<br>";
                $append .= "AND PriceType = '$PriceType'";
            }
            if ($_POST['street'] != '') {
                $Street = $_POST['street'];
                //echo $Street."<br>";
                $append .= "AND Street = '$Street'";
            }
            if ($_POST['city'] != '') {
                $CityName = $_POST['city'];
                //echo $CityName."<br>";
                $append .= "AND CityName = '$CityName'";
            }
            if ($_POST['no-of-members'] != 0) {
                $NoOfMembers = $_POST['no-of-members'];
                //echo $NoOfMembers."<br>";
                $append .= "AND NoOfMembers = '$NoOfMembers'";
            }
            if ($_POST['no-of-rooms'] != 0) {
                $NoOfRooms = $_POST['no-of-rooms'];
                //echo $NoOfRooms."<br>";
                $append .= "AND NoOfRooms = '$NoOfRooms'";
            }
            if ($_POST['no-of-wash-rooms'] != 0) {
                $NoOfWashRooms = $_POST['no-of-wash-rooms'];
                //echo $NoOfWashRooms."<br>";
                $append .= "AND NoOfWashRooms= '$NoOfWashRooms'";
            }
            if ($_POST['gender'] != '') {
                $gender = $_POST['gender'];
                //echo $gender."<br>";
                $append .= "AND Gender = '$gender'";
            }
            if ($_POST['boarder-type'] != '') {
                $BoarderType = $_POST['boarder-type'];
                //echo $BoarderType."<br>";
                $append .= "AND BoarderType= '$BoarderType'";
            }
            if ($_POST['square-feet'] != 0) {
                $SquareFeet = $_POST['square-feet'];
                //echo $SquareFeet."<br>";
                $append .= "AND SquareFeet = '$SquareFeet'";
            }
            if ($_POST['parking'] == 'y' || $_POST['parking'] == 'n') {
                $Parking = $_POST['parking'];
                //echo $Parking."<br>";
                $append .= "AND Parking = '$Parking'";
            }

            echo "<br>" . $append . "<br>";
            // $result = $this->model('viewModel')->FilterBoarding($searchquery,$append);


            // if ($result == null) {
            //     $resultCount = 0;
            // } else {
            //     $resultCount = $result->num_rows;
            // }   
            //$this->view('filterResult', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $searchquery]);
            // } else {
            //     echo "Not text set";
            // }

        } else {
            echo "Not submitted";
        }
        
    }
    */
}
