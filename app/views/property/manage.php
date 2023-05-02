<?php

$header = new HTMLHeader("Property");
$nav = new Navigation('management');
$sidebar = new SidebarNav("properties");

if (isset($data['place'])) {
    $title = $data['place']->HouseNo . ", " . $data['place']->Street;
    $placeid = $data['place']->PlaceId;
    $ownerId = $data['place']->OwnerId;
}


?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row  ">

                <div class="col-6  fill-container left"
                    onclick='location.href="<?= BASEURL . "/property/place/" . $ownerId ?>"'>
                    <h1 class="header-1 black-hover cursor-pointer">

                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <?php

                        if (isset($data['place'])) {
                            echo "<span class=' vertical-align-middle'>";
                            echo $data['place']->CityName;
                            echo "</span><span class='big middle display-block display-medium-inline-block'> - No. $title</span>";
                        }
                        ?>
                    </h1>
                </div>
                <div class="col-2   fill-container">
                    <button onclick="location.href='<?= BASEURL ?>/property/edit/<?= $placeid ?>'"
                        class=" fill-container border-1 border-accent accent-hover bg-white-hover border-rounded big  ">
                        <i data-feather="edit" class=" vertical-align-middle "></i>
                        <span
                            class="display-large-inline-block display-small-block padding-left-2 display-none">Edit</span>
                    </button>
                </div>
                <?php
                $boarded = restAPI("property/boardingMembersRest/$placeid/boarded");
                if (isset($boarded) && count($boarded) > 0) {
                    $delaction = 'disabled';
                    $delstyle = 'bg-white border-grey grey ';
                } else {
                    $delaction = "onclick='deletePlace()'";
                    $delstyle = 'red-hover bg-white border-red';
                }
                ?>
                <div class="col-2  fill-container">
                    <button class=" fill-container border-1  <?= $delstyle ?> border-rounded big  " <?= $delaction ?>>
                        <i data-feather="trash" class=" vertical-align-middle "></i>
                        <span
                            class="display-large-inline-block display-small-block padding-left-2 display-none">Delete</span>
                    </button>
                </div>
                <div class="col-2  fill-container">
                    <button class=" fill-container border-1 bg-blue-hover white border-rounded big  "
                        onclick="location.href='<?= BASEURL ?>/listing/viewPlace/<?= $placeid ?>' ">
                        <i data-feather="eye" class=" vertical-align-middle "></i>
                        <span
                            class="display-large-inline-block display-small-block padding-left-2 display-none">View</span>
                    </button>
                </div>
            </div>







            <div class="row margin-top-3 fill-container shadow border-rounded padding-3 bg-accent white">
                <div class="col-12 header-2 fill-container left">
                    <span class='padding-left-3'>Boarding Requests</span>
                </div>
                <div class="col-12 fill-container">

                    <div id='boardingRequest' class="row margin-3 left">
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
                                <div class='col-12  col-medium-7 col-large-5 fill-container '>
                                    <div class=' shadow bg-white black border-rounded-more padding-2 row no-gap vertical-align-middle'>
                                        <div class='padding-horizontal-3'>
                                            <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                                        </div>
                                        <div class='col-6 left fill-container'>
                                            <div class='  grey'>$fname $lname</div>
                                            <div class=' small grey'>$Tagline</div>
                                        </div>
                                        <div class='col-5 right fill-container' >
                                            <div class='margin-right-3 display-inline-block left' onclick='location.href=\"tel:$phone\"'><i data-feather='phone-call' class=' vertical-align-middle cursor-pointer'></i></div>
                                            <div class='margin-horizontal-2 display-inline-block center' >
                                                <div class='margin-right-1 display-inline-block center' onclick='boarderStatus(\"$userId\",\"boarded\")'><i data-feather='user-plus' class='accent vertical-align-middle cursor-pointer'></i> </div>
                                                <div class='margin-left-1 display-inline-block right' onclick='boarderStatus(\"$userId\",\"rejected\")'><i data-feather='user-x' class='red vertical-align-middle cursor-pointer'></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                ";

                            }
                        } else {

                            echo " 
                            <div class='col-12 fill-container '>
                                <div class=' white'>No Requests to Display</div>
                            </div> 
                        ";
                        }
                        ?>
                    </div>
                </div>
            </div>



            <div class="row margin-top-5 fill-container vertical-align-middle ">
                <div class="col-10 col-medium-9   vertical-align-middle  header-2 fill-container left">
                    <span class='padding-left-3'>Currently Boarded</span>
                </div>

                <div class="col-1 col-medium-2    vertical-align-middle right  fill-container ">
                    <div class="red-hover cursor-pointer border-rounded center" onclick="sendVacate()">
                        <i data-feather="log-out" class="padding-horizontal-2 vertical-align-middle "></i>
                        <span class=" display-medium-block  display-none">Send Vacate </span>
                        <span class=" display-medium-block  display-none"> Notice</span>
                    </div>
                </div>
                <div class="col-1 col-medium-1  vertical-align-middle  right  fill-container ">
                    <div class="red-hover cursor-pointer border-rounded center" onclick="deleteTenant()">
                        <i data-feather="user-x" class="padding-horizontal-2 vertical-align-middle "></i>
                        <span class=" display-medium-block  display-none">Remove </span>
                        <span class=" display-medium-block  display-none"> Tenant</span>
                    </div>
                </div>
                <div class="margin-2 display-block display-medium-none"></div>

            </div>
            <div id='currentlyBoarded' class="row margin-3  ">
                <?php

                if (isset($boarded)) {
                    foreach ($boarded as $res => $value) {
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
                            <div class='col-12 col-small-6 col-large-4 fill-container '>
                                <div class=' shadow bg-white border-rounded-more padding-2 row no-gap vertical-align-middle'>
                                        <div class='padding-horizontal-3'>
                                            <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                                        </div>
                                        <div class='col-9 left fill-container'>
                                            <div class='  grey'>$fname $lname</div>
                                            <div class=' small grey'>$Tagline</div>
                                        </div>
                                        <div class='col-2 center fill-container' onclick='location.href=\"tel:$phone\"'>
                                            <i data-feather='phone-call' class=' vertical-align-middle cursor-pointer'></i>
                                        </div>
                                    </div>

                            </div>
                            ";

                    }
                } else {

                    echo " 
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Boarders to Display</div>
                        </div> 
                    ";
                }
                ?>
            </div>


            <div class="row margin-top-5 fill-container">
                <div class="col-12 header-2 fill-container left">
                    <span class='padding-left-3'>Bed Management</span>
                </div>
            </div>
            <div id='bedManagement' class="row margin-3 ">
                <?php
                $count = restAPI("property/bedCountRest/$placeid")->Count;
                for ($i = 1; $i <= $count; $i++) {
                    echo "
                    <div class='col-12 col-small-6 col-large-4 fill-container '>
                        <div class=' shadow bg-white border-rounded-more padding-2 row no-gap vertical-align-middle'>
                                <div class='padding-horizontal-3'>
                                        <i data-feather='battery' class='vertical-align-middle'></i>
                                </div>
                                <div class='fill-container padding-horizontal-3 '> Bed $i</div>
                                <div class='col-10  fill-container'>
                                    <select class='margin-0' id='bed$i' onchange='changeBed($i)'>
                                        <option value='-' >Select Boarder</option> 
                                    </select> 
                                </div>
                        </div>
                    </div>";
                }
                ?>
            </div>





        </div>
    </div>
</main>

<script>
    window.onload = function () {
        fetchBed();
    };

    function fetchBed() {
        var url = '<?= BASEURL . "/property/bedRest/$placeid" ?>';
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data === null) {
                    return;
                }
                else {

                    for (var i = 0; i < data.length; i++) {
                        var select1 = document.getElementById("bed" + data[i].Bed);
                        select1.innerHTML = "";
                        var opt = "Select Boarder";
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = "-";
                        select1.appendChild(el);
                        if (data[i].Id != null) {
                            opt = data[i].Name;
                            el = document.createElement("option");
                            select1.classList.add("white", "bg-black");
                            el.textContent = opt;
                            el.value = data[i].Id;
                            el.selected = true;
                            select1.appendChild(el);
                        }
                        else {
                            select1.classList.remove("white", "bg-black");
                        }
                    };
                }
                fetchNoBed();
            });
    };

    function fetchNoBed() {
        var url = '<?= BASEURL . "/property/noBedRest/$placeid" ?>';
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data === null) {
                    return;
                }
                else {
                    for (var j = 1; j <= <?= $count ?>; j++) {

                        var select2 = document.getElementById("bed" + j);

                        for (var i = 0; i < data.length; i++) {
                            var opt = data[i].Name;
                            var el = document.createElement("option");
                            el.textContent = opt;
                            el.value = data[i].Id;
                            select2.appendChild(el);
                        };
                    };
                };
            });
    };

    function changeBed(bed) {
        var select = document.getElementById("bed" + bed);
        var userId = select.value;
        if (userId == "-") {
            userId = 'remove';
        }
        var url = '<?= BASEURL . "/property/changeBed/$placeid/" ?>' + userId + "/" + bed;
        fetch(url)
            .then(response => response.json())
            .then(data => {

                Swal.fire({
                    icon: data['Status'] == 'Success' ? 'success' : 'error',
                    title: data['Status']
                }).then((result) => {
                    fetchBed();
                });

            });
    }

    function sendVacate() {

        Swal.fire({
            title: 'Send Vacate Notice',
            html:
                '<select id="tenant-vacate" class="" required>' +
                '<option value="">Select Tenant</option>' +
                <?php
                foreach ($boarded as $key => $value) {
                    echo "'<option value=\" " . $value->UserId . "\">" . $value->FirstName . " " . $value->LastName . "</option>'+";
                }
                ?>
            '</select>',
            showCancelButton: true,
            cancelButtonColor: '#788292',
        }).then((result) => {
            if (result.isConfirmed && document.getElementById('tenant-vacate').value != "") {

                //timestamp current 
                var timestamp = new Date().toISOString().slice(0, 10) + " " + new Date().toLocaleTimeString('si-LK');
                console.log(timestamp);


                const data = {
                    Table: 'BoardingPlaceTenant',
                    Id: 'TenantId',
                    IdValue: document.getElementById('tenant-vacate').value,
                    Key: 'LeaveNotice',
                    Value: timestamp
                };

                fetch("<?= BASEURL ?>/edit/", {
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
                                title: 'Leave Notice Sent',
                                text: 'Leave Notice Sent to Tenant'
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

    function deleteTenant() {

        Swal.fire({
            title: 'Delete Tenant',
            html:
                '<span>A minimum of 7 days notice is required to delete a tenant.</span><br/>' +
                '<select id="tenant-delete" class="" required>' +
                '<option value="">Select Tenant</option>' +
                <?php
                foreach ($boarded as $key => $value) {
                    if (isset($value->LeaveNotice)) {
                        $date1 = new DateTime($value->LeaveNotice);
                        $date2 = new DateTime(date("Y-m-d H:i:s"));
                        $diff = $date1->diff($date2);
                        // $days = $diff->s; //seconds
                        $days = $diff->days; //days
                        if ($days >= 7) {
                            echo "'<option value=\" " . $value->UserId . "\">" . $value->FirstName . " " . $value->LastName . "</option>'+";
                        }
                    }
                }
                ?>
                '</select>'+
                '<br/><span class="red">*This action cannot be undone..</span>',
            showCancelButton: true,
            cancelButtonColor: '#788292',
        }).then((result) => {
            if (result.isConfirmed && document.getElementById('tenant-delete').value != "") {
                let deleteVal = document.getElementById('tenant-delete').value;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#788292',
                    confirmButtonColor: '#C83A3A',
                    confirmButtonText: 'Yes, delete it!'



                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = {
                            Table: 'BoardingPlaceTenant',
                            Id: 'TenantId',
                            IdValue: deleteVal,
                            Key: 'BoarderStatus',
                            Value: 'left'
                        };

                        fetch("<?= BASEURL ?>/edit/", {
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
            }
        })
    };

    function boarderStatus(id, Status) {


        const data = {
            Table: 'BoardingPlaceTenant',
            Id: 'TenantId',
            IdValue: id,
            Id2: 'Place',
            IdValue2: '<?= $placeid ?>',
            Key: 'BoarderStatus',
            Value: Status,
        };

        fetch("<?= BASEURL ?>/edit/", {
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

</script>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>