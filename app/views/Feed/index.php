<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;

?>

<main class=" navbar-offset full-width  ">
    <div class=" fill-container center ">

        <?php
        $result = restAPI("feed/postRest/");
        if ($result != null) {
            foreach ($result as $key => $value) {
                new ViewCard($value);
            }
        } else {
            echo "<h1 class='text-center'>No Post Found</h1>";
        }
        ?>
    </div>

    <?php new pageFooter(); ?>
</main>




<script>

    <?php

    if (isset($_SESSION['UserId'])) {

        echo "

    window.onload = function(){
        isLiked(); 
        fetchComments();
        fetchLikes();
    };

        function isLiked(){
            var url = \"$base/feed/likeRest/0/" . $_SESSION['UserId'] . "\"; 
            fetch(url)
                .then((response) => response.json())
                .then((json) => { 
                    
                        for(var i = 0; i < json.length; i++){ 
                            // if json is empty
                            if(json[i].length === 0){
                                continue;
                            }
                            var elem = document.getElementById('like-button-' + json[i][0].Post);  
                            elem.classList.add('black-hover');
                            elem.classList.add('bg-white-hover');
                            elem.classList.remove('bg-accent');
                            elem.classList.remove('white');
                            if(json[i][0].Reaction === 'y'){
                                elem.classList.add('bg-accent');
                                elem.classList.add('white');
                                elem.classList.remove('black-hover');
                                elem.classList.remove('bg-white-hover');
                            }
                            
                        } 
                });
        };
    ";
    } else {
        echo "window.onload = function(){
        fetchComments();
        fetchLikes();
    };";
    }

    echo "
        function fetchComments(){
            var url = \"$base/feed/commentCountRest/\";
            fetch(url)
                .then((response) => response.json())
                .then((json) => { 
                    for (var i = 0; i < json.length; i++) { 
                        if(json[i].Comments == 1){
                            document.getElementById('comment-count-' + json[i].Post).innerHTML = '1 Comment';
                        }else{
                            document.getElementById('comment-count-' + json[i].Post).innerHTML = json[i].Comments + ' Comments';
                        } 
                    }
                });
        };
        function fetchLikes(){
            var url = \"$base/feed/likeRest/\";
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                    var count = 0; 
                    for (var i = 0; i < json.length; i++) { 
                        var elem = document.getElementById('like-list-' + json[i][0].Post);
                        elem.innerHTML = '';
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
                        if(count === 1){
                            document.getElementById('like-count-' + json[i][0].Post).innerHTML = '1 Like';
                        }else{
                            document.getElementById('like-count-' + json[i][0].Post).innerHTML = count + ' Likes';
                        } 
                        count = 0;
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
        };
  
        ";
    ?>
</script>
<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>