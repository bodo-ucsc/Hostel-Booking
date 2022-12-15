<?php

class Home extends Controller
{
    public function index() 
    {
        //$this->view('admin/adminhome');
        $this->view('home/index');
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