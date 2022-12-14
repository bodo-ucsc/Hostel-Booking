<?php
if (isset($_SESSION['username'])) {
    class Myboarding extends Controller
    {
        public function index()
        {
            $this->view('professional/myboarding');
        }


        public function addReview()
        {
            $this->view('professional/addBoarding');
        }
    }



}



