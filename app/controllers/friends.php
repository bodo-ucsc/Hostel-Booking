<?php


class friends extends Controller
{

    public function index()
    {

        $userid = $_SESSION['UserId'];

        //$this->view('friends/index');
        $this->showRequests($userid);
    }

    public function friendrequest($sender, $receiver)
    {
        $result = $this->model('addModel')->sendfriendrequest($sender, $receiver);
        return $result;

    }

    public function acceptFriendRequest($sender, $receiver)
    {
        $result = $this->model('editModel')->acceptRequest($sender, $receiver);
        return $result;
    }

    public function rejectFriendRequest($sender, $receiver)
    {
        $result = $this->model('editModel')->rejectRequest($sender, $receiver);
        return $result;
    }



    public function showRequests($userid)
    {
        $result = $this->model('viewModel')->checkData("friend,user,student", "user.UserId = friend.FriendId AND student.StudentId = friend.FriendId AND friend.MainFriendId='$userid'");
        // while ($row = $result->fetch_assoc()) {
        //     $sid = $row['StudentFriendId'];
        //     $rid = $row['FriendId'];
        //     $status = $row['status'];



        //     echo $sid;
        //     echo $rid;
        //     echo $status;
        //     echo $firstname;
        //     echo $lastname;
        //     echo "<br>";
        // }
        $this->view('friends/index', ['result' => $result]);


    }

    public function showFriends($userid)
    {
        $result = $this->model('viewModel')->getfriends($userid);
        return $result;
    }





    public function peopleYouMayKnow($uni, $userid)
    {
        // $university = urlencode("university of colombo");
        
        $university = rawurldecode($uni);
        echo $university;
        $data1 = $this->model('viewModel')->getPeopleYouMayKnow($university);
        $data2 = $this->model('viewModel')->getfriendsActive($userid);
        $data3 = $this->model('viewModel')->getfriendsPassive($userid);

        $arr = array();

        if ($data1 != null) {
            echo "ji";
            while ($r1 = $data1->fetch_assoc()) {
                $uid = $r1['StudentId'];
                echo $uid;
                array_push($arr, $uid);
            }
        }
        
        if ($data2 != null) {
            
            echo "jdi";
            while ($r2 = $data2->fetch_assoc()) {
                $uid = $r2['FriendId']; 
                echo $uid;
                if (($key = array_search($uid, $arr)) !== false) {
                    unset($array[$key]);
                }
            }
        }

        if ($data3 != null) {
            
            echo "jei";
            while ($r3 = $data3->fetch_assoc()) {
                $uid = $r3['StudentFriendId'];
                echo $uid;
                if (($key = array_search($uid, $arr)) !== false) {
                    unset($array[$key]);
                }
            }
        }

        $json = array();

        if ($data1 != null) {
            mysqli_data_seek($data1, 0);
            while ($row = $data1->fetch_assoc()) {
                if (in_array($row['StudentId'], $arr) && $row['StudentId'] != $_SESSION['userid']) {
                    $data4 = $this->model('viewModel')->getFromUser($userid);
                    $row2 = $data4->fetch_assoc();
                    $array['Id'] = $row2['UserId'];
                    $array['FirstName'] = $row2['FirstName'];
                    $array['LastName'] = $row2['LastName'];
                    array_push($json, $array);
                }
            }
        }
        $json_response = json_encode($json);
        echo $json_response;
    }



}