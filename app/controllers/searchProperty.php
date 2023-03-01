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
                $search_query = "%" . $search_query . "%";

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
}

?>
