<?php

if (!( $_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'BoardingOwner')) {
    header('Location: ' . BASEURL . '/home');
}
class Advertisement extends Controller{

    public function index($message = null)
    {
        $this->view('advertisement/index');
    }
   public function addUpdate()
    {
        $this->view('advertisement/addUpdate');
    }

    public function postUpdate()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (empty($_POST)) {
            $json['Status'] = "Failed no values";
            $json_response = json_encode($json);
            echo $json_response;
            return;
        }
        $userId = $_POST['userId'];
            $caption = $_POST['caption'];
            $place = $_POST['place'];

        $data = $this->model('addModel')->postUpdate($userId, $place, $caption);
        if ($data == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
    
}

?>