<?php

$header = new HTMLHeader("Property");
$nav = new Navigation('listing');
$base = BASEURL;
$placeId = $data['id'];

$result = restAPI("listing/placeRest/$placeId/y");
$Boarded = $result->Boarded;
$SummaryLine1 = $result->SummaryLine1;
$SummaryLine2 = $result->SummaryLine2;
$SummaryLine3 = $result->SummaryLine3;
$Price = $result->Price;
$PriceType = $result->PriceType;
$Street = $result->Street;
$CityName = $result->CityName;
$NoOfMembers = $result->NoOfMembers;
$NoOfRooms = $result->NoOfRooms;
$NoOfWashRooms = $result->NoOfWashRooms;
$Gender = $result->Gender;
$BoarderType = $result->BoarderType;
$SquareFeet = $result->SquareFeet;
$Parking = $result->Parking;
$HouseNo = $result->HouseNo;
$OwnerId = $result->OwnerId;
$Description = $result->Description;
$Title = $result->Title;
$PropertyType = $result->PropertyType;

$Price = number_format($Price);


$vacancy = $NoOfMembers - $Boarded;

if ($Parking == 'y') {
    $Parking = "Available";
} else {
    $Parking = "Not Available";
}
if ($Gender == "m") {
    $Gender = "Male";
} else if ($Gender == "f") {
    $Gender = "Female";
} else {
    $Gender = "Any";
}

$owner = restAPI("userManagement/boardingUserRest/boardingowner/$OwnerId");
if (isset($owner[0]->FirstName)) {
    $OwnerName = $owner[0]->FirstName . " " . $owner[0]->LastName;
    $OwnerContact = $owner[0]->Contact;
    $ownerDP = $owner[0]->ProfilePicture;
} else {
    $OwnerName = "Not Available";
}

?>
<main class=" full-width ">

    <div class="row more-gap navbar-offset margin-5 ">

        <div
            class="col-12 col-medium-5 margin-horizontal-3 display-block display-medium-none fill-container fill-vertical">
            <div class="row less-gap ">
                <div class="col-6  dropdown fill-container">
                    <button class=' button bold fill-container left bg-white black-hover border-rounded-more  '>
                        <i data-feather='share-2' class='vertical-align-middle'></i>
                    </button>

                    <div class='dropdown-content'>
                        <a
                            onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $base ?>/listing/viewPlace/<?= $placeId ?>')">
                            <button class='fill-container border-rounded bg-white-hover left'><i
                                    class='vertical-align-middle padding-horizontal-2' data-feather='facebook'></i><span
                                    class=' vertical-align-middle'>Facebook</span></button>
                        </a>
                        <a onclick="window.open('whatsapp://send?text=<?= $base ?>/listing/viewPlace/<?= $placeId ?>')">
                            <button class='fill-container border-rounded bg-white-hover left'><i
                                    class='vertical-align-middle padding-horizontal-2'
                                    data-feather='message-circle'></i><span
                                    class=' vertical-align-middle'>WhatsApp</span></button>
                        </a>
                        <a
                            onclick="window.open('https://telegram.me/share/url?url=<?= $base ?>/listing/viewPlace/<?= $placeId ?>')">
                            <button class='fill-container border-rounded bg-white-hover left'><i
                                    class='vertical-align-middle padding-horizontal-2' data-feather='send'></i><span
                                    class=' vertical-align-middle'>Telegram</span></button>
                        </a>
                    </div>
                </div>
                <div class="col-6 header-2 right fill-container">
                    <i data-feather="star" class=" vertical-align-middle"></i>
                    <span class="vertical-align-middle">4.6</span>
                </div>
                <div class="col-12 fill-container left">
                    <span class='header-1 margin-0'>
                        <?= $Title ?>
                    </span>
                </div>
                <div class="col-12 fill-container left">
                    <span class=' margin-0'>
                        <?php echo "$HouseNo, $Street, $CityName"; ?>
                    </span>
                </div>
                <div class='col-12 fill-container left margin-vertical-3'>
                    <div class='display-inline-block header-2 vertical-align-middle'>
                        Rs.
                        <?= $Price ?>
                    </div>
                    <div class='display-inline-block  vertical-align-middle'>
                        (
                        <?= $PriceType ?>)
                    </div>
                </div>
                <div class="col-6 fill-container margin-vertical-4 ">
                    <?php
                    if (isset($ownerDP) && $ownerDP != "") {
                        echo "
                            <img src='$base/$ownerDP' class='vertical-align-middle border-white border-3 shadow dp border-circle'>
                        ";
                    } else {
                        echo "
                            <img src='https://ui-avatars.com/api/?background=288684&color=fff&name=$OwnerName' class='vertical-align-middle border-white border-3 shadow dp border-circle'>
                        ";
                    }
                    ?>
                    <span class='big vertical-align-middle padding-2'>
                        <?= $OwnerName ?>
                    </span>
                </div>
                <div class="col-6 header-2 right fill-container margin-top-4">
                    <button class='bg-white-hover border-1 border-rounded-more'
                        onclick="window.location.href='tel:<?= $OwnerContact ?>'">
                        <i data-feather="phone-call" class=" vertical-align-middle"></i>
                        <span class="vertical-align-middle padding-2">Contact</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="col-12 col-medium-7  fill-container fill-vertical padding-2">
            <?php


            $imageResult = restAPI("listing/imageRest/$placeId");
            if (isset($imageResult[0])) {
                $image1 = $imageResult[0]->Image;
            } else {
                $image1 = "images/defboarding.png";
            }
            // foreach ($images as $key => $value) {
            //         $image = $value->Image;
            // }
            echo "<img src='$base/$image1' class='shadow border-rounded-more fill-container'>";
            ?>
            <div
                class='row less-gap margin-vertical-4 shadow padding-vertical-4 border-rounded-more display-block display-medium-none'>
                <div title='No. of Members' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='users' class='accent'></i></span>
                    <span id='members-$PostId' class=' display-block center'>
                        <?= $NoOfMembers ?> Members
                    </span>
                </div>
                <div title='PropertyType' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='shopping-bag' class='accent'></i></span>
                    <span id='members-$PostId' class=' display-block center'>
                        <?= $PropertyType ?>
                    </span>
                </div>
                <div title='No. of Rooms' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='archive' class='accent'></i></span>
                    <span id='rooms-$PostId' class=' display-block center'>
                        <?= $NoOfRooms ?> Rooms
                    </span>
                </div>
                <div title='No. of Washrooms' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='grid' class='accent'></i></span>
                    <span id='washrooms-$PostId' class=' display-block center'>
                        <?= $NoOfWashRooms ?> Washroom
                    </span>
                </div>
                <div title='Gender' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='user' class='accent'></i></span>
                    <span id='gender-$PostId' class=' display-block center'>
                        Gender
                        <?= $Gender ?>
                    </span>
                </div>
                <div title='Type of Tenant' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='briefcase' class='accent'></i></span>
                    <span id='boardertype-$PostId' class=' display-block center'>
                        <?= $BoarderType ?> Boarder
                    </span>
                </div>
                <div title='Square Feet' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='shuffle' class='accent'></i></span>
                    <span id='squarefeet-$PostId' class=' display-block center'>
                        <?= $SquareFeet ?> Sq.Ft
                    </span>
                </div>
                <div title='Parking availability' class='col-3 center fill-container small grey'>
                    <span class='display-block center'>
                        <i data-feather='navigation' class='accent'></i></span>
                    <span id='parking-$PostId' class=' display-block center'>
                        Parking
                        <?= $Parking ?>
                    </span>
                </div>
            </div>
            <div class="row margin-vertical-3">
                <div class="col-12 col-small-6 fill-container shadow border-rounded-more fill-vertical ">
                    <div class="fill-container grey padding-4   ">
                        <span class="black header-2">Summary</span>
                        <ul class=' margin-horizontal-3'>
                            <li class="">
                                <?= $SummaryLine1 ?>
                            </li>
                            <li class="">
                                <?= $SummaryLine2 ?>
                            </li>
                            <li class="">
                                <?= $SummaryLine3 ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-small-6 fill-container shadow border-rounded-more fill-vertical">
                    <div class="fill-container grey padding-4    ">
                        <span class="black header-2">Currently Boarded</span>

                        <ul class=' margin-horizontal-3'>

                            <?php
                            $boarders = restAPI("property/boardingMemberTypes/$placeId");
                            if (isset($boarders) && !empty($boarders)) {
                                foreach ($boarders as $key => $value) {
                                    echo "
                                        <li>
                                            $value - $key
                                        </li>
                                    ";
                                }
                            } else {
                                echo "
                                    <li>
                                        No Boarders
                                    </li>
                                ";
                            }

                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <span class='header-2'>Description</span>
                    <p class=''>
                        <?= $Description ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-medium-5 margin-3  fill-container fill-vertical">
            <div class="display-none display-medium-block">
                <div class="row less-gap">
                    <div class="col-6  dropdown fill-container">
                        <button class=' button bold fill-container left bg-white black-hover border-rounded-more  '>
                            <i data-feather='share-2' class='vertical-align-middle'></i>
                        </button>

                        <div class='dropdown-content'>
                            <a
                                onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $base ?>/listing/viewPlace/<?= $placeId ?>')">
                                <button class='fill-container border-rounded bg-white-hover left'><i
                                        class='vertical-align-middle padding-horizontal-2'
                                        data-feather='facebook'></i><span
                                        class=' vertical-align-middle'>Facebook</span></button>
                            </a>
                            <a
                                onclick="window.open('whatsapp://send?text=<?= $base ?>/listing/viewPlace/<?= $placeId ?>')">
                                <button class='fill-container border-rounded bg-white-hover left'><i
                                        class='vertical-align-middle padding-horizontal-2'
                                        data-feather='message-circle'></i><span
                                        class=' vertical-align-middle'>WhatsApp</span></button>
                            </a>
                            <a
                                onclick="window.open('https://telegram.me/share/url?url=<?= $base ?>/listing/viewPlace/<?= $placeId ?>')">
                                <button class='fill-container border-rounded bg-white-hover left'><i
                                        class='vertical-align-middle padding-horizontal-2' data-feather='send'></i><span
                                        class=' vertical-align-middle'>Telegram</span></button>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 header-2 right fill-container">
                        <i data-feather="star" class=" vertical-align-middle"></i>
                        <span class="vertical-align-middle">4.6</span>
                    </div>
                    <div class="col-12 fill-container left">
                        <h1 class='header-1 margin-0'>
                            <?= $Title ?>
                        </h1>
                    </div>
                    <div class="col-12 fill-container left">
                        <span class=' margin-0'>
                            <?php echo "$HouseNo, $Street, $CityName"; ?>
                        </span>
                    </div>
                    <div class='col-12 fill-container left margin-vertical-3'>
                        <div class='display-inline-block header-2 vertical-align-middle'>
                            Rs.
                            <?= $Price ?>
                        </div>
                        <div class='display-inline-block  vertical-align-middle'>
                            (
                            <?= $PriceType ?>)
                        </div>
                    </div>
                    <div class="col-6 fill-container margin-vertical-4 ">
                        <?php
                        if (isset($ownerDP) && $ownerDP != "") {
                            echo "
                            <img src='$base/$ownerDP' class='vertical-align-middle border-white border-3 shadow dp border-circle'>
                        ";
                        } else {
                            echo "
                            <img src='https://ui-avatars.com/api/?background=288684&color=fff&name=$OwnerName' class='vertical-align-middle border-white border-3 shadow dp border-circle'>
                        ";
                        }
                        ?>
                        <span class='big vertical-align-middle padding-2'>
                            <?= $OwnerName ?>
                        </span>
                    </div>
                    <div class="col-6 header-2 right fill-container margin-vertical-4">
                        <button class='bg-white-hover border-1 border-rounded-more'
                            onclick="window.location.href='tel:<?= $OwnerContact ?>'">
                            <i data-feather="phone-call" class=" vertical-align-middle"></i>
                            <span class="vertical-align-middle padding-2">Contact</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="display-none display-medium-block">
                <div class='row less-gap margin-top-4 shadow padding-vertical-4 border-rounded-more'>
                    <div title='No. of Members' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='users' class='accent'></i></span>
                        <span id='members-$PostId' class=' display-block center'>
                            <?= $NoOfMembers ?> Members
                        </span>
                    </div>

                    <div title='PropertyType' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='shopping-bag' class='accent'></i></span>
                        <span id='members-$PostId' class=' display-block center'>
                            <?= $PropertyType ?>
                        </span>
                    </div>
                    <div title='No. of Rooms' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='archive' class='accent'></i></span>
                        <span id='rooms-$PostId' class=' display-block center'>
                            <?= $NoOfRooms ?> Rooms
                        </span>
                    </div>
                    <div title='No. of Washrooms' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='grid' class='accent'></i></span>
                        <span id='washrooms-$PostId' class=' display-block center'>
                            <?= $NoOfWashRooms ?> Washroom
                        </span>
                    </div>
                    <div title='Gender' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='user' class='accent'></i></span>
                        <span id='gender-$PostId' class=' display-block center'>
                            Gender
                            <?= $Gender ?>
                        </span>
                    </div>
                    <div title='Type of Tenant' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='briefcase' class='accent'></i></span>
                        <span id='boardertype-$PostId' class=' display-block center'>
                            <?= $BoarderType ?> Boarder
                        </span>
                    </div>
                    <div title='Square Feet' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='shuffle' class='accent'></i></span>
                        <span id='squarefeet-$PostId' class=' display-block center'>
                            <?= $SquareFeet ?> Sq.Ft
                        </span>
                    </div>
                    <div title='Parking availability' class='col-3 center fill-container small grey'>
                        <span class='display-block center'>
                            <i data-feather='navigation' class='accent'></i></span>
                        <span id='parking-$PostId' class=' display-block center'>
                            Parking
                            <?= $Parking ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class='row less-gap padding-4 shadow margin-vertical-4 border-rounded-more'>
                <div class="col-6 fill-container">
                    <span class='header-2'>Vacancies</span>
                </div>
                <div class="col-6 right fill-container">
                    <?php
                    if ($vacancy == 0) {
                        echo "
                                <span class='red'>No Vacancies</span>
                                ";
                    } else if ($vacancy == 1) {
                        echo "
                                <span class='red'>1 Vacancy</span>
                                ";
                    } else {
                        echo "
                                <span class='accent'>$vacancy Vacancies</span>
                                ";
                    }
                    ?>
                </div>
                <div class="col-6 fill-container">
                    <button class='bg-white-hover border-1 border-rounded-more fill-container'
                        onclick="window.location.href='tel:<?= $OwnerContact ?>'">
                        <i data-feather="phone-call" class=" vertical-align-middle"></i>
                        <span class="vertical-align-middle padding-2">Book Appointment</span>
                    </button>
                </div>
                <div class="col-6 right fill-container">
                    <button class='bg-black-hover white border-1 border-rounded-more fill-container'
                        onclick="requestBoarding()">
                        <i data-feather="shield" class=" vertical-align-middle"></i>
                        <span class="vertical-align-middle padding-2">Request Boarding</span>
                    </button>
                </div>
            </div>

        </div>
</main>

<script>
    function requestBoarding() {
        let url = "<?= $base ?>/property/joinBoarding/<?= $placeId ?>/<?= $_SESSION['UserId'] ?>";
        fetch(url).then((response) => response.json()).then((json) => {
            console.log(json);
            if (json.Status === 'Success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Join Request Sent',
                    text: 'You will be notified when your request is accepted'
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
</script>



<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>