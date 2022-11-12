<?php

class Home extends Controller
{
    public function index($name = '')
    {

        $this->view('home/index');
    }
    public function signout()
    {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        //$this->view('signin/admin'); 
        header('Location: '. BASEURL. '/home');
    }

}