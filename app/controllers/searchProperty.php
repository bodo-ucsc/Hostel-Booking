<?php

class SearchProperty extends Controller
{
    public function index()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['searchText'])) {

                $temp=$_POST['searchText'];
                //$search_query = mysqli_real_escape_string($temp);
                $searchWord = $_POST['searchText'];
                $search_query = $_POST['searchText'];
                
                $search_query = str_replace(" ","%","$search_query"); 
                //$search_query = implode("%", $search_query);
               
                $result = $this->model('viewModel')->searchBoarding($search_query);
                if ($result == null) {
                    $resultCount = 0;
                } else {
                    $resultCount = $result->num_rows;
                }   
                $this->view('search', ['result' => $result, 'resultCount' => $resultCount, 'searchText' => $searchWord]);
            } else {
                echo "Not text set";
            }
        } else {
            $this->view('home/index');
        }
    }

    public function getSuggestions()
    {
        // This method will be called via AJAX to retrieve a list of suggested place names
        if (isset($_POST['searchText'])) {
            $search_query = $_POST['searchText'];
            $searchWord = $_POST['searchText'];
            $search_query = str_replace(" ","%","$search_query"); 
            // Call a method on the viewModel model to retrieve a list of suggested place names
            $suggestedPlaces = $this->model('viewModel')->searchBoarding($searchWord);

            // Return the list of suggested place names as a JSON-encoded string
            echo json_encode($suggestedPlaces);
        }
    }
}

?>
