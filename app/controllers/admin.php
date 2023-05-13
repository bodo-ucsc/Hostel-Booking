<?php

class Admin extends Controller
{
    public function index($page = 1, $message = null)
    {
        if (isset($message)) {

            $alert = 'error';
            if ($message == 'fail') {
                $message = "Insertion Failed";
            } else if ($message == 'success') {
                $message = "Inserted Successfully";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $perPage = 2;
        $rowCount = $this->model('viewModel')->numRows('admin');
        $result = restAPI("userManagement/getUser/admin");

        $this->view('userManagement/admin', ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);
    }

   
 



}