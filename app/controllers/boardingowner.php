<?php

class BoardingOwner extends Controller
{ 
    public function index()
    {
        
        $this->view('boardingOwner/home');
    }

    public function add()
    {
        
        $this->view('boardingOwner/add');
    }

    public function processAdd()
    {
        $this->view('boardingOwner/process-add');
    }
}