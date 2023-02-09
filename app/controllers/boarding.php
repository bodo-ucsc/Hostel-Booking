<?php

class Boarding extends Controller
{
    public function index()
    {

        $uname = $_SESSION['username'];
        $this->viewBoarders($uname);
        // $this->view('boarding/index');
    }

    public function viewBoarders($uname)
    {

        $userId = $_SESSION['UserId'];
        $placeId = $this->model('viewModel')->getID("user,boardingplace,boardingplacetenant", "boardingplace.placeID", "user.Username = '$uname' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.Place=boardingplace.placeID");
        $placeId = $placeId->fetch_assoc();
        $placeId = $placeId['placeID'];

        $postId = $this->model('viewModel')->getID("postupdate", "postupdate.PostId", "postupdate.UserId = '$userId'");
        $postId = $postId->fetch_assoc();
        $postId = $postId['PostId'];

        $result = $this->model('viewModel')->checkData("user,boardingplace,boarder,postupdate,boardingplacetenant,student", "boardingplace.placeId = '$placeId' AND boardingplacetenant.place = '$placeId' AND user.userId=boardingplacetenant.TenantID AND boardingplacetenant.TenantId != '$userId' Group by user.userId ");

        // SELECT firstname,lastname,studentuniversity as tagline, profilepicture FROM `student`,`user`,`boardingplacetenant`,`boarder` WHERE place = 1 AND  BoarderId = TenantID AND userId = BoarderId  AND userId=StudentId UNION SELECT firstname,lastname,usertype as tagline, profilepicture FROM `professional`,`user`,`boardingplacetenant`,`boarder` WHERE place = 1 AND  BoarderId = TenantID AND userId = BoarderId  AND userId=professionalId;
        
        $this->view('boarding/index', ['result' => $result, 'postId' => $postId]);
        //$this->view('boarding/index', $data);

        // while ($row = $result->fetch_assoc()) {
        //     $array['FirstName'] = $row['FirstName'];
        //     $array['LastName'] = $row['LastName'];


        //     $json_response = json_encode($array);
        //     echo $json_response;
        // }
        // $json_response = json_encode($array);
        // echo $json_response;

    }
}
