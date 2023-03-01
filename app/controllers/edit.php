

<?php

class Edit extends Controller
{
    public function index()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (empty($_POST)) {
            $json['Status'] = "Failed no values";
            $json_response = json_encode($json);
            echo $json_response;
            return;
        }
        $table = $_POST['Table'];
        $id = $_POST['Id'];
        $idvalue = $_POST['IdValue'];
        $key = $_POST['Key'];
        $value = $_POST['Value'];
        if($key == 'Password'){
            $value = password_hash($value, PASSWORD_DEFAULT);
        } 


        $data = $this->model('editModel')->modifyData($table, [$key => $value], "$id = '$idvalue'");
        if ($data == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
}