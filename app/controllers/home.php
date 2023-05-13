<?php

class Home extends Controller
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
        $this->view('home/index', ['message' => $message, 'alert' => $alert]);
    }  

    public function text() 
    {
        $this->view('home/text');
    }  

    public function signout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: '.BASEURL.'/home');
    }
    

}