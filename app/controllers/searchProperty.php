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
            $this->view('search', ['result' => $result]);
            // Pass the search results to a view for display
            //$this->view->render('search_results', $results);

        }else{
            echo "Not submitted";
        }
        // echo $info;
        // if (isset($info)) {

        //     $info = explode(" ", $info);
        //     $info = implode("%", $info);
        //     $info = "%" . $info . "%";
        //     echo $info;
            //$this->view("search", ["info" => $info]);
            //$result = $this->model('viewModel')->searchPlace($info);
            //$this->view('search/searchPlace', ['result' => $result]);
    
    

 
    

        // $res = $this->model('viewModel')->checkUser('Username', $username);
        // $res = $res->fetch_assoc();
        // if ($res != null) {

        //     $message = "User name already exists";
        //     header("Location: " . BASEURL . "/admin/userManagement/boardingOwner/1/2/$message");
        // }
    }
}




