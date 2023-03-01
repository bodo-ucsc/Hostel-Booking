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

   

    public function support($type = 'issue', $page = 1, $perPage = 2, $message = null)
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

        $rowCount = $this->model('viewModel')->numRowsWhere('Support', "Supporttype = '$type'");
        $result = $this->model('viewModel')->getAllSupport($type, $page, $perPage);
        $this->view('support/index', ['type' => $type, 'result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);


    }
 


    public function addSupport($type = 'issue')
    {
        $this->view('support/addSupport', ['type' => $type]);
    }
 



}