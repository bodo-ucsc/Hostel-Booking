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
            $result = restAPI("userManagement/getUser/student");
        } else if ($user == 'boardingowner' || $user == 'boardingOwner') {
            $rowCount = $this->model('viewModel')->numRows('boardingowner');
            $result = restAPI("userManagement/getUser/boardingowner");
        } else if ($user == 'professional') {
            $rowCount = $this->model('viewModel')->numRows('professional');
            $result = restAPI("userManagement/getUser/professional");
        } else if ($user == 'verificationteam' || $user == 'verificationTeam') {
            $rowCount = $this->model('viewModel')->numRows('verificationteam');
            $result = restAPI("userManagement/getUser/verificationteam");
        }
        
        if($page <= 0){
            header("Location: " . BASEURL . "/admin/userManagement/$user/1/$perPage");
        }
        if($perPage <= 0){
            header("Location: " . BASEURL . "/admin/userManagement/$user/$page/1");
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
    public function addUpdate()
    {
        $this->view('advertisement/addUpdate');
    }

    public function userEdit($user = "student", $id = null)
    {
        if ($id == null) {
            header('Location: ' . BASEURL . "/admin/userManagement/$user");
        }

        $result = $this->model('viewModel')->getUser($user, $id);

        $this->view("edit/$user", ['result' => $result]);
    }


    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/admin');
    }



}