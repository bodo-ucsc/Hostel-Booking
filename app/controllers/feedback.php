<?php

class feedback extends Controller
{
    public function sendFeedback($name, $email, $message) 
    {
            $this->model('addModel')->feedback($name, $email, $message);    
            
            $arr = ["status"=>"done"];

            $json = json_encode($arr);

            echo $json;
            
    }      

}