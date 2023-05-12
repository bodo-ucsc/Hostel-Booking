<?php
class About extends Controller
{
    public function index($message = null) 
    {
        if (isset($message)) {
            $alert = 'error';
            if ($message == 'fail') {
                $message = "Failed";
            } else if ($message == 'success') {
                $message = "Successful";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('about/index', ['message' => $message, 'alert' => $alert]);
    }  

    public function privacy($message = null) 
    {
        if (isset($message)) {
            $alert = 'error';
            if ($message == 'fail') {
                $message = "Failed";
            } else if ($message == 'success') {
                $message = "Successful";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('about/privacy', ['message' => $message, 'alert' => $alert]);
    }  


}