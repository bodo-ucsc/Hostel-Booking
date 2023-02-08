<?php


class Feed extends Controller
{
    public function index($PostId = null)
    {
        if (!isset($PostId)) {
            $this->view('Feed/index');
            $this->view('bordings/index');
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

    public function viewPost($PostId = null)
    {
        $base = BASEURL;
        new HTMLHeader("Feed | Post");
        new Navigation("feed");



        echo "<div class='navbar-offset full-width center'>";

        $result = restAPI("feed/postRest/$PostId");
        echo $result[0]->FirstName;
        echo $result[0]->LastName;
        echo $result[0]->UserType;
        echo $result[0]->ProfilePicture;
        echo $result[0]->PostId;
        echo $result[0]->PlaceId;
        echo $result[0]->DateTime;
        echo $result[0]->Caption;
        new ViewCard($result[0], "y");
        echo "</div>";
        echo "
        <script>

        window.onload = function(){
            isLiked();
            fetchLikes();
            fetchComments();
        };

 
        function isLiked(){
            var url = \"$base/feed/likeRest/$PostId/" . $_SESSION['UserId'] . "\"; 
            var elem = document.getElementById('like-button-$PostId');
            elem.classList.add('black-hover');
            elem.classList.add('bg-white-hover');
            elem.classList.remove('bg-accent');
            elem.classList.remove('white');
            fetch(url)
                .then((response) => response.json())
                .then((json) => { 
                    if(json.length > 0){
                        if(json[0][0].Reaction === 'y'){
                            elem.classList.add('bg-accent');
                            elem.classList.add('white');
                            elem.classList.remove('black-hover');
                            elem.classList.remove('bg-white-hover');
                        } 
                    } 
                    
                });
        };
var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log('Connection established!'); 
    conn.send(JSON.stringify({ 
        'msg': '',
        'date;': '',
        'name': '',
        'newRoute': 'chat-$PostId'
    }));

};


conn.onmessage = function(e) {
    var data = JSON.parse(e.data);
    console.log(data);
    var commentElem = document.createElement('div');
    commentElem.classList.add('col-11');
    commentElem.classList.add('fill-container');
    commentElem.innerHTML = \"<div class='row no-gap padding-3 bg-white shadow-small border-rounded'><div class='col-12 fill-container left small bold'>\" + data.name + \"</div><div class='col-12 fill-container left padding-bottom-2 '>\" + data.msg + \"</div><div class='col-12 fill-container right small grey '>\" +data.date + \"</div></div>\";
    document.getElementById('comment-list-$PostId').appendChild(commentElem);

};
        function fetchComments(){
            var url = \"$base/feed/commentRest/$PostId\";
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    if(json.length == 1){
                        document.getElementById('comment-count-$PostId').innerHTML = '1 Comment';
                    }else{
                        document.getElementById('comment-count-$PostId').innerHTML = json.length + ' Comments';
                    }
                    var elem = document.getElementById('comment-list-$PostId');
                    elem.innerHTML = '';
                    for (var i = 0; i < json.length; i++) {
                        var comment = json[i];
                        console.log(comment); 
                        var commentElem = document.createElement('div');
                        commentElem.classList.add('col-11');
                        commentElem.classList.add('fill-container');
                        commentElem.innerHTML = \"<div class='row no-gap padding-3 bg-white shadow-small border-rounded'><div class='col-12 fill-container left small bold'>\" + comment.FirstName + \" \" + comment.LastName + \"</div><div class='col-12 fill-container left padding-bottom-2 '>\" + comment.Comment + \"</div><div class='col-12 fill-container right small grey '>\" +comment.DateTime + \"</div></div>\";
                        elem.appendChild(commentElem);
                    }
                });
        };
        function fetchLikes(){
            var url = \"$base/feed/likeRest/$PostId\";
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    if(json.length >= 1){ 
                        var elem = document.getElementById('like-list-$PostId');
                        var count = 0;
                        elem.innerHTML = '';
                        for (var i = 0; i < json.length; i++) { 
                            for (var j = 0; j < json[i].length; j++) {
                                if(json[i][j].Reaction === 'y'){
                                    count++;
                                    var likes = json[i][j];
                                    var likeElem = document.createElement('div');
                                    likeElem.classList.add('padding-left-4'); 
                                    likeElem.classList.add('left'); 
                                    likeElem.classList.add('padding-2'); 
                                    likeElem.innerHTML =  likes.FirstName + \" \" + likes.LastName;
                                    elem.appendChild(likeElem);
                                }
                            }
                            
                        } 
                    } 
                    if(count === 1){
                        document.getElementById('like-count-$PostId').innerHTML = '1 Like';
                    }else{
                        document.getElementById('like-count-$PostId').innerHTML = count + ' Likes';
                    }
                });
        };
         function likePost(elem,post) {
            var url = \"$base/feed/likeToggle/\" + post;
            var stat;
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    if (json == 'liked') { 
                        elem.classList.add('bg-accent');
                        elem.classList.add('white');
                        elem.classList.remove('black-hover');
                        elem.classList.remove('bg-white-hover');
                    } else {
                        elem.classList.add('black-hover');
                        elem.classList.add('bg-white-hover');
                        elem.classList.remove('bg-accent');
                        elem.classList.remove('white');
                    }
                    fetchLikes(); 
                });
        };";

        $commentor = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
        $datesent = date('M d, Y h.i A');

        echo "

var input = document.getElementById('comment-$PostId');

input.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    addComment();
  }
});
        function addComment() {
            var url = \"$base/feed/addComment/$PostId\";
            var comment = document.getElementById('comment-$PostId').value;
            conn.send(JSON.stringify({
                'msg': comment,
                'name': '$commentor',
                'date': '$datesent',
                'newRoute': null
            }));
            fetch(url, {
                method: 'POST',
                body:  JSON.stringify({
                    'comment': comment
                })
                ,
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => response.json())
                .then((json) => {
                    fetchComments(); 
                    document.getElementById('comment-$PostId').value = '';
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