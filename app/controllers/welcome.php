<?php

class Welcome extends Controller
{
    public function index()
    {
        $this->view('welcome');
    }
    
    // public function signout()
    // {
    //     session_start();
    //     session_destroy();
    //     header('Location: ' . BASEURL . '/welcome');
    // }

}
?>
