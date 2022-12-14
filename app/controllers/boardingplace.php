<?php
if (isset($_SESSION['username'])) {
    class Boardingplace extends Controller
    {
        public function addReview()
        {
            $userid = $_SESSION['userid'];

            if (isset($_POST['withReview'])) {

                if (isset($_POST['review'])) {

                    $review = $_POST['review'];
                    $dateTime = date("Y-m-d H:i:s");

                    $res = $this->model('viewModel')->checkData("boardingplacetenant", "boardingplacetenant.TenantId = '$userid'");
                    $res = $res->fetch_assoc();
                    $place = $res['PlaceId'];
                    $rating = $_POST['rating'];
                    // $BOReply = $_POST['BOreply'];

                    $result = $this->model('registerModel')->insertData("reviewrating", ['Place' => $place, 'BoarderId' => $userid, 'Rating' => $rating, 'Review' => $review, 'DateTime' => $dateTime]);
                    if ($result) {

                        $this->model('deleteModel')->deleteRecord("boardingplacetenant", "TenantId = '$userid'");

                        //$this->view('boardingplace/leaveReview', ['error' => 'success']);
                        echo "leave success";
                    }
                }
            } else if (isset($_POST['withoutReview'])) {
                $this->model('deleteModel')->deleteRecord("boardingplacetenant", "TenantId = '$userid'");

                //$this->view('boardingplace/leaveReview', ['error' => 'success']);
                echo "leave success";
            } else if (isset($_POST['cancel'])) {

                $this->view('professional/myboarding');
            } else {
                echo "Not submitted";
            }
        }
    }
} else {
    echo "You have to sign in first";
}
