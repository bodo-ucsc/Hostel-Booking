

<?php

class Delete extends Controller
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
        $id1 = $_POST['Id1'];
        $idvalue1 = $_POST['IdValue1'];
        if(isset($_POST['Id2'])){
            $id2 = $_POST['Id2'];
            $idvalue2 = $_POST['IdValue2'];
        } else {
            $id2 = null;
            $idvalue2 = null;
        }


        $data = $this->model('deleteModel')->deleteData($table, $id1, $idvalue1, $id2, $idvalue2);
        if ($data == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
}