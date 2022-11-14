<?php

class BoardingOwner extends Controller
{ 
    public function index()
    {
        
        $this->view('boardingOwner/BOhome');
    }

    public function addboardingOwner()
    {
        
        $this->view('boardingOwner/process-add');
    }

    // public function processAdd()
    // {
    //     $this->view('boardingOwner/process-add');
    // }
}