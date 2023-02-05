<?php


class friends extends Controller
{

    public function index()
    {
        $this->view('friends/index');
    }

    public function friendrequest($sender,$receiver){
        $result = $this->model('addModel')->sendfriendrequest($sender,$receiver);
        return $result;
    }

    public function peopleYouMayKnow($university,$userid){
        $data1 = $this->model('viewModel')->getPeopleYouMayKnow($university);
        $data2 = $this->model('viewMdoel')->getfriendsActive($userid);
        $data3 = $this->model('viewMdoel')->getfriendsPassive($userid);

        $arr = array();

        while($r1 = $data1->fetch_assoc()){
            $uid = $r1['StudentId'];
            array_push($arr, $uid);
        }
        
        while($r2 = $data2->fetch_assoc()){
            $uid = $r2['FriendId'];

            if (($key = array_search($uid, $arr)) !== false) {
                unset($array[$key]);
            }                        
        }

        while($r3 = $data3->fetch_assoc()){
            $uid = $r3['StudentFriendId'];

            if (($key = array_search($uid, $arr)) !== false) {
                unset($array[$key]);
            }                        
        }

        $json = array();
        while ($row = $data1->fetch_assoc()) {

            if(in_array($row['StudentId'],$arr) && $row['StudentId'] != $_SESSION['userid']){
                $data4 = $this->model('viewMdoel')->getFromUser($userid);
                $row2 = $data4->fetch_assoc();
                $array['Id'] = $row2['UserId'];
                $array['FirstName'] = $row2['FirstName'];
                $array['LastName'] = $row2['LastName'];
                array_push($json, $array);
            }
        }
        $json_response = json_encode($json);
        echo $json_response;
    }



}
