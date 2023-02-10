<?php
$header = new HTMLHeader("Property");
$nav = new Navigation("management");
$sidebar = new SidebarNavBO($active="properties");
$base = BASEURL;
$_boardingOwner = new property;

?>

<main class=" navbar-offset sidebar-offset padding-bottom-3">

<?php
$placeid = $data['placeid'];


$boardingPlace = $_boardingOwner->viewBoardingPlace($placeid);

if (isset($boardingPlace)) {
    $result = $boardingPlace->fetch_assoc();
    $boardingPlaceName = $result['CityName'];
    $boardingRent = $result['Price'];
}

$boardingRentCount = $_boardingOwner->rentCount($placeid);
$countRow = $boardingRentCount->fetch_assoc();

$count = $countRow['numrows'];

$total = (int)$count * $boardingRent;
?>

<input type="hidden" id="placeidinput"  value="<?php echo $placeid; ?>">

    <div class="row margin-left-5">
        <div class="col-8 col-large-8 col-small-12 header-1 fill-container margin-left-5">
            <?php
            if (isset($boardingPlaceName)) {
                echo $boardingPlaceName;
            }
            ?>
        </div>
        <div class="col-4 col-large-4 col-small-6 fill-container flex">
            <div>
                <button class=" bg-white-hover black-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4 border-1 border-black"><i data-feather="edit"></i><?php echo "<a class=' black' href =$base/property/editDeleteBoarding/$placeid>&nbsp;Edit Listing</a>";?></button>
            </div>
            <div>
                <button class=" bg-accent-hover white-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4"><i data-feather="eye"></i><?php echo "<a class=' white white-hover' href =$base/property/boardingView/$placeid>&nbsp;View Listing</a>";?></button>
            </div>
        </div>     
    </div>

    <div class="row margin-left-5 margin-top-5">
        <div class="col-4 fill-container margin-3">
            <div class=" shadow bg-white border-rounded padding-5">
                <div class=" header-nb accent">Total Rent Income</div>
                <div class=" header-1 accent">Rs.<?php echo $total; ?></div>
            </div>
        </div>
        <div class="col-4 fill-container margin-3">
            <div class=" shadow bg-white border-rounded padding-5">
                <div class=" header-nb blue">Rent Amount</div>
                <div class=" header-1 blue">Rs.<?php echo $boardingRent; ?></div>
            </div>
        </div>
        <div class="col-3 fill-container margin-3">
            <div class=" shadow bg-accent border-rounded padding-5">
                <div class=" header-nb padding-4 white center">View Report</div>
            </div>
        </div>
    </div>

    <div class="row margin-top-4">
        <div class="col-5 header-2 left-flex fill-container margin-left-5 padding-left-5">Currently Boarded</div>
    </div>
    
    <div id='currentlyBoarded' class="row margin-left-5 margin-top-2 ">
    <?php
    $boarders = restAPI("property/currentlyBoarded/$placeid");
    
    if(!is_null($boarders)){
        foreach($boarders as $res) {

            $boarderId =  $res->TenantId;
            $boarderUser = $_boardingOwner->getBoarderDetails($boarderId);
            $boarderUserArr = $boarderUser->fetch_assoc();
            $fname = $boarderUserArr['FirstName'];
            $lname = $boarderUserArr['LastName'];

            echo "
            <div class='col-5 fill-container margin-top-1 margin-right-3 margin-left-3'>
                <div class=' shadow bg-white border-rounded padding-2'>
                    <div class='row'>
                        <div class='col-3'>
                        <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' >
                        </div>
                        <div class='col-9 left fill-container'>
                        <div class=' big left grey'>$fname $lname</div>
                        </div>
                    </div>
                </div>
            </div>
            ";
    
        }
    } else {
        
        echo "
        <div class=' row'>
            <div class='col-12 fill-container'>
                <div class=' grey'>No Boarders to Display</div>
            </div>
        </div>
        ";
    }
    ?>
    </div>

    <div class="row margin-top-4">
        <div class="col-5 header-2 left-flex fill-container margin-left-5 padding-left-5">Boarding Requests</div>
    </div>

    <div id='boardingRequests' class="row margin-left-5 margin-top-2 ">

    <?php
    $requsts = restAPI("property/boardingRequests/$placeid");

    if(!empty($requsts)){
        foreach($requsts as $res){
            $boarderUser = $_boardingOwner->getBoarderDetails($res->TenantId);
            $boarderUserArr = $boarderUser->fetch_assoc();
            $fname = $boarderUserArr['FirstName'];
            $lname = $boarderUserArr['LastName'];

            echo "
            <div class='col-5 fill-container margin-3'>
                <div class=' shadow bg-white border-rounded padding-2'>
                    <div class='row'>
                        <div class='col-3'>
                        <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' >
                        </div>
                        <div class='col-7 left fill-container'>
                        <div class=' big left grey'>$fname $lname</div>
                        </div>
                        <div class='col-1' onclick='addUser($res->TenantId,$placeid)'>
                            
                            <div class=' accent-hover cursor-pointer '>
                            <i data-feather='user-check'></i>
                            </div>
                           
                        </div>
                        <div class='col-1 margin-right-2' onclick='deleteUser($res->TenantId,$placeid)'>
                                <div class=' red-hover cursor-pointer black-hover'>
                                <i data-feather='user-x'></i>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
        echo "
        <div class=' row'>
            <div class='col-12 fill-container'>
                <div class=' grey'>No Requests to Display</div>
            </div>
        </div>
    ";
    }
    ?>
    </div>

    <div class="row margin-top-4">
        <div class="col-5 header-2 left-flex fill-container margin-left-5 padding-left-5">Send Reminders</div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row margin-top-4">
                <div class="col-12 header-nb left-flex fill-container margin-left-5 padding-left-5 margin-bottom-3">Send Trash Collection Reminders</div>
            </div>
            <div class="row ">
                <div class="col-4 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 big">
                        <div class="row">
                            <div class="col-8 grey">
                                Food Trash
                            </div>
                            <div class="col-4 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 big">
                        <div class="row">
                            <div class="col-8 grey">
                                Plastic Trash
                            </div>
                            <div class="col-4 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-4 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 big">
                        <div class="row">
                            <div class="col-8 grey">
                                Both Trash
                            </div>
                            <div class="col-4 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row margin-top-4">
                <div class="col-12 header-nb left-flex fill-container margin-left-5 padding-left-5">Send Utility Bill Reminders</div>
            </div>
            <div class="row margin-top-3">
                <div class="col-6 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 big">
                        <div class="row">
                            <div class="col-9 grey">
                                Electricity Bill
                            </div>
                            <div class="col-3 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 big">
                        <div class="row">
                            <div class="col-9 grey">
                                Water Bill
                            </div>
                            <div class="col-3 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    <div class="row">
        <div class="col-12 header-nb left-flex fill-container margin-left-5 padding-left-5 margin-top-5">Send Rent Reminder</div>
    </div>
     <div id='paymentReminders' class="row margin-left-5 margin-top-2 ">
    <?php
    if(!is_null($boarders)){
        foreach($boarders as $res) {

            $boarderId =  $res->TenantId;
            $boarderUser = $_boardingOwner->getBoarderDetails($boarderId);
            $boarderUserArr = $boarderUser->fetch_assoc();
            $fname = $boarderUserArr['FirstName'];
            $lname = $boarderUserArr['LastName'];

            echo "
            <div class='col-5 fill-container margin-top-1 margin-horizontal-4'>
                <div class=' shadow bg-white border-rounded padding-2'>
                    <div class='row'>
                        <div class='col-3'>
                        <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' >
                        </div>
                        <div class='col-7 left fill-container'>
                        <div class=' big left grey'>$fname $lname</div>
                        </div>
                        <div class='col-2 grey'>
                                <i data-feather='send'></i>
                            </div>
                    </div>
                </div>
            </div>
            ";
    
        }
    } else {
        
        echo "
        <div class=' row'>
            <div class='col-12 fill-container'>
                <div class=' grey'>No Boarders to Display</div>
            </div>
        </div>
        ";
    }
    ?>
    </div>
    <div class="row margin-top-4">
        <div class="col-12 header-2 left-flex fill-container margin-left-5 padding-left-5">Rent Payments</div>
    </div>

    <div class="row margin-top-4">
        <div class="col-12 header-2 left-flex fill-container margin-left-5 padding-left-5">Reviews & Ratings</div>
    </div>

    <div class=" row shadow bg-white border-rounded padding-4 margin-left-5 margin-right-5 margin-top-3">
        <div class="col-12 fill-container">
            <div class="row margin-left-3">
                <div class="col-2 grey fill-container">Name</div>
                <div class="col-1 grey fill-container">Stars</div>
                <div class="col-5 grey fill-container">Messege</div>
                <div class="col-4 grey fill-container">Actions</div>
            </div>
        </div>
        <?php
        $comments = restAPI("property/viewReviewsByPlaceId/$placeid");

        if(!empty($comments)){
            foreach($comments as $res){
                echo "
                <div class='col-12 fill-container'>
                    <div class='row margin-left-3'>
                        <div class='col-2 fill-container'>$res->FirstName $res->LastName</div>
                        <div class='col-1  fill-container'>$res->Rating</div>
                        <div class='col-5  fill-container'>$res->Review</div>
                        <div class='col-2  fill-container center'>
                            <div class=' border-blue border-1 border-rounded padding-2 blue-hover '>
                            View
                            </div>
                        </div>
                        <div class='col-2  fill-container center'>
                            <div class=' bg-accent border-rounded padding-2  white-hover'>
                            Reply
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }else{
            echo "
            <div class=' row'>
                <div class='col-12 fill-container'>
                    <div class=' grey'>No Comments to Display</div>
                </div>
            </div>                
            ";
        }
        ?>
    </div>
</main>


<script>

    function addUser(userid,placeid){
        var url = "<?php echo BASEURL ?>/property/addBoardingMember/".concat(userid).concat("/").concat(placeid);        
        console.log(url);
        fetch(url)
            .then((response) => response.json())
            .then((json) => {

                console.log(JSON.stringify(json));

                const boardersArr = json[0];
                const requestsArr = json[1];

                console.log(JSON.stringify(boardersArr));
                console.log(JSON.stringify(requestsArr));

                var boardersArea = document.getElementById("currentlyBoarded");
                var remindersArea = document.getElementById("paymentReminders");
                boardersArea.innerHTML = "";
                remindersArea.innerHTML = "";
                for (var i = 0; i < boardersArr.length; i++) {
                    var fname = [boardersArr[i].FirstName].toString();
                    var lname = [boardersArr[i].LastName].toString();
                    
                    boardersArea.innerHTML += `
                    <div class='col-5 fill-container margin-top-1 margin-right-3 margin-left-3'>
                        <div class=' shadow bg-white border-rounded padding-2'>
                            <div class='row'>
                                <div class='col-3'>
                                <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=`+fname+lname+`' >
                                </div>
                                <div class='col-9 left fill-container'>
                                <div class=' big left grey'>`+fname+` `+lname+`</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                    remindersArea.innerHTML += `
                    <div class='col-5 fill-container margin-top-1 margin-right-3 margin-left-3'>
                        <div class=' shadow bg-white border-rounded padding-2'>
                            <div class='row'>
                                <div class='col-3'>
                                <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=`+fname+lname+`' >
                                </div>
                                <div class='col-7 left fill-container'>
                                <div class=' big left grey'>`+fname+` `+lname+`</div>
                                </div>
                                <div class='col-2 grey'>
                                    <svg class='feather feather-send' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                        <line x1='22' y1='2' x2='11' y2='13'></line>
                                        <polygon points='22 2 15 22 11 13 2 9 22 2'></polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                }

                if(JSON.stringify(boardersArr) == '[]'){
                    boardersArea.innerHTML += `
                    <div class=' row'>
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Boarders to Display</div>
                        </div>
                    </div>
                    `;
                }

                var placeId = document.getElementById("placeidinput").value;
                var requestArea = document.getElementById("boardingRequests");
                requestArea.innerHTML = "";
                for (var i = 0; i < requestsArr.length; i++) {
                    var tenantid = [requestsArr[i].TenantId].toString();
                    var fname = [requestsArr[i].FirstName].toString();
                    var lname = [requestsArr[i].LastName].toString();
                    
                    requestArea.innerHTML += `
                    <div class='col-5 fill-container margin-3'>
                        <div class=' shadow bg-white border-rounded padding-2'>
                            <div class='row'>
                                <div class='col-3'>
                                <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=`+fname+lname+`' >
                                </div>
                                <div class='col-7 left fill-container'>
                                <div class=' big left grey'>`+fname+` `+lname+`</div>
                                </div>
                                <div class='col-1' onclick='addUser(`+tenantid+`,`+placeId+`)'>
                                    
                                    <div class=' accent-hover cursor-pointer '>
                                        <svg class='feather feather-user-check' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                            <path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path>
                                            <circle cx='8.5' cy='7' r='4'></circle>
                                            <polyline points='17 11 19 13 23 9'></polyline>
                                        </svg>
                                    </div>
                                
                                </div>
                                <div class='col-1 margin-right-2' onclick='deleteUser(`+tenantid+`,`+placeId+`)'>
                                        <div class=' red-hover cursor-pointer black-hover'>
                                            <svg class='feather feather-user-x' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                                <path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path>
                                                <circle cx='8.5' cy='7' r='4'></circle>
                                                <line x1='18' y1='8' x2='23' y2='13'></line>
                                                <line x1='23' y1='8' x2='18' y2='13'></line>
                                            </svg>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                }    

                if(JSON.stringify(requestsArr) == '[]'){
                    requestArea.innerHTML += `
                    <div class=' row'>
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Requests to Display</div>
                        </div>
                    </div>
                    `;
                }

            });
            
    }

    function deleteUser(userid,placeid){

        var url = "<?php echo BASEURL ?>/property/deleteBoardingRequest/".concat(userid).concat("/").concat(placeid);        
        console.log(url);

        fetch(url)
            .then((response) => response.json())
            .then((json) => {


                console.log(JSON.stringify(json));

                const boardersArr = json[0];
                const requestsArr = json[1];

                console.log(JSON.stringify(boardersArr));
                console.log(JSON.stringify(requestsArr));

                var boardersArea = document.getElementById("currentlyBoarded");
                boardersArea.innerHTML = "";
                for (var i = 0; i < boardersArr.length; i++) {
                    var fname = [boardersArr[i].FirstName].toString();
                    var lname = [boardersArr[i].LastName].toString();
                    
                    boardersArea.innerHTML += `
                    <div class='col-5 fill-container margin-top-1 margin-right-3 margin-left-3'>
                        <div class=' shadow bg-white border-rounded padding-2'>
                            <div class='row'>
                                <div class='col-3'>
                                <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=`+fname+lname+`' >
                                </div>
                                <div class='col-9 left fill-container'>
                                <div class=' big left grey'>`+fname+` `+lname+`</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                }

                if(JSON.stringify(boardersArr) == '[]'){
                    boardersArea.innerHTML += `
                    <div class=' row'>
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Boarders to Display</div>
                        </div>
                    </div>
                    `;
                }

                var placeId = document.getElementById("placeidinput").value;
                var requestArea = document.getElementById("boardingRequests");
                requestArea.innerHTML = "";
                for (var i = 0; i < requestsArr.length; i++) {
                    var tenantid = [requestsArr[i].TenantId].toString();
                    var fname = [requestsArr[i].FirstName].toString();
                    var lname = [requestsArr[i].LastName].toString();
                    
                    requestArea.innerHTML += `
                    <div class='col-5 fill-container margin-3'>
                        <div class=' shadow bg-white border-rounded padding-2'>
                            <div class='row'>
                                <div class='col-3'>
                                <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=`+fname+lname+`' >
                                </div>
                                <div class='col-7 left fill-container'>
                                <div class=' big left grey'>`+fname+` `+lname+`</div>
                                </div>
                                <div class='col-1' onclick='addUser(`+tenantid+`,`+placeId+`)'>
                                    
                                    <div class=' accent-hover cursor-pointer '>
                                        <svg class='feather feather-user-check' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                            <path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path>
                                            <circle cx='8.5' cy='7' r='4'></circle>
                                            <polyline points='17 11 19 13 23 9'></polyline>
                                        </svg>
                                    </div>
                                
                                </div>
                                <div class='col-1 margin-right-2' onclick='deleteUser(`+tenantid+`,`+placeId+`)'>
                                        <div class=' red-hover cursor-pointer black-hover'>
                                            <svg class='feather feather-user-x' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                                <path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path>
                                                <circle cx='8.5' cy='7' r='4'></circle>
                                                <line x1='18' y1='8' x2='23' y2='13'></line>
                                                <line x1='23' y1='8' x2='18' y2='13'></line>
                                            </svg>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                }    

                if(JSON.stringify(requestsArr) == '[]'){
                    requestArea.innerHTML += `
                    <div class=' row'>
                        <div class='col-12 fill-container'>
                            <div class=' grey'>No Requests to Display</div>
                        </div>
                    </div>
                    `;
                }

            });

            
    } 

</script>

<?php
$footer = new HTMLFooter();
?>

<!-- <a href='$base/property/addBoardingMember/$res->TenantId/$placeid'> </a> -->
<!-- <a href='$base/property/deleteBoardingRequest/$res->TenantId/$placeid'> -->

<!-- <svg class='feather feather-send' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
    <line x1='22' y1='2' x2='11' y2='13'></line>
    <polygon points='22 2 15 22 11 13 2 9 22 2'></polygon>
</svg> -->