<?php

class Boarding extends Controller
{
    public function index($message = null) 
    {
        if (isset($message)) {
            $alert = 'error';
            if ($message == 'fail') {
                $message = "Failed";
            } else if ($message == 'success') {
                $message = "Successful";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('boarding/index', ['message' => $message, 'alert' => $alert]);
    }

    public function payables($placeId = null)
    {
        if ($placeId == null) {
            $append = null;
        } else {
            $append = "Place = '$placeId'";
        }
        $result = $this->model('viewModel')->get('BoardingPayables', "$append");

        echo json_encode(
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public function leave()
    { 
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (empty($_POST)) {
            $json['Status'] = "Failed no values";
            echo json_encode($json); 
            return;
        }

        $placeId = $_POST['placeid'];
        $userId = $_POST['userid'];
        $data = $this->model('editModel')->modifyData('BoardingPlaceTenant', ['BoarderStatus' => 'left'], "Place = '$placeId' AND TenantId = '$userId'");

        if (isset($_POST['rating'])) {
            $rating = $_POST['rating'];
        } else {
            $rating = null;
        }
        if (isset($_POST['userReview'])) {
            $userReview = $_POST['userReview'];
        } else {
            $userReview = null;
        }

        if ($data == 'success') {
            $data = $this->model('addModel')->postReview($userId, $placeId, $rating, $userReview);
            if ($data == 'success') {
                $json['Status'] = "Success";
                echo json_encode($json); 
                return;
            } else {
                $json['Status'] = "Failed, Review not posted";
                echo json_encode($json); 
                return;
            }
            
        }else{
            $json['Status'] = "Failed to leave";
            echo json_encode($json); 
            return;
        }

    }
}