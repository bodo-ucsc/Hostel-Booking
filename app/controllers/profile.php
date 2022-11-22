<?php

class Profile extends Controller{
    public function index(){
        $this->view('profile/index');
    }

    public function edit(){ 
        $this->view('profile/edit');
    }
} 