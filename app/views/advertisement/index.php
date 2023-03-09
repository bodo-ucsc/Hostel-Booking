<?php
$header = new HTMLHeader("Advertisement Management");
$nav = new Navigation("management");
$base = BASEURL;

new SideBarNav("Advertisement");
?>

<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 fill-container">
            <div class="row margin-horizontal-5 ">
                <div class="col-8 left fill-container">
                    <h1 class="header-1 ">
                        Advertisement Management
                    </h1>
                </div>

                <div class="col-4  fill-container right">
                    <button class="bg-blue-hover white border-rounded header-nb padding-3 right"
                        onclick="location.href='<?php echo $base ?>/advertisement/addUpdate'">
                        <i data-feather="plus" class=" vertical-align-middle "></i>
                        <span class="display-large-inline-block padding-left-2 display-none">Add Ad</span>
                    </button>
                </div>
            </div>

            <?php
                if ($_SESSION['role'] == 'BoardingOwner') {
                    $result = restAPI("feed/postRest/null/" . $_SESSION['UserId']);}
                else {
                    $result = restAPI("feed/postRest");
                }
                if ($result != null) {
                    foreach ($result as $key => $value) {
                        new ViewCard($value, null, 'y');
                    }
                } else {
                    echo "<h1 class='text-center'>No Post Found</h1>";
                }
            
            ?>
        </div>
    </div>

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
                            if(json[i][0].Post != null){
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

    function deletePost(id) {
        const data = {
            Table: 'PostUpdate',
            Id1: 'PostId',
            IdValue1: id,
        };
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#006DFF',
            cancelButtonColor: '#C83A3A',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {

                fetch("<?php echo BASEURL ?>/delete/", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                }).then(response => response.json())
                    .then(json => {
                        if (json.Status === 'Success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully'
                            }).then((result) => {
                                location.reload();
                            });

                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                        }
                    }).catch(function (error) {
                        console.log('Request failed', error);
                    });

            }
        })


    };

    function editPost(id, Caption) {



        Swal.fire({
            title: 'Edit Caption',
            html:
                '<input type="text" class=" fill-container margin-0 " id="caption" name="firstname" placeholder="Enter First Name" value="' + Caption + '" >',
            showCancelButton: true,
            cancelButtonColor: '#788292',
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    Table: 'PostUpdate',
                    Id: 'PostId',
                    IdValue: id,
                    Key: 'Caption',
                    Value: document.getElementById('caption').value,
                };

                fetch("<?php echo BASEURL ?>/edit/", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                }).then(response => response.json())
                    .then(json => {
                        if (json.Status === 'Success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated Successfully'
                            }).then((result) => {
                                location.reload();
                            });

                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                        }
                    }).catch(function (error) {
                        console.log('Request failed', error);
                    });

            }
        })


    };

</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>