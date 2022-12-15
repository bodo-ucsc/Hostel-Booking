<?php

class Signout extends Controller
{
    public function index()
    {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        $this->view('home/index'); 
    }
}
?>