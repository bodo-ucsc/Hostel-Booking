<?php


class Feed extends Controller
{
    public function index($PostId = null)
    {
        if (!isset($PostId)) {
            $this->view('Feed/index');
        } else {
            header("Location: " . BASEURL . "/feed/viewPost/$PostId");
        }
    }

    public function postRest($PostId = null)
    {
        $data = $this->model('viewModel')->getPost($PostId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['UserType'] = $row['UserType'];
            $array['ProfilePicture'] = $row['ProfilePicture'];
            $array['PostId'] = $row['PostId'];
            $array['PlaceId'] = $row['PlaceId'];
            $array['DateTime'] = $row['DateTime'];
            $array['Caption'] = $row['Caption'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function likeRest($PostId = null, $userId = null)
    {
        $data = $this->model('viewModel')->getLike($PostId, $userId);
        $json = array();
        $array = array();

        if ($data != null) {
            $post = $data->fetch_assoc();
            $count = 0;
            $postArray['Post'] = $post['Post'];
            $data->data_seek(0);
            while ($row = $data->fetch_assoc()) {
                if ($row['Post'] == $postArray['Post']) {
                    $postArray['FirstName'] = $row['FirstName'];
                    $postArray['LastName'] = $row['LastName'];
                    $postArray['Liker'] = $row['Liker'];
                    $postArray['Post'] = $row['Post'];
                    $postArray['Reaction'] = $row['Reaction'];
                    $postArray['DateTime'] = $row['DateTime'];
                    array_push($array, $postArray);
                } else {
                    array_push($json, $array);
                    $array = array();
                    $postArray['FirstName'] = $row['FirstName'];
                    $postArray['LastName'] = $row['LastName'];
                    $postArray['Liker'] = $row['Liker'];
                    $postArray['Post'] = $row['Post'];
                    $postArray['Reaction'] = $row['Reaction'];
                    $postArray['DateTime'] = $row['DateTime'];
                    array_push($array, $postArray);
                }
            }
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function likeCountRest($postId = null)
    {
        $data = $this->model('viewModel')->getLikeCount($postId);
        $json = array();
        if ($data != null) {
            while ($row = $data->fetch_assoc()) {
                $array['Post'] = $row['Post'];
                $array['Likes'] = $row['Likes'];
                array_push($json, $array);
            }
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
    public function commentCountRest($postId = null)
    {
        $data = $this->model('viewModel')->getCommentCount($postId);
        $json = array();
        if ($data != null) {
            while ($row = $data->fetch_assoc()) {
                $array['Post'] = $row['Post'];
                $array['Comments'] = $row['Comments'];
                array_push($json, $array);
            }
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function commentRest($PostId = null)
    {
        $data = $this->model('viewModel')->getComment($PostId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['PostId'] = $PostId;
            $timestamp = strtotime($row['DateTime']);
            $array['DateTime'] = date("M d, Y h.i A", $timestamp);
            $array['Comment'] = $row['comment'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function viewPost($PostId = NULL){ 
        $this->view('Feed/viewPost', ['PostId' => $PostId]);
    }

    public function likeToggle($PostId = null)
    {
        if (isset($PostId)) {
            $UserId = $_SESSION['UserId'];


            $test = $this->model('viewModel')->getTable("React", "Post = '$PostId' AND Liker = '$UserId'");
            if ($test != NULL) {
                while ($row = $test->fetch_assoc()) {
                    $Reaction = $row['Reaction'];
                }
                if ($Reaction == "y") {
                    $this->model('editModel')->toggleLike($PostId, $UserId, "n");
                    $result = "removed";
                } else {
                    $this->model('editModel')->toggleLike($PostId, $UserId, "y");
                    $result = "liked";
                }

            } else {
                $this->model('addModel')->likePost($PostId, $UserId);
                $result = "liked";
            }
            echo json_encode($result);

        }
    }

    public function addComment($PostId = null)
    {

        if (isset($PostId)) {
            $_POST = json_decode(file_get_contents('php://input'), true);
            $commenttext = $_POST['comment'];
            $commentorid = $_SESSION['UserId'];
            $result = $this->model('addModel')->addAComment($commenttext, $PostId, $commentorid);
            echo json_encode($result);
        }


    }

    public function deleteComment($post_id)
    {
        if (isset($post_id)) {
            $this->model('deleteModel')->deleteComment($post_id);
        }
    }



}