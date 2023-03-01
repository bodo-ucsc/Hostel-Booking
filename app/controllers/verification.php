<?php

if ( $_SESSION['role'] != 'VerificationTeam') {
    header('Location: ' . BASEURL . '/home');
}
class Verification extends Controller{


    public function index($user = "student", $page = 1, $perPage = 10, $message = null)
    {
        if (isset($message)) {
            $alert = 'error';
            if ($message == 'fail') {
                $message = "Verification Failed";
            } else if ($message == 'success') {
                $message = "Verified Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        if ($user == 'student') {
            $rowCount = $this->model('viewModel')->numRows('student');
            $result = restAPI("userManagement/getUser/student");
        } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
            $rowCount = $this->model('viewModel')->numRows('boardingowner');
            $result = restAPI("userManagement/getUser/boardingowner");
        } else if ($user == 'professional') {
            $rowCount = $this->model('viewModel')->numRows('professional');
            $result = restAPI("userManagement/getUser/professional"); 
        } else if ($user == 'boardingplace' || $user == 'boardingPlace') {
            $rowCount = $this->model('viewModel')->numRows('boardingplace');
            $result = restAPI("listing/placeRestArray"); 
        } 
        
        if($page <= 0){
            header("Location: " . BASEURL . "/verification/$user/1/$perPage");
        }
        if($perPage <= 0){
            header("Location: " . BASEURL . "/verification/$user/$page/1");
        }

        $this->view("verification/$user", ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);

    }


    public function verify($toverify, $id)
    {
        if ($toverify == "Student" || $toverify == "Professional") {
            $toverify = 'Boarder';
        }
        $data = $this->model('editModel')->verify($toverify, $id, $_SESSION['UserId']);
        if ($data == true) {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

}

?>