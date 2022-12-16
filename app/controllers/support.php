<?php

class Support extends Controller
{

    public function index()
    {
        header('Location: ' . BASEURL . 'support/faq');
    }

    public function addSupport()
    {
        if (isset($_POST['userType'])) {
            $type = $_POST['type'];
            $userId = $_POST['userId'];
            $support = $_POST['support'];
            $description = $_POST['description'];
            if (isset($_POST['images'])) {
                $images = $_POST['images'];
            }

            echo $type;
            echo $userId;
            echo $support;
            echo $description; 


            $message = $this->model('addModel')->addSupport($type, $userId, $support, $description );
            if ($message == "success") {
                header("Location: " . BASEURL . "/admin/support/$type/1/2/$message");
                echo ("success");
            } else {
                header("Location: " . BASEURL . "/admin/support/$type/1/2/$message");
                echo ("fail");
            }
        }
    }
}