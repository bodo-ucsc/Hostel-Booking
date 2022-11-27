<?php
if (isset($_SESSION['username'])) {
class BoardingOwner extends Controller
{ 
    public function index()
    {
        
        $this->view('boardingOwner/BOhome');
    }

    public function addboardingOwner()
    {
        
        $this->view('register/boardingOwner');
    }
}


}else{
    echo "You have to sign in first";
}