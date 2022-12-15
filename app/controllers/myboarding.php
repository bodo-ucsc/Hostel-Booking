<?php
if (isset($_SESSION['username'])) {
    class Myboarding extends Controller
    {
        public function index()
        {
            $this->view('professional/dashboard');
        }

        public function leave($userid = null)
        {
            $res = $this->model('viewModel')->checkData("boardingplacetenant, boardingplace", "boardingplacetenant.TenantId = '$userid' AND boardingplacetenant.PlaceId = boardingplace.PlaceId");
            $row = $res->fetch_assoc();
            $this->view('professional/leaving',['res' => $row]);
        }

        public function addReview()
        {
            $this->view('professional/addBoarding');
        }
    }



}



