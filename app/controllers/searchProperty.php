<?php

class SearchProperty extends Controller
{
    public function index()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['searchText'])) {

                //$search_query = mysqli_real_escape_string($this->model()->dbConnect, $_POST['q']);
                $search_query = $_POST['searchText'];
                
                $search_query = explode(" ", $search_query);
                $search_query = implode("%", $search_query);
                // $Price = $_POST['Price'];
                // $PriceType = $_POST['PriceType'];
                // $Street = $_POST['Street'];
                // $CityName = $_POST['CityName'];
                // $NoOfMembers =$_POST['NoOfMembers'];
                // $NoOfRooms = $_POST['NoOfRooms'];
                // $NoOfWashRooms = $_POST['NoOfWashRooms'];
                // $Gender = $_POST['Gender'];
                // $BoarderType = $_POST['BoarderType'];
                // $SquareFeet = $_POST['SquareFeet'];
                // $Parking = $_POST['Parking'];

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
        } else {
            $this->view('home/index');
        }
    }

    public function FilterProperty()
    {
        // $jsonData = $_POST['jsonData'];
        // $myArray = json_decode($jsonData, true);

        // // Do some processing with the array

        // // Return the updated array as a response
        // header('Content-Type: application/json');
        // echo json_encode($myArray);
        


        if ( isset($_POST['submit'])){

           // if (isset($_POST['searchText'])) {
        
                $search_query = $_POST['searchText'];
                $search_query = explode(" ", $search_query);
                $search_query = implode("%", $search_query);
                
                if($_POST['price'] != 0){
                    $Price = $_POST['price'];
                    echo $Price."<br>";
                }
                if($_POST['price-type'] != ''){
                    $PriceType = $_POST['price-type'];
                    echo $PriceType."<br>";
                }
                if($_POST['street'] != ''){
                    $Street = $_POST['street'];
                    echo $Street."<br>";
                }
                if($_POST['city'] != ''){
                    $CityName = $_POST['city'];
                    echo $CityName."<br>";
                }
                if($_POST['no-of-members'] != ''){
                    $NoOfMembers =$_POST['no-of-members'];
                    echo $NoOfMembers."<br>";

                }
                if($_POST['no-of-rooms'] != 0){
                    $NoOfRooms = $_POST['no-of-rooms'];
                    echo $NoOfRooms."<br>";

                }
                if($_POST['no-of-wash-rooms'] != 0){
                    $NoOfWashRooms = $_POST['no-of-wash-rooms'];
                    echo $NoOfWashRooms."<br>";

                }
                if($_POST['gender'] != ''){
                    $gender=$_POST['gender'];
                    echo $gender."<br>";

                }
                if($_POST['boarder-type'] != ''){
                    $BoarderType = $_POST['boarder-type'];
                    echo $BoarderType."<br>";

                }
                if($_POST['square-feet'] != 0){
                    $SquareFeet = $_POST['square-feet'];
                    echo $SquareFeet."<br>";

                }
                if($_POST['parking'] != ''){
                    $Parking = $_POST['parking'];
                    echo $Parking."<br>";

                }
                
            // } else {
            //     echo "Not text set";
            // }
        
}else{
    echo "Not submitted";
}

}
}
