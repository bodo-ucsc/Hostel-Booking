<?php
if (isset($data['PostId'])) {
    $PostId = $data['PostId'];
    $result = restAPI("feed/postRest/$PostId");
    if (empty($result)) {
        header("Location: " . BASEURL . "/Feed");
    }
} else {
    header("Location: " . BASEURL . "/Feed");
}


$base = BASEURL;
new HTMLHeader("Feed | Post");
new Navigation("feed");




echo "<div class='navbar-offset full-width center'>";


new ViewCard($result[0], "y");
echo "</div>";
echo "
        <script>";



if (isset($_SESSION['UserId'])) {
    echo "

            window.onload = function(){ 
                isLiked();
                fetchLikes();
                fetchComments();
            };

        function isLiked(){
            let url = \"$base/feed/likeRest/$PostId/" . $_SESSION['UserId'] . "\"; 
            let elem = document.getElementById('like-button-$PostId');
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
        };";
} else {
    echo "
            window.onload = function(){ 
                fetchLikes();
                fetchComments();
            };";
}

echo "
let conn = new WebSocket('ws://" . $_SERVER['SERVER_NAME'] . ":8080');
conn.onopen = function(e) {
    console.log('Connection established!'); 
    conn.send(JSON.stringify({  
        'newRoute': 'chat-$PostId'
    }));

};


let timeoutHandle = window.setTimeout(function(){ 
    document.getElementById('comment-typing-$PostId').innerHTML = '';
}, 2000);

conn.onmessage = function(e) {
    let data = JSON.parse(e.data);
    console.log(data);
    if(typeof data.msg !== 'undefined'){

        document.getElementById('comment-typing-$PostId').innerHTML = '';
        let commentElem = document.createElement('div');
        commentElem.classList.add('col-11');
        commentElem.classList.add('fill-container');
        commentElem.innerHTML = \"<div class='row  no-gap padding-3 bg-white shadow-small border-rounded'><div class='col-12 fill-container left small bold'>\" + data.name + \"</div><div class='col-12 wordwrap fill-container left padding-bottom-2 '>\" + data.msg + \"</div><div class='col-12 fill-container right small grey '>\" +data.date + \"</div></div>\";
        document.getElementById('comment-list-$PostId').appendChild(commentElem);
    }
    else if(typeof data.typing !== 'undefined'){
       
        document.getElementById('comment-typing-$PostId').innerHTML = data.name + \" is typing...\";
        window.clearTimeout( timeoutHandle );
        timeoutHandle = window.setTimeout(function(){ 
            document.getElementById('comment-typing-$PostId').innerHTML = '';
        }, 2000);
        
    } 


};
        function fetchComments(){ 
            let url = \"$base/feed/commentRest/$PostId\";
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    if(json.length == 1){
                        document.getElementById('comment-count-$PostId').innerHTML = '1 Comment';
                    }else{
                        document.getElementById('comment-count-$PostId').innerHTML = json.length + ' Comments';
                    }
                    let elem = document.getElementById('comment-list-$PostId');
                    elem.innerHTML = '';
                    for (let i = 0; i < json.length; i++) {
                        let comment = json[i];
                        console.log(comment); 
                        let commentElem = document.createElement('div');
                        commentElem.classList.add('col-11');
                        commentElem.classList.add('fill-container');
                        commentElem.innerHTML = \"<div class='row no-gap padding-3 bg-white shadow-small border-rounded'><div class='col-12 fill-container left small bold'>\" + comment.FirstName + \" \" + comment.LastName + \"</div><div class='col-12 wordwrap fill-container left padding-bottom-2 '>\" + comment.Comment + \"</div><div class='col-12 fill-container right small grey '>\" +comment.DateTime + \"</div></div>\";
                        elem.appendChild(commentElem);
                    }
                });
        };
        function fetchLikes(){
            let url = \"$base/feed/likeRest/$PostId\";
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    if(json.length >= 1){ 
                        let elem = document.getElementById('like-list-$PostId');
                        let count = 0;
                        elem.innerHTML = '';
                        for (let i = 0; i < json.length; i++) { 
                            for (let j = 0; j < json[i].length; j++) {
                                if(json[i][j].Reaction === 'y'){
                                    count++;
                                    let likes = json[i][j];
                                    let likeElem = document.createElement('div');
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
            let url = \"$base/feed/likeToggle/\" + post;
            let stat;
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
if (isset($_SESSION['UserId'])) {
    $commentor = $_SESSION['firstname'] . " " . $_SESSION['lastname'];

    $datesent = date('M d, Y h.i A');

    echo "

        let input = document.getElementById('comment-$PostId');

        input.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            addComment();
        }
        });

        function typing(){
            conn.send(JSON.stringify({
                'typing': 'y',
                'name': '$commentor'
            }));
        }

        function addComment() {
            let url = \"$base/feed/addComment/$PostId\";
            let comment = document.getElementById('comment-$PostId').value;
            if(comment === ''){
                return;
            }
            conn.send(JSON.stringify({
                'msg': comment,
                'name': '$commentor',
                'date': '$datesent'
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
        }; ";
}
echo "
        </script>
        ";
new HTMLFooter();
?>