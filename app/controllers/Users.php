<?php

class Users extends Controller{
  

    public function index(){
        $result = $this->model("Users");
    }
public function login(){
        $result = $this->model("Users/login");
    }

    

}