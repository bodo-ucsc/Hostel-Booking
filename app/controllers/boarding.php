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
        $info = $this->model('viewModel')->checkData("user,boardingplace,boardingplacetenant" ,"user.Username = '$uname' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.Place=boardingplace.placeID");
        $info = $info->fetch_assoc();
        $userID['UserID'] = $info['UserId'];
        $placeId = $this->model('viewModel')->getID("user,boardingplace,boardingplacetenant", "boardingplace.placeID", "user.Username = '$uname' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.Place=boardingplace.placeID");
        $placeId = $placeId->fetch_assoc();
        $placeId = $placeId['placeID'];

        $postId = $this->model('viewModel')->getID("postupdate", "postupdate.PostId", "postupdate.UserId = '$userID[UserID]'");
        $postId = $postId->fetch_assoc();
        $postId = $postId['PostId'];
        // $result = $this->model('viewModel')->checkData("user,boardingplacetenant", "boardingplacetenant.place = '$        $placeId = $placeId['placeID'];
        // ' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.TenantId != '$userID[UserID]'");

        $result = $this->model('viewModel')->checkData("user,boardingplace,boardingplacetenant,student", "boardingplace.placeId = '$placeId' AND boardingplacetenant.place = '$placeId' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.TenantId != '$userID[UserID]' Group by user.UserId");
      //  $result = $this->model('viewModel')->checkData("user,boardingplace,boardingplacetenant,student", "boardingplacetenant.place = '$placeId' AND boardingplacetenant.place = '$placeId' AND boardingplacetenant.TenantId != '$userID[UserID]' AND user.UserId = boardingplacetenant.TenantID AND boardingplacetenant.TenantID = student.StudentId GROUP BY boardingplacetenant.TenantId");
        //SELECT * FROM `student`,`user`,`boardingplacetenant` WHERE boardingplacetenant.place = 4 AND boardingplacetenant.TenantId != 77 AND boardingplacetenant.TenantID = user.UserId AND boardingplacetenant.TenantID = student.StudentId GROUP BY boardingplacetenant.TenantId;
        $this->view('boarding/index', ['result' => $result]);
        $this->view('boarding/index', ['postId' => $postId]);
        
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


// class Boarding extends Controller{
//     public function index()
//     {
//         $uname = $_SESSION['username'];
//         $this->view('boarding/index');
//     }

//     public function viewBoardersRest(){

//     }
// }