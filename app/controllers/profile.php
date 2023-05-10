<?php

class Profile extends Controller
{
    public function index($userId = null)
    {
        if ($userId == null) {
            if (!isset($_SESSION['UserId'])) {
                header("Location: " . BASEURL . "/login");
            }
            $userId = $_SESSION['UserId'];
        }
        $user = restAPI("userManagement/userIdRest/$userId");
        $this->view('profile/index', ['User' => $user[0]]);
    }

    public function edit()
    {
        if (!isset($_SESSION['UserId'])) {
            header("Location: " . BASEURL . "/login");
        }
        $this->view('profile/edit');
    }
}