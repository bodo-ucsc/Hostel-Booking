<?php

class SearchProperty extends Controller
{
 
    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //$search_query = mysqli_real_escape_string($this->model()->dbConnect, $_POST['q']);
            // Retrieve search query from request body
            $search_query = $_POST['q'];

            $result=$this->model('viewModel')->searchBoarding($search_query);
      
            $this->view('search', ['result' => $result, 'searchText' => $search_query]);
            // Pass the search results to a view for display
            //$this->view->render('search_results', $results);

        }else{
            echo "Not submitted";
        }
    }
}




