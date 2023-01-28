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
    
    <div class="row margin-left-5 margin-top-2 ">
    <?php
    $boarders = $_boardingOwner->currentlyBoarded($placeid);
    
    if(!is_null($boarders->fetch_assoc())){
        while ($boardersArr = $boarders->fetch_assoc()) {

            $boarderId =  $boardersArr['TenantId'];
            $boarderUser = $_boardingOwner->getBoarderDetails($boarderId);
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
                        <div class='col-9 left fill-container'>
                        <div class=' header-nb left grey'>$fname $lname</div>
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

    <div class="row margin-left-5 margin-top-2 ">

    <?php
    $requsts = restAPI("property/boardingRequests/$placeid");

    if(!is_null($requsts)){
        foreach($requsts as $res){
            $boarderUser = $_boardingOwner->getBoarderDetails($res->UserId);
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
                        <div class=' header-nb left grey'>$fname $lname</div>
                        </div>
                        <div class='col-1'>
                            <div class=' accent-hover cursor-pointer '>
                            <i data-feather='user-check'></i>
                            </div>
                        </div>
                        <div class='col-1 margin-right-2'>
                            <div class=' red-hover cursor-pointer black-hover'>
                            <i data-feather='user-x'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
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
                    <div class=" shadow bg-white border-rounded padding-2 header-nb">
                        <div class="row">
                            <div class="col-9 grey">
                                Food Trash
                            </div>
                            <div class="col-3 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 header-nb">
                        <div class="row">
                            <div class="col-9 grey">
                                Plastic Trash
                            </div>
                            <div class="col-3 grey">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-4 margin-left-5 padding-left-5 fill-container">
                    <div class=" shadow bg-white border-rounded padding-2 header-nb">
                        <div class="row">
                            <div class="col-9 grey">
                                Both Trash
                            </div>
                            <div class="col-3 grey">
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
                    <div class=" shadow bg-white border-rounded padding-2 header-nb">
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
                    <div class=" shadow bg-white border-rounded padding-2 header-nb">
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
     <div class="row margin-left-5 margin-top-2 ">
    <?php
    $boarders = $_boardingOwner->currentlyBoarded($placeid);
    
    if(!is_null($boarders->fetch_assoc())){
        while ($boardersArr = $boarders->fetch_assoc()) {

            $boarderId =  $boardersArr['TenantId'];
            $boarderUser = $_boardingOwner->getBoarderDetails($boarderId);
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
                        <div class=' header-nb left grey'>$fname $lname</div>
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
</main>

<?php
$footer = new HTMLFooter();
?>