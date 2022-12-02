<?php

class Home extends Controller
{
    public function index() 
    {
        $this->view('adminhome');
    }  

    public function text() 
    {
        $this->view('home/text');
    }  

    public function signout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header('Location: '.BASEURL.'/signin/admin');
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