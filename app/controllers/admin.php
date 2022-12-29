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
        $result = $this->model('viewModel')->getUser("admin", $page, $perPage);

        $this->view('userManagement/admin', ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);
    }

    public function create($user = null, $message = null)
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

        if ($user == 'student') {
            $this->view('create/student', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
            $this->view('create/boardingOwner', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'professional') {
            $this->view('create/professional', ['message' => $message, 'alert' => $alert]);
        } else if ($user == 'verificationteam' || $user == 'verificationTeam') {
            $this->view('create/verificationTeam', ['message' => $message, 'alert' => $alert]);
        } else {
            $this->view('userManagement/student', ['message' => $message, 'alert' => $alert]);
        }
    }

    public function userManagement($user = "admin", $page = 1, $perPage = 2, $message = null)
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

        if ($user == 'admin') {
            header("Location: " . BASEURL . "/admin");
        } else if ($user == 'student') {
            $rowCount = $this->model('viewModel')->numRows('student');
            $result = $this->model('viewModel')->getUser("student", $page, $perPage);
        } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
            $rowCount = $this->model('viewModel')->numRows('boardingowner');
            $result = $this->model('viewModel')->getUser("boardingowner", $page, $perPage);
        } else if ($user == 'professional') {
            $rowCount = $this->model('viewModel')->numRows('professional');
            $result = $this->model('viewModel')->getUser("professional", $page, $perPage);
        } else if ($user == 'verificationteam' || $user == 'verificationTeam') {
            $rowCount = $this->model('viewModel')->numRows('verificationteam');
            $result = $this->model('viewModel')->getUser("verificationTeam", $page, $perPage);
        }
        $this->view("userManagement/$user", ['result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);

    }

    public function advertisement($message = null)
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
        $row = $this->model('viewModel')->getId("PostUpdate", "PostId");

        $this->view('advertisement/index', ['row' => $row, 'message' => $message, 'alert' => $alert]);

    }

    public function support($type, $page = 1, $perPage = 2, $message = null)
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

        $rowCount = $this->model('viewModel')->numRowsWhere('Support',"Supporttype = '$type'");
        $result = $this->model('viewModel')->getAllSupport($type, $page, $perPage);
        $this->view('support/index', ['type' => $type, 'result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);


    }

    public function addUpdate()
    {
        $this->view('advertisement/addUpdate');
    }

    public function userEdit($user = "student", $id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . "/admin/userManagement/$user");
        }

        $result = $this->model('viewModel')->getUserById($user, $id);

        $this->view("edit/$user", ['result' => $result]);
    }


    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/admin');
    }



}