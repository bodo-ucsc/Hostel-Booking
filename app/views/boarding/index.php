<?php
new HTMLHeader("My Boarding");
new Navigation("boarding");

$base = BASEURL;
$uname = $_SESSION['username'];
$UserId = $_SESSION['UserId'];
$placeid = $_SESSION['Place'];

$basePage = BASEURL . '/boarding';
?>
<main class=" full-width ">
    <div id='sidebar-collapse'
        class='display-block display-medium-none navbar-offset shadow border-rounded-more full-height position-fixed sidebar  collapse  left bg-white'>

        <div class=' padding-vertical-1 '>
            <button onclick='toggleNav("sidebar-open","sidebar-collapse")'
                class='  center fill-container  padding-horizontal-3'>
                <i data-feather='menu' class='grey-hover'></i>
            </button>
        </div>
    </div>

    <div id='sidebar-open'
        class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar  left bg-white  '>
        <div class='display-block display-medium-none padding-vertical-1 '>
            <button onclick='toggleNav("sidebar-collapse","sidebar-open")'
                class='  left fill-container border-rounded-more padding-horizontal-3'>
                <i data-feather='menu' class='grey-hover vertical-align-middle'></i>
                <span class='grey-hover header-nb vertical-align-middle '>Menu</span>
            </button>
        </div>


        <div class='row padding-bottom-2 padding-top-2 padding-horizontal-4  '>
            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Currently Boarded</span>
            </div>
            <?php
            $boarded = restAPI("property/boardingMembersRest/$placeid/boarded");
            $count = 0;

            if (isset($boarded)) {
                foreach ($boarded as $res => $value) {
                    if ($value->UserId == $UserId) {
                        continue;
                    }
                    $count++;
                    $userId = $value->UserId;
                    $fname = $value->FirstName;
                    $lname = $value->LastName;
                    $phone = $value->ContactNumber;
                    $profilePicture = $value->ProfilePicture;
                    if ($profilePicture == null) {
                        $profilePicture = "https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname";
                    } else {
                        $profilePicture = BASEURL . "/$profilePicture";
                    }
                    $Tagline = $value->Tagline;

                    echo "
                    <div class='col-12    fill-container '>
                        <div class='  bg-white black border-rounded-more  row no-gap vertical-align-middle'>
                            <div class='padding-right-3'>
                                <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                            </div>
                            <div class='col-8 left fill-container'>
                                <div class=' bold '>$fname $lname</div>
                                <div class=' text-overflow small grey'>$Tagline</div>
                            </div>
                            <div class='col-3 right fill-container' >
                                <div class='margin-horizontal-2 display-inline-block center' >
                                    <div class='  display-inline-block left' onclick='location.href=\"tel:$phone\"'><i data-feather='phone-call' class='feather-small vertical-align-middle cursor-pointer'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                            ";

                }
            }
            if ($count == 0) {

                echo " 
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Boarders to Display</div>
                        </div> 
                    ";
            }
            ?>

            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Boarding Requests</span>
            </div>
            <?php
            $requested = restAPI("property/boardingMembersRest/$placeid/requested");
            if (isset($requested)) {
                foreach ($requested as $res => $value) {
                    $userId = $value->UserId;
                    $fname = $value->FirstName;
                    $lname = $value->LastName;
                    $phone = $value->ContactNumber;
                    $profilePicture = $value->ProfilePicture;
                    if ($profilePicture == null) {
                        $profilePicture = "https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname";
                    } else {
                        $profilePicture = BASEURL . "/$profilePicture";
                    }
                    $Tagline = $value->Tagline;

                    echo "
                    <div class='col-12    fill-container '>
                        <div class='  bg-white black border-rounded-more  row no-gap vertical-align-middle'>
                            <div class='padding-right-3'>
                                <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                            </div>
                            <div class='col-8 left fill-container'>
                                <div class=' bold '>$fname $lname</div>
                                <div class=' text-overflow small grey'>$Tagline</div>
                            </div>
                            <div class='col-3 right fill-container' >
                                <div class='margin-horizontal-2 display-inline-block center' >
                                    <div class='  display-inline-block left' onclick='location.href=\"tel:$phone\"'><i data-feather='phone-call' class='feather-small vertical-align-middle cursor-pointer'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                                ";

                }
            } else {

                echo " 
                            <div class='col-12 fill-container '>
                                <div class=' '>No Requests to Display</div>
                            </div> 
                        ";
            }
            ?>

            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Invite Friends</span>
            </div>
            <?php

            $result = restAPI('friends/getFriends/' . $_SESSION['UserId'] . '/friend');
            $invitedFriends = restAPI("friends/invitedFriends/$UserId");
            // check invited friends array and if not empty, remove from result array
            if (isset($invitedFriends)) {
                foreach ($invitedFriends as $res => $value) {
                    $friendId = $value->FriendId;
                    $status = $value->Status;
                    $place = $value->PlaceId;
                    foreach ($result as $res => $value) {
                        if ($value->UserId == $friendId && $place == $placeid) {
                            if ($status == 'rejected'  || $status == 'accept') {
                                unset($result[$res]);
                                continue;
                            }
                            else if ($status == 'pending') { 
                                $pendingArray[] = $friendId;
                                continue;
                            }
                        }

                    }
                }
            }
            $req = 0;
            if (isset($result)) {
                foreach ($result as $res => $value) {
                    if (isset($value->PlaceId) && $value->PlaceId != null) {
                        continue;
                    }
                    $req += 1;
                    
                    if (isset($pendingArray) && in_array($value->UserId, $pendingArray)) {
                        $action = 'deleteInvite("' . $value->UserId . '")';
                        $actionIcon = 'x';
                    } else {
                        $action = 'inviteFriend("' . $value->UserId . '")';
                        $actionIcon = 'send';
                    }

                    $userId = $value->UserId;
                    $fname = $value->FirstName;
                    $lname = $value->LastName;
                    $phone = $value->ContactNumber;
                    $profilePicture = $value->ProfilePicture;
                    if ($profilePicture == null) {
                        $profilePicture = "https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname";
                    } else {
                        $profilePicture = BASEURL . "/$profilePicture";
                    }
                    $Tagline = $value->Tagline;

                    echo "
                            <div class='col-12    fill-container '>
                                <div class='  bg-white black border-rounded-more  row no-gap vertical-align-middle'>
                                    <div class='padding-right-3'>
                                        <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                                    </div>
                                    <div class='col-8 left fill-container'>
                                        <div class=' bold '>$fname $lname</div>
                                        <div class=' text-overflow small grey'>$Tagline</div>
                                    </div>
                                    <div class='col-3 right fill-container' >
                                        <div class='margin-horizontal-2 display-inline-block center' >
                                            <div class='  display-inline-block left' onclick='$action'><i data-feather='$actionIcon' class='feather-small vertical-align-middle cursor-pointer'></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";

                }
            }
            if ($req == 0) {
                echo "<span class='left fill-container  col-12'>No Friends to invite</span>";
            }
            ?>
        </div>
        <div class=" bg-white-hover cursor-pointer   zindex max-width-300 red header-nb bottom-0 position-fixed"
            onclick='leaveBoarding()'>
            <div class=" center  padding-vertical-4">

                <i data-feather="minus-square" class=" vertical-align-middle"></i>
                <span class="vertical-align-middle">Leave Boarding</span>
            </div>
        </div>
    </div>

    <?php
    $payables = restAPI("boarding/payables/$placeid");
    ?>

    <div class=" sidebar-offset navbar-offset ">
        <div class="row less-gap">
            <div class="padding-3 border-rounded-more  fill-container col-6 col-small-8 border-box">
                <span class=' fill-container margin-left-0 header-2'>Payables</span>
                <div class="row margin-top-2 ">
                    <div class='col-12 col-small-4 fill-container padding-3 '>
                        <div class="shadow-small border-rounded-more accent padding-4 bg-white-hover ">
                            <div class='big'>Rent</div>
                            <div class='header-2 fill-container'>
                                Rs.
                                <?= number_format($payables[0]->Rent) ?>
                            </div>
                        </div>
                    </div>

                    <div class='col-12 col-small-4 fill-container padding-3 '>
                        <div class="shadow border-rounded-more bg-white-hover blue padding-4">
                            <div class='big'>Water Bill</div>
                            <div class='header-2 fill-container'>
                                Rs.
                                <?= number_format($payables[0]->WaterBill) ?>

                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-small-4 fill-container padding-3  '>
                        <div class="shadow border-rounded-more red padding-4 bg-white-hover">
                            <div class='big'>Electicity </div>
                            <div class='header-2 fill-container'>
                                Rs.
                                <?= number_format($payables[0]->ElectricityBill) ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class=" white fill-vertical fill-container col-6 col-small-4 padding-4 border-box ">
                <div class="  fill-vertical shadow border-rounded-more bg-blue-hover   fill-container center flex ">
                    <div class="">
                        <span class='big'>Key Money</span><br />
                        <span class='header-2'>
                            Rs.
                            <?= number_format($payables[0]->KeyMoney) ?>
                        </span><br />
                        <span class="">
                            <?php
                            if ($payables[0]->KeyMoneyType == 'total') {
                                echo "Paid as a whole";
                            } else {
                                echo
                                    "Paid per boarder";
                            }
                            ?>
                        </span><br />
                        <span class="small">
                            Paid for
                            <?= $payables[0]->KeyMoneyDuration ?>
                        </span>
                    </div>

                </div>

            </div>
        </div>

        <div class="row margin-top-3">
            <div class=" fill-vertical  padding-4   fill-container col-12 col-medium-7 border-box ">
                <div
                    class="bg-accent-hover border-rounded-more white shadow padding-vertical-2 padding-horizontal-3 fill-vertical">
                    <div class="padding-top-4 padding-horizontal-4">
                        <span class=' fill-container  header-2'>Reminders</span>
                        <div class="row  fill-container">
                            <div class='col-6 fill-container padding-3 margin-2'>
                                <div class="shadow-small border-rounded-more accent padding-4 bg-white">
                                    <div class='big '>Rent Due</div>
                                    <div class='header-2 '>21st Nov</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="  fill-vertical fill-container col-12 col-medium-5 padding-4 border-box ">
                <div
                    class="  fill-vertical shadow border-box border-rounded-more bg-white-hover padding-vertical-2 padding-horizontal-3  fill-container left  ">
                    <div class="padding-top-4 padding-horizontal-4">

                        <span class='header-2'>Bed Allocation</span><br />
                        <?php
                        $bed = restAPI("/property/bedRest/$placeid");
                        foreach ($bed as $key => $value) {
                            if ($value->Id != null) {
                                echo "
                                <div class='  fill-container  padding-vertical-2 vertical-align-middle'> 
                                        <i class='vertical-align-middle' data-feather='battery'></i> 
                                        <span class='vertical-align-middle padding-2 '>Bed " . $value->Bed . "</span><span class=' padding-2 vertical-align-middle text-overflow padding-2 '> " . $value->Name . " </span>
                                </div>
                                ";
                            }
                        }
                        ?>
                    </div>

                </div>

            </div>


            <div class="col-12 col-large-5 fill-container top fill-vertical border-box padding-4 ">


                <label for="caption" class="header-2 black top">Invite via Feed</label><br>
                <div class="searchbar row fill-container border-rounded-more margin-vertical-2">
                    <div class="col-10 fill-container ">
                        <input type="text" class="fill-container" id="caption" name="caption" onkeyup="previewCaption()"
                            placeholder="Enter Caption for post" required><br>
                    </div>
                    <div class="col-2 fill-container right ">
                        <button onclick="postAd()" class="bg-accent-hover white-hover border-rounded-more ">
                            <i data-feather="send" class=" vertical-align-middle"></i>
                        </button>
                    </div>
                </div>

                <?php

                $posted = restAPI("feed/postRest");
                foreach ($posted as $key => $value) {
                    if ($value->UserId == $UserId && $value->PlaceId == $placeid) {
                        $postId = $value->PostId;
                        $caption = $value->Caption;
                        $timestamp = strtotime($value->DateTime);
                        echo "
                <div class='row margin-vertical-3 shadow border-rounded-more bg-white-hover'>
                    <div id='user-post-$postId' class=' padding-4 col-8 fill-container border-box' onclick='updatePrev(\"$postId\")'>
                        <div class='display-inline-block'>
                            <div id='user-post-caption-$postId' data-value='$caption' class=''>$caption</div>
                            <div id='user-post-date-$postId' data-value='" . date("M d, Y h.i A", $timestamp) . "' class='small'>" . date("M d, Y h.i A", $timestamp) . "</div>
                        </div>
                    </div> 


                    <div class=' col-4 fill-container border-box right padding-2'>
                        <span class='accent padding-1 cursor-pointer' onclick='editPost(\"$postId\", \"$caption\")'>
                            <i  data-feather='edit' ></i> 
                        </span>
                        <span class='red padding-1 cursor-pointer' onclick='deletePost(\"$postId\")'>
                            <i data-feather='trash-2' ></i>
                        </span>
                    </div>
                </div>
                            ";
                    }
                }

                ?>

            </div>


            <div class="col-12 col-large-7 top border-box  padding-4">
                <span class="header-2  padding-horizontal-4  display-block">Preview</span>

                <?php
                new ViewCard('preview');
                ?>
            </div>










        </div>
    </div>


</main>




<script>


    function leaveBoarding() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#288684',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, leave!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    html:
                        '<img class="max-width-300" src="<?= $base ?>/images/logo.svg" />' +
                        '<div class="  header-2 border-box">Thank you for boarding with BODO!</div>' +
                        '<div class=" big border-box">We hope you enjoyed your stay at ' + cityName + '!</div>' +
                        '<div class=" padding-4 border-box">Please consider rating and providing a review about your experience!</div>' +
                        '<div class="left padding-top-4">' +
                        '<label class="bold black">Give Ratings</label> ' +
                        '<div class="rating">' +
                        '<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>' +
                        '<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>' +
                        '<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>' +
                        '<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>' +
                        '<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>' +
                        '</div> <br/>' +
                        '<label class=" bold black">How was your experience?</label><br/><br/>' +
                        '<textarea class="fill-container" id="userReview" name="userReview" placeholder="Describe your experience at ' + cityName + ' "></textarea><br/>' +

                        '</div>',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Submit Review & Leave',
                    customClass: 'swal-wide',
                    denyButtonText: `Leave without review`,
                }).then((result) => {
                    let data;
                    if (result.isConfirmed) {
                        //check if rating is given
                        if (document.querySelector('input[name="rating"]:checked') == null) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please give a rating!',
                            })
                            return;
                        }
                        //check if review is given
                        if (document.querySelector('#userReview').value == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please give a review!',
                            })
                            return;
                        }
                        data = {
                            placeid: '<?= $placeid ?>',
                            userid: '<?= $UserId ?>',
                            rating: document.querySelector('input[name="rating"]:checked').value,
                            userReview: document.querySelector('#userReview').value
                        };

                    } else if (result.isDenied) {
                        data = {
                            placeid: '<?= $placeid ?>',
                            userid: '<?= $UserId ?>'
                        };
                    }
                    fetch('<?= $base ?>/boarding/leave', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    }).then(response => response.json())
                        .then(json => {
                            console.log(data);
                            console.log(json);
                            if (json.Status == 'Success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thank you for boarding with BODO!',
                                    text: 'You will be redirected now.',
                                    timer: 3000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    willClose: () => {
                                        window.location.href = '<?= BASEURL ?>/home/signout';
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: json.Status,
                                })
                            }
                        })
                })
            }
        })
    }


    <?php
    if (!isset($_SESSION['profilepic'])) {
        echo "document.getElementById('dp-preview').src = 'https://ui-avatars.com/api/?background=288684&color=fff&name=" . $_SESSION['firstname'] . "+" . $_SESSION['lastname'] . "';";
    } else {
        echo "document.getElementById('dp-preview').src = '$base/" . $_SESSION['profilepic'] . "';";
    }
    ?>

        document.getElementById('user-type-preview').innerHTML = '<?= $_SESSION["role"] ?>';
    document.getElementById('name-preview').innerHTML = '<?= $_SESSION['firstname'] ?> <?= $_SESSION['lastname'] ?> ';

    previewPost();

    function previewCaption() {
        document.getElementById('caption-preview').innerHTML = document.getElementById("caption").value;
        let date = new Date();
        let timestamp = date.toLocaleString('en-US', { month: 'short', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true });
        document.getElementById('date-preview').innerHTML = timestamp;

    }

    let cityName;
    function previewPost() {
        let url = "<?php echo BASEURL ?>/listing/placeRest/<?= $placeid ?>";
        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                cityName = json.CityName;
                document.getElementById('city-preview').innerHTML = cityName;
                document.getElementById('address-preview').innerHTML = json.Street + ", " + json.CityName;
                document.getElementById('price-preview').innerHTML = "Rs. " + json.Price;
                document.getElementById('vacancy-preview').innerHTML = json.NoOfMembers - json.Boarded;
                document.getElementById('priceType-preview').innerHTML = json.PriceType;
                document.getElementById('summary1-preview').innerHTML = json.SummaryLine1;
                document.getElementById('summary2-preview').innerHTML = json.SummaryLine2;
                document.getElementById('summary3-preview').innerHTML = json.SummaryLine3;
                document.getElementById('members-preview').innerHTML = json.NoOfMembers;
                document.getElementById('rooms-preview').innerHTML = json.NoOfRooms;
                document.getElementById('washrooms-preview').innerHTML = json.NoOfWashRooms;
                document.getElementById('squarefeet-preview').innerHTML = json.SquareFeet;
                document.getElementById('parking-preview').innerHTML = json.Parking;
                document.getElementById('boardertype-preview').innerHTML = json.BoarderType;
                if (json.gender === "M") {
                    document.getElementById('gender-preview').innerHTML = 'Male';
                } else {
                    document.getElementById('gender-preview').innerHTML = 'Female';
                }
            });
        let url2 = "<?php echo $base; ?>/listing/imageRest/<?= $placeid ?>";
        fetch(url2)
            .then((response) => response.json())
            .then((json) => {
                //check if json array is empty
                if (json.length != 0) {
                    document.getElementById('image-preview').src = "<?php echo $base; ?>/" + json[0].Image;
                }
                else {
                    document.getElementById('image-preview').src = "<?php echo $base; ?>/images/defboarding.png";
                }
            });

    }

    function updatePrev(id) {
        document.getElementById('caption-preview').innerHTML = document.getElementById('user-post-caption-' + id).getAttribute('data-value');
        document.getElementById('date-preview').innerHTML = document.getElementById('user-post-date-' + id).getAttribute('data-value');

    }

    function postAd() {

        const data = {
            "userId": '<?= $UserId ?>',
            "place": '<?= $placeid ?>',
            "caption": document.getElementById("caption").value
        };

        console.log(data);

        fetch("<?= $base ?>/advertisement/postUpdate", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(response => response.json())
            .then(json => {
                console.log(json);
                if (json.Status === 'Success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Posted Successfully'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
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
    };

    function inviteFriend(id) {

        const data = {
            "sender": '<?= $UserId ?>',
            "place": '<?= $placeid ?>',
            "receiver": id
        };

        console.log(data);

        fetch("<?= $base ?>/friends/inviteFriend", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(response => response.json())
            .then(json => {
                console.log(json);
                if (json.Status === 'Success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Invited Successfully'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
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
    };

    function deleteInvite(id) {
        const data = {
            Table: 'FriendInvite',
            Id1: 'FriendId',
            IdValue1: id,
            Id2: 'PlaceId',
            IdValue2: '<?= $placeid ?>'
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
                '<input type="text" class=" fill-container margin-0 " id="edit-caption" name="firstname" placeholder="Enter First Name" value="' + Caption + '" >',
            showCancelButton: true,
            cancelButtonColor: '#788292',
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    Table: 'PostUpdate',
                    Id: 'PostId',
                    IdValue: id,
                    Key: 'Caption',
                    Value: document.getElementById('edit-caption').value,
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