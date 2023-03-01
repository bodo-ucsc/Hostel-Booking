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
            <div class="row no-gap">

                <div class="col-10 col-small-8 fill-container left"
                    onclick='location.href="<?php echo BASEURL . "/property/place/" . $ownerId ?>"'>
                    <h1 class="header-1 black-hover cursor-pointer">

                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <?php

                        if (isset($data['place'])) {
                            echo "<span class=' vertical-align-middle'>";
                            echo $data['place']->CityName;
                            echo "</span><span class='big middle'> - No. $title</span>";
                        }
                        ?>
                    </h1>
                </div>
                <div class="col-2 col-small-4 fill-container right">
                    <button
                        class=" border-1 border-accent accent-hover bg-white-hover border-rounded big padding-3 right"
                        onclick="location.href='<?php echo BASEURL ?>/listing/viewPlace/<?php echo $placeid ?>' ">
                        <i data-feather="eye" class=" vertical-align-middle "></i>
                        <span class="display-small-inline-block padding-left-2 display-none">View Property</span>
                    </button>
                </div>
            </div>




            <div class="row margin-top-5 fill-container">
                <div class="col-7 header-2 fill-container left">
                    <span class='padding-left-3'>Currently Boarded</span>
                </div>

                <div class="col-5 right  fill-container ">
                    <div class="red-hover cursor-pointer border-rounded right"
                        onclick="location.href='<?php echo BASEURL ?>/admin/addSupport/<?php echo $type ?>' ">
                        <i data-feather="user-x" class=" vertical-align-middle "></i>
                        <span class="display-small-inline-block padding-left-2 display-none">Delete Tenant</span>
                    </div>
                </div>

            </div>
            <div id='currentlyBoarded' class="row margin-3 ">
                <?php
                $boarders = restAPI("property/boardingMembersRest/$placeid/boarded");
                if (isset($boarders)) {
                    foreach ($boarders as $res => $value) {
                        $userId = $value->Id;
                        $fname = $value->FirstName;
                        $lname = $value->LastName;
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
                                        <div class='col-11 left fill-container'>
                                            <div class='  grey'>$fname $lname</div>
                                            <div class=' small grey'>$Tagline</div>
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
                    <span class='padding-left-3'>Boarding Requests</span>
                </div>
            </div>
            <div id='boardingRequest' class="row margin-3 ">
                <?php
                $boarders = restAPI("property/boardingMembersRest/$placeid/requested"); 
                if (isset($boarders)) {
                    foreach ($boarders as $res => $value) {
                        $userId = $value->Id;
                        $fname = $value->FirstName;
                        $lname = $value->LastName;
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
                                        <div class='col-11 left fill-container'>
                                            <div class='  grey'>$fname $lname</div>
                                            <div class=' small grey'>$Tagline</div>
                                        </div>
                                    </div>

                            </div>
                            ";

                    }
                } else {

                    echo " 
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Requests to Display</div>
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
                            el.textContent = opt;
                            el.value = data[i].Id;
                            el.selected = true;
                            select1.appendChild(el);
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
                    for (var j = 1; j <= <?= $count ?>; j++){

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
        var url = '<?php echo BASEURL . "/property/changeBed/$placeid/" ?>' + userId + "/" + bed;
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



</script>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>