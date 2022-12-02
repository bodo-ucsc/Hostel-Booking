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

    public function support($page = 1)
    {
        $perPage = 2;
        $rowCount = $this->model('AdminModel')->numRows('VerificationTeam');
        $result = $this->model('AdminModel')->getVerificationTeam($page, $perPage);

        $this->view('admin/support', ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage]);
    }

    public function verificationTeamEdit($id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . '/admin/verificationTeam');
        }

        $result = $this->model('AdminModel')->getVerificationTeamById($id);

        $this->view('edit/verificationTeam', ['result' => $result]);
    }

    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/admin');
    }


}