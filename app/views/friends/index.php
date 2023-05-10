<?php
$header = new HTMLHeader("Friends");
$nav = new Navigation("friends");
$base = BASEURL;

$FirstName = 'Sam';
$LastName = 'Smith';
$StudentUniversity = 'University of Moratuwa';
$borderType = 'Student';



?>


<main class=" full-width">

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
        class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar  left bg-white padding-horizontal-3'>
        <div class='display-block display-medium-none padding-vertical-1 '>
            <button onclick='toggleNav("sidebar-collapse","sidebar-open")'
                class='  left fill-container border-rounded-more padding-horizontal-3'>
                <i data-feather='menu' class='grey-hover vertical-align-middle'></i>
                <span class='grey-hover header-nb vertical-align-middle '>Menu</span>
            </button>
        </div>



        <div class='row padding-3 '>
            <div class="col-12 fill-container">
                <?php new SearchUser('Friend'); ?>
            </div>
        </div>

        <div class='row padding-horizontal-3 padding-vertical-4 bg-accent border-rounded-more margin-top-2'>

            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2 white'>Friend Requests</span>
            </div>

            <?php
            $friendPending = restAPI('friends/getFriends/' . $_SESSION['UserId'] . '/pending');
            $req = 0;
            if (isset($friendPending)) {
                foreach ($friendPending as $res => $value) {
                    if ($value->type == 'main') {
                        $req += 1;
                        $userId = $value->UserId;
                        $fname = $value->FirstName;
                        $lname = $value->LastName;
                        $city = $value->CityName;
                        $place = $value->PlaceId;
                        // $phone = $value->ContactNumber;
                        $profilePicture = $value->ProfilePicture;
                        if ($profilePicture == null) {
                            $profilePicture = "https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname";
                        } else {
                            $profilePicture = BASEURL . "/$profilePicture";
                        }
                        $Tagline = $value->Tagline;

                        echo "
                            <div class='col-12    fill-container '>
                                <div class='  bg-white black border-rounded padding-2  row no-gap vertical-align-middle'>
                                    <div class='padding-right-3'>
                                        <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                                    </div>
                                    <div class='col-8 left fill-container'>
                                        <div class=' bold '>$fname $lname</div>
                                        <div class=' text-overflow small grey'>$Tagline</div>";
                        if ($city != null) {
                            echo "<div onclick='location.href=\"$base/listing/viewPlace/$place\"' class=' text-overflow cursor-pointer small blue border-1 padding-1 border-rounded-more center'>Boarded at $city</div>";
                        } else {
                            echo "<div  class=' cursor-default  small grey border-1 padding-1 border-rounded-more center'>Not Boarded yet</div>";
                        }
                        echo "
                                    </div>
                                    <div class='col-3 right fill-container' >
                                        <div class='margin-horizontal-2 display-inline-block center' >
                                            <div class='margin-right-1 display-inline-block center' onclick='update(\"Friend\",\"MainFriendId\",\"$userId\",\"status\",\"friend\")'
                                            '><i data-feather='user-plus' class=' feather-small accent vertical-align-middle cursor-pointer'></i> </div>
                                            <div class='margin-left-1 display-inline-block right' onclick='update(\"Friend\",\"MainFriendId\",\"$userId\",\"status\",\"reject\")'><i data-feather='user-x' class=' feather-small red vertical-align-middle cursor-pointer'></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            ";
                    }
                }
            }
            if ($req == 0) {
                echo "<span class='left fill-container  col-12 white'>No Friend Requests</span>";
            }
            ?>

        </div>

        <div class='row padding-3'>


            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>My Friends</span>
            </div>
            <?php
            $friendAccept = restAPI('friends/getFriends/' . $_SESSION['UserId'] . '/friend');
            $req = 0;
            if (isset($friendAccept)) {
                foreach ($friendAccept as $res => $value) {

                    $req += 1;
                    $userId = $value->UserId;
                    $fname = $value->FirstName;
                    $lname = $value->LastName;
                    $phone = $value->ContactNumber;
                    $city = $value->CityName;
                    $place = $value->PlaceId;
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
                                        <div class=' text-overflow small grey'>$Tagline</div>";
                    if ($city != null) {
                        echo "<div onclick='location.href=\"$base/listing/viewPlace/$place\"' class=' text-overflow cursor-pointer small blue border-1 padding-1 border-rounded-more center'>Boarded at $city</div>";
                    } else {
                        echo "<div  class=' cursor-default small grey border-1 padding-1 border-rounded-more center'>Not Boarded yet</div>";
                    }
                    echo "
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
            if ($req == 0) {
                echo "<span class='left fill-container  col-12'>No Friends yet</span>";
            }
            ?>

        </div>
        <div class='row padding-3'>


            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Requests I Sent</span>
            </div>

            <?php
            $req = 0;
            if (isset($friendPending)) {
                foreach ($friendPending as $res => $value) {
                    if ($value->type == 'friend') {
                        $req += 1;
                        $userId = $value->UserId;
                        $fname = $value->FirstName;
                        $lname = $value->LastName;
                        $city = $value->CityName;
                        $place = $value->PlaceId;
                        // $phone = $value->ContactNumber;
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
                                        <div class=' text-overflow small grey'>$Tagline</div>";
                        if ($city != null) {
                            echo "<div onclick='location.href=\"$base/listing/viewPlace/$place\"' class=' text-overflow cursor-pointer small blue border-1 padding-1 border-rounded-more center'>Boarded at $city</div>";
                        } else {
                            echo "<div  class=' cursor-default small grey border-1 padding-1 border-rounded-more center'>Not Boarded yet</div>";
                        }
                        echo "
                                    </div>
                                    <div class='col-3 right fill-container' >
                                        <div class='margin-horizontal-2 display-inline-block center' >
                                            <div class=' display-inline-block right' onclick=' deleteUpdate(\"Friend\",\"MainFriendId\",\"" . $_SESSION['UserId'] . "\",\"FriendId\",\"$userId\")'
                                            '><i data-feather='x' class=' feather-small red vertical-align-middle cursor-pointer'></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            ";
                    }
                }
            }
            if ($req == 0) {
                echo "<span class='left fill-container  col-12 '>No Friend Requests Sent</span>";
            }
            ?>
        </div>
    </div>




    <div class="row sidebar-offset navbar-offset padding-right-3">
        <div class="col-small-2"></div>
        <div class="col-small-8 col-12 fill-container">
            <div class='row border-rounded-more searchbar fill-container'>
                <div class=' col-2 col-medium-1  '>
                    <i data-feather='search'></i>
                </div>

                <div class='col-medium-8 col-10 fill-container'>
                    <input id='searchUser' class=' header-nb border-none fill-container' type='text'
                        onkeyup='searchUser()' placeholder='Search for a Friend... '>
                </div>
            </div>
        </div>

        <div class="col-12 width-90">
            <div class="row ">
                <span class='col-8 fill-container  margin-left-0 header-2'>You may know</span>
                <div class="col-4 fill-container right">
                    <button id="slideLeft" type="button" class='bg-transparent blue padding-0'>
                        <i data-feather="chevron-left"></i>
                    </button>
                    <button id="slideRight" type="button" class='bg-transparent blue padding-0'>
                        <i data-feather="chevron-right"></i>
                    </button>
                </div>
            </div>

            <div id="suggestedFriends" class="table hs border-rounded-more padding-2 margin-top-3 snap-scroll">
                <?php
                $friendReccommend = restAPI('friends/friendRecommendation/' . $_SESSION['UserId']);
                if (isset($friendReccommend)) {
                    foreach ($friendReccommend as $res => $value) {

                        $req += 1;
                        $userId = $value->UserId;
                        $fname = $value->FirstName;
                        $lname = $value->LastName;
                        $count = $value->NumberOfFriends;
                        if ($count == 1) {
                            $count = '1 Friend';
                        } else {
                            $count = $count . ' Friends';
                        }

                        $Tagline = $value->Tagline;

                        $city = $value->CityName;
                        $place = $value->PlaceId;
                        // $phone = $value->ContactNumber;
                        $profilePicture = $value->ProfilePicture;
                        if ($profilePicture == null) {
                            $profilePicture = "https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname";
                        } else {
                            $profilePicture = BASEURL . "/$profilePicture";
                        }
                        $Tagline = $value->Tagline;
                        echo "
                    <div class='  col-6 shadow fill-container border-rounded-more overflow-hidden'>
                        <img class='fill-container  ' src='https://picsum.photos/200/100.jpg?random=$userId' alt=''>
                        <div class=' center fill-container margin-top-n4 '>
                            <img class='width-100px border-circle shadow' src='$profilePicture' alt=''>
                        </div>

                        <div class='col-12 center fill-container padding-bottom-4'>
                            <div class=' padding-vertical-2'>
                                <span class='big bold'>$fname $lname</span>
                                <br />
                                <span class=''>$Tagline</span>
                                <br />
                                <br />
                                ";
                        echo "
                            </div>
                            <button class='bg-white-hover border-1 border-rounded-more' onclick='sendRequest(\"$userId\")' >Send Friend Request</button>
                            <br/>
                            <span class='small'>$count</span>
                        </div>
                    </div>
                    ";

                    }
                }
                ?>

            </div>




        </div>
        <div class="col-12 width-90 ">
            <span class=' display-block  margin-left-0 header-2 fill-container'>Boarding Invites</span>
            <?php
            $boardingInvite = restAPI('friends/invitedFriends/0/' . $_SESSION['UserId']. '/pending');
            //get name and profile picture from friendAccept and merge to boardingInvite
            if (isset($boardingInvite)) {
                $c = 0;
                foreach ($boardingInvite as $res => $value) {
                    foreach ($friendAccept as $resu => $value2) {
                        if ($value->Tenant == $value2->UserId) {
                            $fname = $value2->FirstName;
                            $lname = $value2->LastName;
                            $profilePicture = $value2->ProfilePicture;
                            break;
                        }
                    }


                    $c += 1;
                    // [{"Tenant":77,"FriendId":80,"PlaceId":1,"Status":"pending","DateTime":"2023-05-09 06:49:00"}]
                    $tenant = $value->Tenant;
                    $friendId = $value->FriendId;

                    $placeId = $value->PlaceId;
                    $status = $value->Status;
                    $dateTime = $value->DateTime;

                    echo "
                    <div class='advert shadow bg-white border-rounded-more padding-3 display-inline-block '> 
                        <div class='row no-gap vertical-align-middle'>
                            <div class=' padding-2'>";
                    if ($ProfilePicture == null) {
                        echo "<img src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
                    } else {
                        echo "<img src='$base/$ProfilePicture' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
                    }
                    echo " 
                            </div>
                            <div class='col-11 fill-container left margin-left-2'>
                                <div class='row no-gap'>
                                    <div class='col-9 fill-container left '>
                                        <div class='display-inline-block big vertical-align-middle'>
                                            $fname $lname
                                        </div> 
                                    </div>
                                    <div class='col-3 fill-container right vertical-align-middle'>
                                        <div class=' cursor-pointer display-inline-block accent padding-right-1' onclick='acceptrejectInvite($tenant,$friendId,$placeId, \"accept\" )'>
                                        <i data-feather='check'></i>
                                        </div>
                                        <div class=' cursor-pointer display-inline-block red padding-left-1' onclick='acceptrejectInvite($tenant,$friendId,$placeId, \"reject\")'>
                                        <i data-feather='x'></i>
                                        </div>
                                    </div>
                                    <div class='col-12 fill-container left'>";
                    $timestamp = strtotime($dateTime);
                    echo date("M d, Y h.i A", $timestamp);
                    echo "
                                    </div>
                                </div>
                            </div>
                        </div> 
        
                        ";

                    new PropertyCard($placeId, "yes");
                    echo " </div>";


                }
            }
            if ($c == 0){
                echo "<div class=' padding-vertical-4 border-box'>No Invites</div>";
            }
            ?>

        </div>
    </div>


    
</main>


<script>
    const buttonRight = document.getElementById('slideRight');
    const buttonLeft = document.getElementById('slideLeft');

    buttonRight.onclick = function () {
        document.getElementById('suggestedFriends').scrollLeft += 350;
    };
    buttonLeft.onclick = function () {
        document.getElementById('suggestedFriends').scrollLeft -= 350;
    };

    function update(table, id, idvalue, k, value) {
        const data = {
            Table: table,
            Id: id,
            IdValue: idvalue,
            Key: k,
            Value: value,
        };
        updater(data);
    };

    function acceptrejectInvite(tenant, friendId, placeId, status) {
        const data = {
            Table: 'FriendInvite',
            Id: 'Tenant',
            IdValue: tenant,
            Id2: 'FriendId',
            IdValue2: friendId,
            Id3: 'PlaceId',
            IdValue3: placeId,
            Key: 'Status',
            Value: status,
        }; 
        updater(data);
        if (status == 'accept') {
            requestBoarding(friendId); 
        } 
    };

    function requestBoarding(id) {
        let url = "<?= $base ?>/property/joinBoarding/<?= $placeId ?>/" + id;
        fetch(url).then((response) => response.json()).then((json) => {
            console.log(json);
            if (json.Status === 'Success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Join Request Sent',
                    text: 'You will be notified when your request is accepted'
                }).then((result) => {
                    location.reload();
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }

        });
    }

    function updater(data) {
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
                        title: 'Update Successful'
                    }).then((result) => {
                        location.reload();
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

    function deleteUpdate(table, id, value, id2, value2) {
        const data = {
            Table: table,
            Id1: id,
            IdValue1: value,
            Id2: id2,
            IdValue2: value2
        };


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

    };

    function sendRequest(id) {
        const data = {
            sender: <?= $_SESSION['UserId'] ?>,
            receiver: id
        };
        console.log(data);
        fetch("<?= BASEURL ?>/friends/sendFriendRequest/", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(response => response.json())
            .then(json => {
                if (json.status === 'Success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Request Sent Successfully'
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
            })
    }

</script>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>