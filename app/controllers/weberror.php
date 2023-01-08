<?php

class weberror extends Controller
{
    public function index()
    {
        $this->view('error/404');
    }

    public function e404()
    {
        $this->view('error/404');
    }

}