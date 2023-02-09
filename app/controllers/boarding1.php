<?php

class Boarding extends Controller
{
    public function index()
    {
       
        $uname = $_SESSION['username'];
       $this->viewBoarders($uname);
       // $this->view('boarding/index');
    }

    public function boardedRest($placeId=null,$user=null){
        $result = $this->model('viewModel')->getBoardingUsers($placeId,$user);
        $json = array();
        
         while ($row = $result->fetch_assoc()) {
            $array['FirstName'] = $row['firstname'];
            $array['LastName'] = $row['lastname'];
            $array['Tagline'] = $row['tagline'];
            $array['ProfilePicture'] = $row['profilepicture'];
        
            $json_response = json_encode($array);
            echo $json_response;
        }

       
        $json_response = json_encode($array);
        echo $json_response;
    }

    public function viewBoarders($uname)
    { 
        $placeId = $this->model('viewModel')->getID("user,boardingplace,boardingplacetenant", "boardingplace.placeID", "user.Username = '$uname' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.Place=boardingplace.placeID");
        $placeId = $placeId->fetch_assoc();
        $placeId = $placeId['placeID'];

        $userId = $_SESSION["UserID"];
        $postId = $this->model('viewModel')->getID("postupdate", "postupdate.PostId", "postupdate.UserId = '$userId'");
        $postId = $postId->fetch_assoc();
        $postId = $postId['PostId'];
        //$data['postId'] = $postId;

        // $result = $this->model('viewModel')->checkData("user,boardingplacetenant", "boardingplacetenant.place = '$        $placeId = $placeId['placeID'];
        // ' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.TenantId != '$userId'");

        //$result = $this->model('viewModel')->checkData("user,boardingplace,postupdate,boardingplacetenant,student", "boardingplace.placeId = '$placeId' AND boardingplacetenant.place = '$placeId' AND user.UserId=boardingplacetenant.TenantID AND boardingplacetenant.TenantId != '$userId' Group by user.UserId ");
       

      //  $result = $this->model('viewModel')->checkData("user,boardingplace,boardingplacetenant,student", "boardingplacetenant.place = '$placeId' AND boardingplacetenant.place = '$placeId' AND boardingplacetenant.TenantId != '$userID[UserID]' AND user.UserId = boardingplacetenant.TenantID AND boardingplacetenant.TenantID = student.StudentId GROUP BY boardingplacetenant.TenantId");
        //SELECT * FROM `student`,`user`,`boardingplacetenant` WHERE boardingplacetenant.place = 4 AND boardingplacetenant.TenantId != 77 AND boardingplacetenant.TenantID = user.UserId AND boardingplacetenant.TenantID = student.StudentId GROUP BY boardingplacetenant.TenantId;
        // SELECT * FROM `student`,`user`,`boardingplacetenant`,`boarder` WHERE place = 1 AND  BoarderId = TenantID AND userId = BoarderId  AND userId=StudentId;
        

        $result = restAPI("boarding/boardedRest/$placeId/$userId");

        $this->view('boarding/index', ['result' => $result,'postId' => $postId]);
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


// class Boarding extends Controller{
//     public function index()
//     {
//         $uname = $_SESSION['username'];
//         $this->view('boarding/index');
//     }

//     public function viewBoardersRest(){

//     }
// }