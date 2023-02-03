<?php

class StudentDashboard extends Controller
{
    public function index($message = null)
    {
        

        $this->view('studentDashboard/index', ['message' => $message, 'alert' => $alert]);
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

    public function userManagement


}