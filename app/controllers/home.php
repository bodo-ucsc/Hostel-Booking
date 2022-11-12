<?php

class Home extends Controller
{
    public function index() 
    {
        $this->view('home/index');
    }  

    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: '.BASEURL.'/home');
    }
    

}