<?php 

class feedback extends Controller
{
    public function sendFeedback($name, $email, $message,$type,$userid,$topic) 
    {
            $this->model('addModel')->feedback($name, $email, $message, $type, $userid, $topic);    
            
            $arr = ["status"=>"done"];

            $json = json_encode($arr);

            echo $json;
            
    }      

}