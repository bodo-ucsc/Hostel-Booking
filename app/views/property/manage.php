<?php

$header = new HTMLHeader("Property");
$nav = new Navigation('management');
$sidebar = new SidebarNav("properties");
$base = BASEURL;

if (isset($data['place'])) {
    $title = $data['place']->HouseNo . ", " . $data['place']->Street;
    $placeid = $data['place']->PlaceId;
    $ownerId = $data['place']->OwnerId;
}

$rentresult = restAPI("property/boardingRent/$placeid");
$receivables = restAPI("boarding/payables/$placeid");

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


            <div class="row ">

                <div class=" accent fill-vertical fill-container col-12 col-small-4 padding-4 border-box ">
                    <div
                        class=" grid fill-vertical shadow border-rounded-more bg-white-hover cursor-default  fill-container padding-4 border-box vertical-align-middle ">
                        <div class="">
                            <span class='big'>Total Earning</span><br />
                            <span class='header-2'>
                                Rs.
                                <?php
                                if ($rentresult != null) {
                                    if ($receivables[0]->RentType == 'per month') {
                                        $countMonth = 1;
                                        $monthR = $rentresult[0]->Month;
                                        foreach ($rentresult as $key => $value) {
                                            if ($value->Month != $monthR) {
                                                $countMonth++;
                                                $monthR = $value->Month;
                                            }
                                        }
                                        echo number_format($receivables[0]->Rent * $countMonth) . " <span class='big'>(EST.)</span>";
                                    } else {
                                        $countPaid = 0;
                                        foreach ($rentresult as $key => $value) {
                                            if ($value->PaymentStatus == 'Paid') {
                                                $countPaid++;
                                            }
                                        }
                                        echo number_format($receivables[0]->Rent * $countPaid) . " <span class='big'>(EST.)</span>";
                                    }
                                } else {
                                    echo "0.00";
                                }
                                ?>
                            </span><br />
                        </div>
                    </div>
                </div>

                <div class=" blue fill-vertical fill-container col-12 col-small-4 padding-4 border-box ">
                    <div
                        class=" grid fill-vertical shadow border-rounded-more bg-white-hover cursor-default  fill-container padding-4 border-box vertical-align-middle ">
                        <div class="">
                            <span class='big'>Monthly Rent</span><br />
                            <span class='header-2'>
                                Rs.
                                <?php
                                echo number_format($receivables[0]->Rent);
                                ?>
                            </span><br />
                        </div>
                    </div>
                </div>

                <div class=" white fill-vertical fill-container col-12 col-small-4 padding-4 border-box ">
                    <div class=" grid fill-vertical shadow border-rounded-more bg-blue-hover cursor-default  fill-container padding-4 border-box vertical-align-middle "
                        onclick="editModal('KeyMoney','<?= $receivables[0]->KeyMoney ?>')">
                        <div class=" fill-container">
                            <div class="float-right">
                                <i data-feather="edit" class="feather-small"></i>
                            </div>
                            <span class='big'>Key Money</span><br />
                            <span class='header-2'>

                                <?php
                                if (isset($receivables[0]->KeyMoney) && $receivables[0]->KeyMoney != null) {
                                    echo "Rs. " . number_format($receivables[0]->KeyMoney);
                                } else {
                                    echo "Add KeyMoney";
                                }
                                ?>
                            </span><br />
                            <span class="">
                                <?php
                                if (isset($receivables[0]->KeyMoneyType) && $receivables[0]->KeyMoneyType != null) {
                                    if ($receivables[0]->KeyMoneyType == 'total') {
                                        echo "Paid as a whole";
                                    } else {
                                        echo
                                            "Paid per boarder";
                                    }
                                }
                                ?>
                            </span><br />
                            <span class="small">
                                <?php
                                if (isset($receivables[0]->KeyMoneyDuration) && $receivables[0]->KeyMoneyDuration != null) {
                                    echo "Paid for " . $receivables[0]->KeyMoneyDuration;
                                }
                                ?>
                            </span>
                        </div>

                    </div>

                </div>
            </div>




            <div class="row margin-top-3 fill-container shadow border-rounded padding-3 border-box bg-accent white">
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
            <?php if (isset($boarded)): ?>
                <div class="margin-1 fill-container"><br /></div>
                <div class="row margin-top-5 margin-bottom-3 fill-container">
                    <div class="col-12 col-medium-5 fill-container left padding-3 border-box">
                        <div class=' padding-bottom-4 header-2 '>Utility Bill Reminder</div>
                        <div class="row">
                            <div class="col-12 col-small-4 col-medium-12 col-large-5 fill-container shadow padding-3 border-box border-rounded cursor-pointer"
                                onclick='sendReminder("Electricity","all")'>
                                <span class="vertical-align-middle">Electricity</span>
                                <i class="vertical-align-middle feather-small float-right" data-feather='send'></i>
                            </div>
                            <div class="col-12 col-small-4 col-medium-12 col-large-5 fill-container shadow padding-3 border-box border-rounded cursor-pointer"
                                onclick='sendReminder("Water","all")'>
                                <span class="vertical-align-middle">Water</span>
                                <i class="vertical-align-middle feather-small float-right" data-feather='send'></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-medium-7 fill-container left padding-3 border-box">
                        <div class=' padding-bottom-4 header-2 '>Trash Reminder</div>
                        <div class="row">
                            <div class="col-12 col-small-4 col-medium-12 col-large-4 fill-container shadow padding-3 border-box border-rounded cursor-pointer"
                                onclick='sendReminder("Food","all")'>
                                <span class="vertical-align-middle">Food Trash</span>
                                <i class="vertical-align-middle feather-small float-right" data-feather='send'></i>
                            </div>
                            <div class="col-12 col-small-4 col-medium-12 col-large-4 fill-container shadow padding-3 border-box border-rounded cursor-pointer"
                                onclick='sendReminder("Plastic","all")'>
                                <span class="vertical-align-middle">Plastic Trash</span>
                                <i class="vertical-align-middle feather-small float-right" data-feather='send'></i>
                            </div>
                            <div class="col-12 col-small-4 col-medium-12 col-large-4 fill-container shadow padding-3 border-box border-rounded cursor-pointer"
                                onclick='sendReminder("Both","all")'>
                                <span class="vertical-align-middle">Both Trash</span>
                                <i class="vertical-align-middle feather-small float-right" data-feather='send'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row margin-top-5 margin-bottom-3 fill-container">
                    <div class="col-12 fill-container left padding-3 border-box">
                        <div class=' padding-vertical-4 header-2 '>Send Rent Reminder</div>
                        <div class='row less-gap'>
                            <?php

                            if (isset($boarded)) {
                                foreach ($boarded as $res => $value) {
                                    $userId = $value->UserId;
                                    $fname = $value->FirstName;
                                    $lname = $value->LastName;
                                    $profilePicture = $value->ProfilePicture;
                                    if ($profilePicture == null) {
                                        $profilePicture = "https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname";
                                    } else {
                                        $profilePicture = BASEURL . "/$profilePicture";
                                    }

                                    echo "
                                <div class='col-12 col-small-4 col-large-3 fill-container '>
                                    <div class=' shadow bg-white border-rounded-more padding-2 row no-gap vertical-align-middle'>
                                        <div class='padding-horizontal-3'>
                                            <img class='vertical-align-middle dp border-1 border-accent border-circle' src='$profilePicture' >
                                        </div>
                                        <div class='col-9 left fill-container'>
                                            <div class='  grey'>$fname $lname</div> 
                                        </div>
                                        <div class='col-2 center fill-container' onclick='sendReminder(\"Rent\",\"$userId\")'>
                                            <i data-feather='send' class=' feather-small vertical-align-middle cursor-pointer'></i>
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
                    </div>
                </div>
            <?php endif; ?>

            <div class="margin-1 fill-container"><br /></div>
            <div class="row margin-top-5 margin-bottom-3 fill-container">
                <div class="col-6 col-small-7 col-large-8 header-2 fill-container left padding-bottom-3">
                    <span class='padding-left-3'>Rent Payments</span>
                </div>
                <?php
                if ($rentresult != null) {
                    echo "
                <div class='col-2 fill-container right big padding-bottom-3'>Month</div>
                <div class='col-4 col-small-3 col-large-2  right fill-container '>
                    <select class=' border-rounded-more' id='rentMonth' onchange='filterMonth()'>";
                    $month = $rentresult[0]->Month;
                    echo "<option value='$month' selected>$month</option>";
                    foreach ($rentresult as $res => $value) {
                        if ($month != $value->Month) {
                            $month = $value->Month;
                            echo "<option value='$month'>$month</option>";
                        }
                    }
                    echo "
                    </select>
                </div> ";
                }
                ?>
            </div>

            <div class="row fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div
                            class="col-8 table fill-container border-rounded-more padding-top-4 padding-bottom-5   bg-white ">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-4  text-overflow bold">Name</div>
                                <div class="col-3  text-overflow bold">Status</div>
                                <div class="col-4  text-overflow bold">Paid on</div>
                            </div>
                            <?php
                            // [{"Tenant":77,"Place":1,"Month":"04-2023","PaymentStatus":"Paid","DateTime":"2023-05-09 15:37:11"}]
                            
                            $members = restAPI("property/boardingMembersRest/$placeid");
                            // get name from members and merge with rentresult no decode
                            if (isset($rentresult) && $rentresult != null) {
                                $useridArray = array();
                                foreach ($rentresult as $key => $value) {
                                    foreach ($members as $key => $value2) {
                                        if ($value->Tenant == $value2->UserId) {
                                            $arr['Status'] = $value->PaymentStatus;
                                            $arr['Month'] = $value->Month;
                                            $arr['UserId'] = $value->Tenant;
                                            $month = $value->Month;
                                            array_push($useridArray, $arr);
                                            if ($value->PaymentStatus == "Paid") {
                                                $status = "accent";
                                                $paidDate = date("M d, Y", strtotime($value->DateTime));
                                            } else {
                                                $status = "red";
                                                $paidDate = '-';
                                            }
                                            echo "<div class='hs list-items l-$month  padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                            echo "<div class='col-4  text-overflow ' title='" . $value2->FirstName . " " . $value2->LastName . "' >" . $value2->FirstName . " " . $value2->LastName . "</div>";
                                            echo "<div class='col-3  text-overflow'><span class=' small padding-horizontal-2 border-rounded border-$status border-1 $status ' title='" . $value->PaymentStatus . "' >" . $value->PaymentStatus . "</span></div>";
                                            echo "<div class='col-4  text-overflow ' title='" . $paidDate . "' >" . $paidDate . "</div>";
                                            echo "</div>";
                                        }
                                    }
                                }
                            } else {
                                echo "<div class='col-12 fill-container left padding-3 padding-horizontal-5 bold center border-box'>No Rent Payments</div>";
                            }

                            ?>

                        </div>
                        <div
                            class="col-4 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($useridArray) && $useridArray != null) {
                                foreach ($useridArray as $user) {
                                    $userid = $user['UserId'];
                                    $status = $user['Status'];
                                    $month = $user['Month'];
                                    echo "<div class='row less-gap padding-1 l-a-$month padding-horizontal-3 list-item-action'>";
                                    echo "<div class='col-12 fill-container cursor-pointer' onclick='togglePaid(\"$userid\", \"$month\", \"$status\")'>";
                                    if ($status == "Paid") {
                                        echo "<div class=' fill-container border-grey bg-white grey-hover border-1 border-rounded padding-vertical-1  center'>";
                                        echo "<i data-feather='check-circle' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Mark as Not Paid</span>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class=' fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>";
                                        echo "<i data-feather='check-circle' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Mark as Paid</span>";
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<div class='col-12 fill-container left padding-3 bold center'>No Actions Available</div>";
                            }
                            ?>
                        </div>

                    </div>

                </div>
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
            <div class="padding-2 fill-container"><br /></div>

            <div class="row fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div
                            class="col-8 table fill-container border-rounded-more padding-top-4 padding-bottom-5   bg-white ">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-4  text-overflow bold">Name</div>
                                <div class="col-3  text-overflow bold">Rating</div>
                                <div class="col-5  text-overflow bold">Review</div>
                                <div class="col-4  text-overflow bold">Date & Time</div>
                                <div class="col-5  text-overflow bold">Your Reply</div>

                            </div>
                            <?php
                            // [{"Tenant":77,"Place":1,"Month":"04-2023","PaymentStatus":"Paid","DateTime":"2023-05-09 15:37:11"}]
                            
                            $reviews = restAPI("property/ratingRest/$placeid");
                            // get name from members and merge with rentresult no decode
                            if (isset($reviews) && $reviews != null) {
                                $rentArray = array();
                                foreach ($reviews as $key => $revVal) {

                                    $revId = $revVal->ReviewId;
                                    $fname = $revVal->FirstName;
                                    $lname = $revVal->LastName;
                                    if (isset($revVal->BoardingOwnerReply)) {
                                        $reply = $revVal->BoardingOwnerReply;
                                    } else {
                                        $reply = "";
                                    }
                                    $review = $revVal->Review;
                                    $rating = $revVal->Rating;

                                    $arr['ReviewId'] = $revId;
                                    $arr['Reply'] = $reply;

                                    $dateTime = $revVal->DateTime;
                                    $dateTime = strtotime($dateTime);
                                    $dateTime = date("M d, Y h.i A", $dateTime);
                                    array_push($rentArray, $arr);

                                    echo "<div class='hs list-items  padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                    echo "<div class='col-4  text-overflow ' title='$fname $lname' >$fname $lname</div>";
                                    echo "<div class='col-3  text-overflow ' title='$rating' ><i data-star='$rating'></i></div>";
                                    echo "<div class='col-5  text-overflow ' title='$review' >$review</div>";
                                    echo "<div class='col-4  text-overflow ' title='$dateTime' >$dateTime</div>";
                                    echo "<div class='col-5  text-overflow ' title='$reply' >$reply</div>";


                                    echo "</div>";
                                }


                            } else {
                                echo "<div class='col-12 fill-container left padding-3 padding-horizontal-5 bold center border-box'>No Rent Payments</div>";
                            }

                            ?>

                        </div>
                        <div
                            class="col-4 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($rentArray) && $rentArray != null) {
                                foreach ($rentArray as $rentV) {
                                    $revId = $arr['ReviewId'];
                                    $reply = $arr['Reply'];
                                    echo "<div class='row less-gap padding-1  padding-horizontal-3 list-item-action'>";
                                    echo "<div class='col-12 fill-container cursor-pointer' onclick='editReplyModal(\"$revId\", \"$reply\")'>";
                                    if (isset($reply) && $reply != "") {
                                        echo "<div class=' fill-container border-grey bg-white grey-hover border-1 border-rounded padding-vertical-1  center'>";
                                        echo "<i data-feather='check-circle' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Edit Reply</span>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class=' fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>";
                                        echo "<i data-feather='check-circle' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Add Reply</span>";
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<div class='col-12 fill-container left padding-3 bold center'>No Actions Available</div>";
                            }
                            ?>
                        </div>

                    </div>

                </div>
            </div>

            <div class="padding-4 fill-container"><br /></div>



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
        '</select>' +
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
                                Value: 'removed'
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
     <?php
     if ($rentresult != null) {
         echo "
    filterMonth();

    function filterMonth() {
        // id='rentMonth'
        let month = document.getElementById('rentMonth').value;
        console.log(month);

        // select  class with name l-<month>
        let listItem = document.getElementsByClassName('list-items');
        let listItemAction = document.getElementsByClassName('list-item-action');
        // loop through the list and set display to none
        for (let i = 0; i < listItem.length; i++) {
            listItem[i].classList.add('display-none');
            listItem[i].classList.remove('hs');
            listItemAction[i].classList.add('display-none');
            listItemAction[i].classList.remove('row');
        }



        let monthClass = document.getElementsByClassName('l-' + month);
        let monthClassAction = document.getElementsByClassName('l-a-' + month);
        for (let i = 0; i < monthClass.length; i++) {
            monthClass[i].classList.remove('display-none');
            monthClass[i].classList.add('hs');
            monthClassAction[i].classList.remove('display-none');
            monthClassAction[i].classList.add('row');
        }


    }";
     }

     ?>

        function togglePaid(uid, month, status) {
            if (status == 'Paid') {
                status = 'Not Paid';
            }
            else {
                status = 'Paid';
            }
            const data = {
                Table: 'BoardingPlaceRent',
                Id: 'Tenant',
                IdValue: uid,
                Id2: 'Place',
                IdValue2: '<?= $placeid ?>',
                Id3: 'Month',
                IdValue3: month,
                Key: 'PaymentStatus',
                Value: status,
            };
            updater(data);
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
        updater(data);
    };

    function updater(data) {
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
    function editModal(field, value) {
        Swal.fire({
            title: 'Edit ' + field + ' Value',
            html:
                '<input type="number" class=" fill-container " id="edit-KM" name="km" placeholder="Enter ' + field + '" value="' + value + '" >' +
                '<select class=" fill-container  " id="edit-KMT" name="kmt" placeholder="Select Key Money Type">' +
                '<option value="total" selected>Total</option>' +
                '<option value="per boarder">Per Boarder</option>' +
                '</select>' +
                '<select class=" fill-container  " id="edit-KMD" name="kmd" placeholder="Select Duration">' +
                '<option value="1 month">1 Month</option>' +
                '<option value="3 months" selected>3 Months</option>' +
                '<option value="6 months">6 Months</option>' +
                '<option value="1 year">1 Year</option>' +
                '</select>'
            ,
            showCancelButton: true,
            cancelButtonColor: '#788292',
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    Table: 'BoardingMoney',
                    Id: 'Place',
                    IdValue: '<?= $placeid ?>',
                    Key: field,
                    Value: document.getElementById('edit-KM').value,
                    Key1: 'KeyMoneyType',
                    Value1: document.getElementById('edit-KMT').value,
                    Key2: 'KeyMoneyDuration',
                    Value2: document.getElementById('edit-KMD').value,

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

    function editReplyModal(id, reply) {
        Swal.fire({
            title: 'Add/Edit Reply',
            html:
                '<input type="text" class=" fill-container " id="edit-RR" name="reply" placeholder="Enter Reply" value="' + reply + '" >',
            showCancelButton: true,
            cancelButtonColor: '#788292',
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    Table: 'ReviewRating',
                    Id: 'ReviewId',
                    IdValue: id,
                    Key: 'BoardingOwnerReply',
                    Value: document.getElementById('edit-RR').value,
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


    function sendReminder(type, person) {
        let url;
        if (person === 'all') {
            url = "<?= $base ?>/notification/sendBoarderReminder/<?= $placeid ?>/" + type;
        } else {
            url = "<?= $base ?>/notification/sendBoarderReminder/<?= $placeid ?>/" + type + "/" + person;
        }
        fetch(url)
            .then(response => response.json())
            .then(json => {
                if (json.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Reminder Sent Successfully'
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