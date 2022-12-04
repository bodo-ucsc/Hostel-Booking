<?php

class Home extends Controller
{
    public function index() 
    {
        $this->view('home/index');
    }  

    public function text() 
    {
        $this->view('home/text');
    }  

    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: '.BASEURL.'/home');
    }
    // public function signout()
    // {
    //     session_start();
    //     session_destroy();
    //     unset($_SESSION['username']);
    //     header('Location: ' . BASEURL . '/home');
// }
       // $this->view('home/index');
    //}  

    

}