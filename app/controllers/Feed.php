<?php


class Feed extends Controller
{
    public function index($PostId = null)
    {

        if (!isset($PostId)) {
            $row = $this->model('viewModel')->getId("PostUpdate", "PostId");
            $this->view('Feed/index', ['row' => $row]);
        } else {
            header("Location: " . BASEURL . "/feed/viewPost/$PostId");
        }
    }

    public function postRest($PostId = null)
    {

        "FirstName,LastName,UserType ,ProfilePicture,PostId ,PlaceId,DateTime,Caption";
        $data = $this->model('viewModel')->getPost($PostId);
        while ($row = $data->fetch_assoc()) {
            $json['FirstName'] = $row['FirstName'];
            $json['LastName'] = $row['LastName'];
            $json['UserType'] = $row['UserType'];
            $json['ProfilePicture'] = $row['ProfilePicture'];
            $json['PostId'] = $row['PostId'];
            $json['PlaceId'] = $row['PlaceId'];
            $json['DateTime'] = $row['DateTime'];
            $json['Caption'] = $row['Caption'];
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function likeRest($PostId = null, $userId = null)
    {
        $data = $this->model('viewModel')->getLike($PostId, $userId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['Post'] = $row['Post'];
            $array['Reaction'] = $row['Reaction'];
            $array['DateTime'] = $row['DateTime'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function commentRest($PostId)
    {
        $data = $this->model('viewModel')->getComment($PostId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['PostId'] = $PostId;
            $array['DateTime'] = $row['DateTime'];
            $array['Comment'] = $row['comment'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function viewPost($PostId)
    {
        $base = BASEURL;
        new HTMLHeader("Feed | Post");
        new Navigation("feed");


        echo "<div class='navbar-offset full-width center'>";
        new ViewCard($PostId, "yes");


        echo "</div>";
        echo "
        <script>
         function likePost(elem,post) {
            var url = \"$base/feed/likeToggle/\" + post;
            var stat;
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    if (json == 'liked') {
                        console.log('liked');
                        elem.classList.add('bg-accent');
                        elem.classList.add('white');
                        elem.classList.remove('black-hover');
                        elem.classList.remove('bg-white-hover');
                    } else {
                        console.log('removed');
                        elem.classList.add('black-hover');
                        elem.classList.add('bg-white-hover');
                        elem.classList.remove('bg-accent');
                        elem.classList.remove('white');
                    }
                });
        };
        </script>
        ";
        new HTMLFooter();
    }
    public function postUpdate()
    {
        $base = BASEURL;
        if (isset($_POST['userId'])) {
            $userId = $_POST['userId'];
            $caption = $_POST['caption'];
            $place = $_POST['place'];

            $result = $this->model('addModel')->postUpdate($userId, $place, $caption);

            header("Location: $base/feed/$result");

        }
    }

    public function likeToggle($PostId = null)
    {
        if (isset($PostId)) {
            $UserId = $_SESSION['UserId'];


            $test = $this->model('viewModel')->checkData("React", "Post = '$PostId' AND Liker = '$UserId'");
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

    public function addComment()
    {

        if (isset($_POST['postid'])) {
            $commenttext = $_POST['comment'];
            $PostId = $_POST['postid'];
            $commentorid = $_SESSION['UserId'];
            $this->model('addModel')->addAComment($commenttext, $PostId, $commentorid);

            header("Location: " . BASEURL . "/feed/viewPost/$PostId");
        }

    }

    public function deleteComment($post_id)
    {
        if (isset($post_id)) {
            $this->model('deleteModel')->deleteComment($post_id);
        }
    }



}