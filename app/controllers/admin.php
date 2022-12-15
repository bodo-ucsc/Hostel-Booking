<?php

class Admin extends Controller
{
    public function index()
    {
        $this->view('admin/index');
    }

    public function verificationTeam($page = 1)
    {
        $perPage = 2;
        $rowCount = $this->model('AdminModel')->numRows('VerificationTeam');
        $result = $this->model('AdminModel')->getVerificationTeam($page, $perPage);

        $this->view('admin/verificationTeam', ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage]);
    }

    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/admin');
    }


}