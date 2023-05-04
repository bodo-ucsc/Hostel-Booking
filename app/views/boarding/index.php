<?php
$header = new HTMLHeader("My Boarding");
// if (isset($data['bStatus'])){
//     $bStatus = $data['bStatus'];
//     if($bStatus == 'leaved'){
//         $nav = new Navigation('My Boarding','boarded');
//     }else if($bStatus == 'boarded'){
//         $nav = new Navigation('My Boarding','boarded');
//     }
// }

$nav = new Navigation('My Boarding','boarded');
$base = BASEURL;
$uname = $_SESSION['username'];

$basePage = BASEURL . '/boarding';



?>
<main class=" full-width ">
    <?php

    echo "<div id='sidebar-open'
        class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar small left bg-white'>

        <div class='row padding-bottom-2 padding-top-2 padding-horizontal-4 '>
            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Currently Boarded</span>
            </div>
        </div>";


    if (isset($data['result'])) {

        $info['res'] = $data['result'];
        $rows = array();
        $postId = $data['postId'];

        while ($row = $data['result']->fetch_assoc()) {

            $price = $row['Price'];
            $price = number_format($price);
            $rows[] = $row;


            if ($row['BoarderStatus'] == 'boarded') {
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];

                $profilepic = $row['ProfilePicture'];

                if ($row['UserType'] == 'Student') {
                    $borderType = $row['StudentUniversity'];
                    //$rows['StudentUniversity'] = $row['StudentUniversity'];
    
                } else if ($row['UserType'] == 'Professional') {
                    $borderType = $row['UserType'];
                }

                echo "<div class='row no-gap vertical-align-middle'>
            <div class=' padding-2'>";

                if (isset($profilepic)) {
                    echo "
                <img class='dp border-1 border-blue border-circle' src='$base/$profilepic' alt='user'>";
                } else {
                    echo "
                    <img class='dp border-1 border-blue border-circle'
                    src='https://ui-avatars.com/api/?background=288684&amp;color=fff&amp;name=$FirstName+$LastName' alt='user'>";
                }
                echo "
                
            </div>
            <div class='col-11 fill-container left margin-left-2'>
                <div class='row no-gap padding-horizontal-3'>
                    
                <div class=' col-7  fill-container'>
                    <div class='col-12 bold'>$FirstName $LastName</div>
                    <div class='col-12'>$borderType</div>
                </div>
                    <div class='col-2 fill-container'></div>
                    <div class='col-3 fill-container border-rounded-more  padding-1 margin-left-5 vertical-align-middle'>
                    <i data-feather='phone-call' class='grey right'></i>
                            
                    </div>
    
                    
                </div>
                </div>
          </div> ";
            }
        }

        echo "<br>";
        echo "<div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
            <div class='col-12 fill-container  padding-horizontal-3 '>
            <span class=' fill-container margin-left-0 header-2'>Boarding Requests</span>
            </div>
            </div>";

        foreach ($rows as $row) {

            if ($row['BoarderStatus'] == 'pending') {
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];

                $profilepic = $row['ProfilePicture'];
                if ($row['UserType'] == 'Student') {
                    $borderType = $row['StudentUniversity'];
                } else if ($row['UserType'] == 'Professional') {
                    $borderType = $row['UserType'];
                }


                echo "<div class=' margin-left-2 row no-gap vertical-align-middle'>
                    <div class=' padding-2'>";

                if (isset($profilepic)) {
                    echo "
                <img class='dp border-circle border-1 border-blue' src='$base/$profilepic' alt='user'>";
                } else {
                    echo "
                    <img class='dp border-circle border-1 border-blue'
                    src='https://ui-avatars.com/api/?background=288684&amp;color=fff&amp;name=$FirstName+$LastName' alt='user'>";
                }
                echo "
                    </div>
                    <div class='col-11 fill-container left margin-left-2'>
                        <div class=' row padding-horizontal-3 no-gap'>
                            
                            <div class=' col-7 fill-container'>
                                <div class='col-12 bold'>$FirstName $LastName</div>
                                <div class='col-12'>$borderType</div>
                            </div>
                            <div class='col-2 fill-container'></div>
                            <div class=' col-3  fill-container
                             border-rounded-more  padding-1 margin-left-5'>
                            <i data-feather='phone-call' class='grey right'></i>
                                    
                            </div>
             
                        </div>
                        </div>
                    </div> ";
            }
        }

        echo "<br>";
        echo "<div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
        <div class='col-12 fill-container  padding-horizontal-3 '>
            <span class=' fill-container margin-left-0 header-2'>Invite Friends</span>
        </div>
        </div>";
    }
    //    <button data-modal-target='#modal' id='PopUpbutton' onclick='openPopup'
    
    echo "<div class='container margin-top-5'>
    <button id='PopUpbutton' onclick='openPopup()'
        class='padding-4 border-rounded bg-white-hover border-blue border-1 blue-hover'> Professional</button>
    </div>";

    echo "</div>";
    ?>

    <div class="row sidebar-offset navbar-offset">
        <div class="col-12 col-small-12 width-90">

            <!-- <div class="col-12  fill-container">
                <h1 class="header-1 ">
                    Dashboard
                </h1>
            </div> -->



            <div class="row margin-top-3 fill-container">
                <div class="shadow-small padding-3 border-rounded-more  fill-container col-9  display-medium-block">
                    <span class=' fill-container margin-left-0 header-2'>Payments Due</span>
                    <div class="row margin-top-2 fill-container">
                        <div class='col-4 fill-container padding-3 '>
                            <div class="shadow-small border-rounded-more accent padding-4 bg-white-hover ">
                                <div class='header-2'>Rent Payable</div>
                                <div class='header-1 fill-container'>
                                    <?php echo "Rs. " . $price ?>
                                </div>
                            </div>
                        </div>

                        <div class='col-4 fill-container padding-3 '>
                            <div class="shadow border-rounded-more bg-white-hover blue padding-4">
                                <div class='header-2'>Water Bill</div>
                                <div class='header-1'>Rs. 1,000</div>
                            </div>
                        </div>
                        <div class='col-4 fill-container padding-3  '>
                            <div class="shadow border-rounded-more red padding-4 bg-white-hover">
                                <div class='header-2'>Electicity Bill</div>
                                <div class='header-1'>Rs. 8,000</div>
                            </div>
                        </div>

                    </div>


                </div>
                <div
                    class=" row  white fill-vertical  margin-left-5  shadow border-rounded-more fill-container col-3 bg-blue-hover ">
                    <div class="col-12">
                        <div class='header-2'>Key Money</div>
                        <div class='header-1'>Rs.33,000</div>
                    </div>

                </div>
            </div>

            <div class="row margin-top-3 fill-container">
                <div class="shadow-small padding-3 border-rounded-more  fill-container col-9  display-medium-block">
                    <span class=' fill-container margin-left-0 header-2'>Reminders</span>
                    <div class="row margin-top-2 fill-container">
                        <div class='col-4 fill-container padding-3 margin-2'>
                            <div class="shadow-small border-rounded-more accent padding-4 bg-accent">
                                <div class='header-2 white'>Rent Due</div>
                                <div class='header-1 white'>21st Nov</div>
                            </div>
                        </div>

                        <div class='col-4 fill-container padding-3 margin-2'>
                            <div class="shadow border-rounded-more bg-grey white padding-4">
                                <div class='header-2'>Bills Due</div>
                                <div class='header-1'>Rs.5000</div>
                            </div>
                        </div>
                        <div class='col-4 fill-container padding-3 margin-2 '>
                            <div class="shadow border-rounded-more white padding-4 bg-red">
                                <div class='header-2'>Trash Collection</div>
                                <div class='header-1'>All Trash</div>
                            </div>
                        </div>

                    </div>


                </div>

                <div
                    class="  black fill-vertical  margin-left-5  shadow border-rounded-more fill-container col-3 bg-white ">
                    <div class="row padding-2  ">
                        <div class="col-12">
                            <div class='header-2 fill-container padding-vertical-3'>Bed Allocation</div>
                            <div class='row shadow fill-container'>
                                <div class="col-2 fill-container padding-left-4">
                                    <i data-feather="battery"></i>
                                </div>
                                <div class="col-3 fill-container">Bed 1</div>
                                <div class="col-7 left fill-container">Stuart Pitt</div>
                            </div>
                            <div class='row shadow'>
                                <div class="col-2 fill-container padding-left-4">
                                    <i data-feather="battery"></i>
                                </div>
                                <div class="col-3 fill-container">Bed 2</div>
                                <div class="col-7 left fill-container">Kate Guiness</div>
                            </div>
                            <div class='row shadow'>
                                <div class="col-2 fill-container padding-left-4">
                                    <i data-feather="battery"></i>
                                </div>
                                <div class="col-3 fill-container">Bed 3</div>
                                <div class="col-7 left fill-container">Katsun Pieris</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class=" fill-container right ">

                <?php
                //echo $data['postId'];
                $result = restAPI("feed/postRest/$postId");
                if ($data['postId'] != null) {
                    foreach ($result as $key => $value) {
                        new ViewCard($value);
                    }
                } else {
                    echo "<h1 class='text-center'>No Post Found</h1>";
                }

                echo "
        <script>

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
  
        </script>
        ";




                ?>
            </div>







        </div>
        <div class=" col-12 bg-white flex margin-bottom-5 position-fixed ">

            <div id='popUpWindow' class=" display-none shadow-small border-rounded padding-5">
                <div class='col-3'>

                    <img src="<?php echo BASEURL . '/public/images/group.svg' ?>">
                </div>

                <h1 class="header-1">Thank you for Boarding with BODO!</h2>
                    <h2 class="header-nb">We hope you enjoyed your stay!</h2>
                    <h2 class="header-2">Please consider rating and providing a review about your boarding
                        experience!
                    </h2>

                    <form action="<?php echo BASEURL ?>/tenent/leave" method="post">
                        <input type="hidden" name="username" value="<?php echo $uname ?>">
                        <label class="bold black">How was your experience?</label><br><br>
                        <input type="text" id="userReview" name="userReview" placeholder="Describe your experience"><br>
                        <div class="row">
                            <div class="col-2 fill-container">

                                <button id="cancel" type="button"
                                    class="padding-4 border-rounded bg-white-hover border-black border-1 black-hover fill-container">Cancel</button>
                            </div>
                            <div class="col-5 fill-container">
                                <button id="leaveWithoutReview" name="leaveWithoutReview"
                                    class="padding-4 border-rounded bg-white-hover border-red border-1 red-hover fill-container">Leave
                                    without review</button>
                            </div>
                            <div class="col-5 fill-container">
                                <button id="leaveWithReview" name="leaveWithReview" type="submit"
                                    class="padding-4 border-rounded bg-white-hover border-red border-1 red-hover fill-container">Submit
                                    Review & Leave</button>
                            </div>

                        </div>
                    </form>
            </div>
            <!-- </div> -->
        </div>

        <!-- </div> -->

        <!-- <div class="position-fixed" id="overlay"> -->


        <div id="overlay"></div>





</main>

<script>

    let displayed = false;
    function openPopup() {

        let window = document.getElementById('popUpWindow');
        if (displayed) {
            window.style.display = 'none';
            window.classList.add('display-none');
            window.classList.remove('display-block');
            displayed = false;
        } else {
            window.classList.add('display-block');
            window.classList.remove('display-none');
            window.style.display = 'block';
            displayed = true;

        }
    }

    
    $('#cancel').click(function (e) {
        e.preventDefault();
        // hide the popup window or do any other desired action
    });

    // function press() {
    //     const closeModalButtons = document.querySelectorAll('[data-close-button]')
    //     closeModalButtons.forEach(button => {
    //         button.addEventListener('click', () => {
    //             const modal = button.closest('.modal')
    //             closeModal(modal)
    //         })
    //     })
    // }
    // const openModalButtons = document.querySelectorAll('[data-modal-target]')
    // const closeModalButtons = document.querySelectorAll('[data-close-button]')
    // const overlay = document.getElementById('overlay')

    // openModalButtons.forEach(button => {
    //     button.addEventListener('click', () => {
    //         const modal = document.querySelector(button.dataset.modalTarget)
    //         openModal(modal)
    //     })
    // })

    // overlay.addEventListener('click', () => {
    //     const modals = document.querySelectorAll('.modal.active')
    //     modals.forEach(modal => {
    //         closeModal(modal)
    //     })
    // })

    // closeModalButtons.forEach(button => {
    //     button.addEventListener('click', () => {
    //         const modal = button.closest('.modal')
    //         closeModal(modal)
    //     })
    // })

    // function openModal(modal) {
    //     if (modal == null) return
    //     modal.classList.add('active')
    //     overlay.classList.add('active')
    // }

    // function closeModal(modal) {
    //     if (modal == null) return
    //     modal.classList.remove('active')
    //     overlay.classList.remove('active')
    // }

</script>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>