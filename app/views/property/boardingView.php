<?php
$header = new HTMLHeader("View Listing");
$nav = new Navigation("home");
$base = BASEURL;
$_boardingOwner = new property;
$placeid = $data['placeid'];

$boardingPlace = $_boardingOwner->viewBoardingPlace($placeid);


if (isset($boardingPlace)) {
    $result = $boardingPlace->fetch_assoc();

    $title = $result['Title'];
    $address = $result['Address'];
    $summaryLine1 = $result['SummaryLine1'];
    $summaryLine2 = $result['SummaryLine2'];
    $summaryLine3 = $result['SummaryLine3'];
    $description = $result['Description'];
    $price = $result['Price'];
    $noofmembers = $result['NoOfMembers'];
    $noofrooms = $result['NoOfRooms'];
    $noofwashrooms = $result['NoOfWashRooms'];
    $gender = $result['Gender'];
    $boardertype = $result['BoarderType'];
    $squarefeet = $result['SquareFeet'];
    $parking = $result['Parking'];

    $ownerid = $result['OwnerId'];

    // if (isset($_SESSION['username'])) {
    //     $fname = $_SESSION['firstname'];
    //     $lname = $_SESSION['lastname'];
    // }

    $owner = $_boardingOwner->getOwnerDetails($ownerid);

    if(isset($owner)){
        $ownerResult = $owner->fetch_assoc();

        $fname = $ownerResult['FirstName'];
        $lname = $ownerResult['LastName'];
    }
   
}

?>

<main>
    
    <div class=" navbar-offset">
        <div class="row padding-4 align-content-start">
            <div class="col-7 col-large-7 col-small-12 fill-container ">
                <div class="row ">
                    <div class="col-12 fill-container">
                        <?php
                        $boardingPlaceImages = $_boardingOwner->getBoardingImages($placeid);
                        $someRow = $boardingPlaceImages->fetch_assoc();
                        if (!is_null($someRow)) {
                            $imageResult = $boardingPlaceImages->fetch_assoc();
                            $imageOne = $imageResult[0];
                            $image = $imageOne['PictureLink'];
                            echo "
                            <img class=' border-rounded' src=$image id='preview'>
                            "; 
                        } else {
                            echo "
                            <img  class=' fill-container border-rounded' src=$base/public/images/randomboardinghouse2.png  id='preview'>
                            ";
                        }
                        ?>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-6 col-small-12 col-large-6 width-90 border-rounded shadow padding-4 margin-top-0">
                        <div class=" header-2">Summary</div>
                        <ul class=" grey">
                            <?php
                            echo "
                            <li>$summaryLine1</li>
                            <li>$summaryLine2</li>
                            <li>$summaryLine3</li>
                            ";
                            ?>
                        </ul>
                    </div>
                    <div class="col-6 col-small-12 col-large-6 width-90 border-rounded shadow padding-4 margin-top-0">
                        <div class="header-2">Currently Boarded</div>
                        <div class="row">
                            <div class="col-12 padding-5"></div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 col-large-12 col-small-12 width-90 border-rounded shadow padding-4 margin-top-3">
                    <div class="header-2">Description</div>
                    <div class="padding-left-3 grey">
                        <?php
                        echo "
                        $description
                        ";
                        ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-5 col-small-12 col-large-5 fill-container padding-4 fill-vertical margin-top-5">
                <div class="row fill-container">
                    <div class="col-1 fill-container">
                        <i data-feather="heart"></i>
                    </div>
                    <div class="col-1 fill-container">
                        <i data-feather="share-2"></i>
                    </div>
                    <div class="col-8 fill-container"></div>
                    <div class="col-2">
                    <i data-feather="star"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 fill-container">
                        <div class="header-1">
                            <?php
                            echo $title;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 fill-container">
                        <div class="header-nb grey">
                            <?php
                            echo $address;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 fill-container margin-top-2">
                        <div class="header-2">
                            <?php
                            echo "
                            Rs. $price
                            ";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 padding-vertical-4"></div>
                </div>
                <div class="row">
                    <div class="col-8 fill-container left-flex">
                        <?php
                        echo "
                        <div class=' header-2 padding-top-2'>$fname $lname  &nbsp; &nbsp;</div>
                        <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='user'>                        
                        ";
                        ?>
                    </div>
                    <div class="col-4 padding-left-5 fill-container left">
                        <button class=" border-1 border-black bg-white padding-3 black-hover border-rounded-more flex float-right margin-right-5">
                            <i data-feather="phone-call"></i>
                            &nbsp;Contact
                        </button>
                    </div>
                </div>
                <div class="row margin-top-4">
                    <div class="col-2 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="users"></i>
                        <?php
                        echo "$noofmembers Members";
                        ?>
                    </div>
                    <div class="col-2 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="archive"></i>
                        <?php
                        echo "$noofrooms Rooms";
                        ?>
                    </div>
                    <div class="col-2 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="grid"></i>
                        <?php
                        echo "$noofwashrooms Washrooms";
                        ?>
                    </div>
                    <div class="col-2 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="user"></i>
                        <?php
                        if ($gender == "M") {
                            echo "Gentlemen";
                        } else if ($gender == "F") {
                            echo "Ladies";
                        } else {
                            echo "Any";
                        }
                        ?>

                    </div>
                    <div class="col-1 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="smile"></i>
                        <?php
                        echo $boardertype;
                        ?>
                    </div>
                    <div class="col-2 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="shuffle"></i>
                        <?php
                        echo "$squarefeet Sq.Ft";
                        ?>
                    </div>
                    <div class="col-1 fill-container flex-column accent">
                        <i class="icon-green margin-bottom-1" data-feather="map-pin"></i>
                        <?php
                        if ($parking == 'y') {
                            echo "Parking";
                        } else {
                            echo "No Parking";
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $boardingPlaceImages = $_boardingOwner->getBoardingImages($placeid);
                    $someAnotherRow = $boardingPlaceImages->fetch_assoc();
                    
                    if (!empty($someAnotherRow)) {
                        $irr = $boardingPlaceImages->fetch_assoc();
                        while ($imageResult = $boardingPlaceImages->fetch_assoc()) {
                            $piclink = $imageResult['PictureLink'];
                            echo "
                            <div class=' col-4 col-large-4 col-small-6'>
                                <img height='150px' class='fill-container border-rounded' src=$piclink onclick='change(this.src)'>
                            </div>
                            ";
                        }
                    } else {
                        echo "
                        <div class=' col-12 fill-container border-rounded shadow margin-top-5'>
                            <div class='row'>
                                <div class='col-12 padding-5 header-2'>
                                    No Images To Display
                                </div>
                                <div class='col-12 padding-5 header-2'></div>
                            </div>
                        </div>
                        ";
                    }    
                    ?>
                </div>
                <div class="row">
                    <?php
                    $reviews = restAPI("property/viewReviewsByPlaceId/$placeid");
                    ?>
                    <div class="col-12 fill-container border-rounded shadow margin-top-5 margin-top-4">
                        <div class='col-12 padding-4 header-2 center'>
                            Reviews
                        </div>
                        <?php
                        if (!is_null($reviews)) {
                            foreach ($reviews as $res) {    
                                    echo "
                                    <div class='row padding-2 shadow margin-2 border-rounded'>
                                        <div class='row>
                                            <div class='col-3'>
                                                <img class=' dp  border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$res->FirstName+$res->LastName' >
                                            </div>
                                            <div class='col-3'>
                                               <div class='header-nb right'> $res->FirstName $res->LastName</div>
                                               $res->UserType
                                            </div>
                                            <div class='col-2'></div>
                                            <div class='col-4 left-flex'>";

                                            if($res->Rating > 4.5){
                                                echo "
                                                <img height=20px class=' fill-container' src='$base/public/images/5.jpg' >
                                                ";
                                            }else if($res->Rating > 3.5){
                                                echo "
                                                <img height=20px class=' fill-container' src='$base/public/images/4.jpg' >
                                                ";
                                            }else if($res->Rating > 2.5){
                                                echo "
                                                <img height=20px class=' fill-container' src='$base/public/images/3.jpg' >
                                                ";
                                            }else if($res->Rating > 1.5){
                                                echo "
                                                <img height=20px class=' fill-container' src='$base/public/images/2.jpg' >
                                                ";
                                            }else{
                                                echo "
                                                <img height=20px class=' fill-container' src='$base/public/images/1.jpg' >
                                                ";
                                            }
                                                
                                        echo"
                                            </div>
                                            <div class='row'>
                                                <div class='col-12'>
                                                $res->Review
                                                </div>
                                            </div>
                                        </div>
                                        
                                            
                                    ";     
                            }
                        } else {
                        
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
$footer = new HTMLFooter();
?>

<script>
    const change = src => {
	document.getElementById('preview').src = src;
    }

</script>
