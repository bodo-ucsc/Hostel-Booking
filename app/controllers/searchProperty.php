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
        if ( isset($_POST['submit'])){

            if (isset($_POST['searchText'])) {
        
                $search_query = $_POST['searchText'];
                $search_query = explode(" ", $search_query);
                $search_query = implode("%", $search_query);
                
                if($_POST['Price'] != 0){
                    $Price = $_POST['Price'];
                }
                if($_POST['PriceType'] != ''){
                    $PriceType = $_POST['PriceType'];
                }
                if($_POST['Street'] != ''){
                    $Street = $_POST['Street'];
                }
                if($_POST['CityName'] != ''){
                    $CityName = $_POST['CityName'];
                }
                if($_POST['NoOfMembers'] != ''){
                    $NoOfMembers =$_POST['NoOfMembers'];

                }
                if($_POST['NoOfRooms'] != 0){
                    $NoOfRooms = $_POST['NoOfRooms'];

                }
                if($_POST['NoOfWashRooms'] != 0){
                    $NoOfWashRooms = $_POST['NoOfWashRooms'];

                }
                if($_POST['gender'] != ''){

                }
                if($_POST['BoarderType'] != ''){
                    $BoarderType = $_POST['BoarderType'];

                }
                if($_POST['SquareFeet'] != 0){
                    $SquareFeet = $_POST['SquareFeet'];

                }
                if($_POST['Parking'] != ''){
                    $Parking = $_POST['Parking'];

                }
                
            } else {
                echo "Not text set";
            }
        
}

}
}

?>