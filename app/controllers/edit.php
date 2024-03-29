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

        if (isset($_POST['Id2']) && isset($_POST['IdValue2'])) {
            $append = " AND " . $_POST['Id2'] . " = '" . $_POST['IdValue2'] . "'";
        } else {
            $append = "";
        }

        if (isset($_POST['Id3']) && isset($_POST['IdValue3'])) {
            $append = " AND " . $_POST['Id3'] . " = '" . $_POST['IdValue3'] . "'";
        } else {
            $append = "";
        }

        $key = $_POST['Key'];
        $value = $_POST['Value'];
        if ($key == 'Password') {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }

        if ($key == 'Description') {
            $value = nl2br($value);
        }

        if(isset($_POST['Key2']) && isset($_POST['Value2'])){
            $key2 = $_POST['Key2'];
            $value2 = $_POST['Value2'];
            $key1 = $_POST['Key1'];
            $value1 = $_POST['Value1']; 
            $data = $this->model('editModel')->modifyData($table, [$key => $value, $key1 => $value1, $key2 => $value2], "$id = '$idvalue' $append");
        }
        else if(isset($_POST['Key1']) && isset($_POST['Value1'])){
            $key1 = $_POST['Key1'];
            $value1 = $_POST['Value1']; 
            $data = $this->model('editModel')->modifyData($table, [$key => $value, $key1 => $value1], "$id = '$idvalue' $append");
        }
        else{
            $data = $this->model('editModel')->modifyData($table, [$key => $value], "$id = '$idvalue' $append");
        }


        if ($data == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }

        if ($table == 'BoardingPlaceTenant' && $key == 'BoarderStatus' && $id == 'TenantId' && $value == 'boarded' && $data == 'success') {
            $data = $this->model('deleteModel')->deleteData($table, $key, "requested", $id, $idvalue);
        }

        $json_response = json_encode($json);
        echo $json_response;
    }
}