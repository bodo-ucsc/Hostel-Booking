<?php


class friends extends Controller
{

    public function index($message = null) 
    {
        if (isset($message)) {
            $alert = 'error';
            if ($message == 'fail') {
                $message = "Failed";
            } else if ($message == 'success') {
                $message = "Successful";
                $alert = 'success';
            }
        } else {
            $message = null;
            $alert = null;
        }
        $this->view('friends/index', ['message' => $message, 'alert' => $alert]);
        
    }

    public function sendFriendRequest()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (empty($_POST)) {
            $json['status'] = "Failed no values";
            echo json_encode($json);
            return;
        }
        if (!isset($_POST['sender']) || !isset($_POST['receiver'])) {
            $json['status'] = "Failed";
            echo json_encode($json);
            return;
        }
        if ($_POST['sender'] == $_POST['receiver']) {
            $json['status'] = "Failed";
            echo json_encode($json);
            return;
        }
        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];


        $data = $this->model('addModel')->addFriend($sender, $receiver);
        if ($data == 'success') {
            $json['status'] = "Success";
        } else {
            $json['status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function getFriends($main = null, $status = null)
    {
        $result = $this->model('viewModel')->getFriend();

        $friendarray = array();
        while ($row = $result->fetch_assoc()) {
            if ($row['MainFriendId'] == $main) {
                $array['UserId'] = $row['FriendId'];
                $array['type'] = 'friend';
                $array['status'] = $row['status'];
                array_push($friendarray, $array);
            } else if ($row['FriendId'] == $main) {
                $array['UserId'] = $row['MainFriendId'];
                $array['type'] = 'main';
                $array['status'] = $row['status'];
                array_push($friendarray, $array);
            } else {
                $array['UserId'] = $row['MainFriendId'];
                $array['type'] = 'not';
                $array['status'] = 'not';
                array_push($friendarray, $array);
            }
        }

        if ($status != null) {
            $friendarray = array_filter($friendarray, function ($item) use ($status) {
                if ($item['status'] == $status) {
                    return true;
                }
                return false;
            });
        }
        $data = $this->model('viewModel')->getBoarderDetails($friendarray);

        $mergedData = array();
        foreach ($data as $item) {
            $userId = $item['UserId'];
            $mergedData[$userId] = $item;
        }

        foreach ($friendarray as $friend) {
            $userId = $friend['UserId'];
            if (isset($mergedData[$userId])) {
                $mergedData[$userId] = array_merge($mergedData[$userId], $friend);
            }
        }

        $result = array_values($mergedData);
        echo json_encode($result);
    }

    public function friendRecommendation($userid = 0)
    {
        session_start();
        $data = $this->model('viewModel')->getBoarderDetails();

        $data = $data->fetch_all(MYSQLI_ASSOC);
        $result = $this->model('viewModel')->getFriend($userid);
        $friendarray = array();

        while ($row = $result->fetch_assoc()) {
            if ($row['MainFriendId'] == $userid) {
                array_push($friendarray, $row['FriendId']);
            } else if ($row['FriendId'] == $userid) {
                array_push($friendarray, $row['MainFriendId']);
            }
        }


        $data = array_filter($data, function ($item) use ($friendarray) {
            if (!in_array($item['UserId'], $friendarray)) {
                return true;
            }
            return false;
        });

        //remove the current user from the list
        $data = array_filter($data, function ($item) use ($userid) {
            if ($item['UserId'] != $userid) {
                return true;
            }
            return false;
        });

        //remove the index
        $data = array_values($data);

        // remove duplicate row with same user id and no place
        foreach ($data as $key => $value) {
            if ($value['UserId'] == $data[$key + 1]['UserId'] && $value['Place'] == null) {
                unset($data[$key]);
            }
        }

        usort($data, function ($a, $b) {
            if ($a['Tagline'] == $_SESSION['workuni']) {
                return -1;
            } else if ($b['Tagline'] == $_SESSION['workuni']) {
                return 1;
            }
            return 0;
        });

        //  limit the result to 7
        $data = array_slice($data, 0, 7);





        echo json_encode($data);
    }





    public function inviteFriend()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (empty($_POST)) {
            $json['status'] = "Failed no values";
            echo json_encode($json);
            return;
        }
        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];
        $place = $_POST['place'];

        $data = $this->model('addModel')->inviteFriend($sender, $receiver, $place);
        if ($data == 'success') {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        echo json_encode($json);

    }

    public function invitedFriends($userId = null, $friend = null, $status = null)
    {
        if ($userId == null || $userId == 0) {
            $append = null;
        } else {
            $append = "Tenant = '$userId'";
        }
        if ($friend != null) {
            if ($append == null) {
                $append = "FriendId = '$friend'";
            } else {
                $append = $append . " AND FriendId = '$friend'";
            }
        }
        if ($status != null) {
            if ($append == null) {
                $append = "status = '$status'";
            } else {
                $append = $append . " AND status = '$status'";
            }
        }
        $result = $this->model('viewModel')->get('FriendInvite', "$append");
        echo json_encode(
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }
 


}