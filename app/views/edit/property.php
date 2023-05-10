<?php

$header = new HTMLHeader("Property");
$nav = new Navigation('listing');
$sidebar = new SidebarNav("properties");

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

$images = restAPI("listing/imageRest/$placeId");

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
    <div class="row sidebar-offset navbar-offset less-gap  ">
        <div class="col-12 col-medium-12 fill-container width-90">

            <div class="row fill-container">
                <div class="col-12 fill-container left"
                    onclick=" location.href='<?= $base ?>/property/manage/<?= $placeId ?>'">
                    <h1 class="header-1 black-hover cursor-pointer">
                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <span class="vertical-align-middle">Edit Boarding</span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-12 fill-container width-90">
            <div class="row  fill-container top">



                <!-- main form -->
                <div class='col-12 col-large-7 fill-container '>
                    <div class="row ">

                        <input type="hidden" name='owner' value='<?= $data['id'] ?>' />

                        <span class="header-2 col-12 left fill-container">Listing Details</span>
                        <div class="col-12  fill-container">
                            <label for="title" class="bold black">Listing Title</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="text" onkeyup="preview(this,'title-prev')" class="fill-container"
                                        id="title" name="title" placeholder="Enter Listing Title" value=" <?= $Title ?>"
                                        required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','Title','title')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-6  fill-container">
                            <label for="price" class="bold black">Price</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="text" onkeyup="preview(this,'price-prev')" class="fill-container"
                                        id="price" name="price" placeholder="Enter Price" value='<?= $Price ?>'
                                        required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','Price','price')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-6 fill-container">

                            <label for="priceType" class="bold black">Price Type</label>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <select class="" name="priceType" onchange="preview(this,'price-type-prev')"
                                        id="priceType" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <?php

                                        if ($PriceType == "per month") {
                                            echo "<option value='per month' selected>Per Month</option>";
                                            echo "<option value='per boarder'>Per Boarder</option>";
                                        } else {
                                            echo "<option value='per month'>Per Month</option>";
                                            echo "<option value='per boarder' selected>Per Boarder</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','PriceType','priceType')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>

                        </div>

                        <div class="col-12 fill-container">
                            <label class="big" for="listingImages">Images</label>
                            <div class=" row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input id="listingImages" name='listingImages' credits='false'
                                        accept="image/png, image/jpeg, image/gif" type="file" multiple
                                        data-allow-reorder="true" data-max-file-size="3MB" data-max-files="10">
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="updateImage()"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 fill-container">
                            <input type="hidden" id="imagePaths" name="imagePaths" required>
                        </div>


                        <div class="col-12 col-medium-6 fill-container">

                            <label for="noofmembers" class="bold black">No. of Members</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="number" min="0" onkeyup="preview(this,'members-prev')"
                                        onchange="preview(this,'members-prev')" class="fill-container" id="noofmembers"
                                        name="noofmembers" placeholder="Members" value="<?= $NoOfMembers ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','NoOfMembers','noofmembers')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12 col-medium-6 fill-container">

                            <label for="propertytype" class="bold black">Property Type</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <select name="propertytype" onchange="preview(this,'prop-type-prev')"
                                        id="propertytype" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <?php

                                        if ($PropertyType == "House") {
                                            echo "<option value='House' selected>House</option>";
                                            echo "<option value='Hostel'>Hostel</option>";
                                        } else {
                                            echo "<option value='House'>House</option>";
                                            echo "<option value='Hostel' selected>Hostel</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','PropertyType','propertytype')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12 col-medium-6 fill-container">

                            <label for="noofrooms" class="bold black">No. of Rooms</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="number" min="0" onkeyup="preview(this,'rooms-prev')"
                                        onchange="preview(this,'rooms-prev')" class="fill-container" id="noofrooms"
                                        name="noofrooms" placeholder="Rooms" value="<?= $NoOfRooms ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','NoOfRooms','noofrooms')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12 col-medium-6 fill-container">

                            <label for="noofwashrooms" class="bold black">No. of Washrooms</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="number" min="0" onkeyup="preview(this,'washrooms-prev')"
                                        onchange="preview(this,'washrooms-prev')" class="fill-container"
                                        id="noofwashrooms" name="noofwashrooms" placeholder="Washrooms"
                                        value="<?= $NoOfWashRooms ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','NoOfWashRooms','noofwashrooms')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12 col-medium-7 fill-container padding-bottom-4">
                            <div class="bold black padding-bottom-2 ">Gender</div>
                            <div class=" row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <?php
                                    if ($Gender == 'A') {
                                        echo "
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='A' id='any' checked>
                                            <label for='any' class=''>Any</label>
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='M' id='male'>
                                            <label for='male' class=''>M</label>
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='F' id='female'>
                                            <label for='female' class=''>F</label>
                                        ";
                                    } elseif ($Gender == 'M') {
                                        echo "
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='A' id='any' >
                                            <label for='any' class=''>Any</label>
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='M' id='male' checked>
                                            <label for='male' class=''>M</label>
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='F' id='female'>
                                            <label for='female' class=''>F</label>
                                        ";
                                    } else {
                                        echo "
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='A' id='any' >
                                            <label for='any' class=''>Any</label>
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='M' id='male' >
                                            <label for='male' class=''>M</label>
                                            <input type='radio' name='gender' onclick='preview(this,\"gender-prev\")' value='F' id='female' checked>
                                            <label for='female' class=''>F</label>
                                        ";
                                    }

                                    ?>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="updateRadio('BoardingPlace','PlaceId','<?= $placeId ?>','Gender','gender')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12 col-medium-5 fill-container">

                            <label for="boardertype" class="bold black">Boarder Type</label>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <select class="" name="boardertype" onchange="preview(this,'boardertype-prev')"
                                        id="boardertype" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <?php

                                        if ($BoarderType == "Any") {
                                            echo "
                                                <option value='Any' selected>Any</option>
                                                <option value='Student'>Student</option>
                                                <option value='Professional'>Professional</option>
                                            ";
                                        } elseif ($BoarderType == "Student") {
                                            echo "
                                                <option value='Any'>Any</option>
                                                <option value='Student' selected>Student</option>
                                                <option value='Professional'>Professional</option>
                                            ";
                                        } else {
                                            echo "
                                                <option value='Any'>Any</option>
                                                <option value='Student'>Student</option>
                                                <option value='Professional' selected>Professional</option>
                                            ";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','BoarderType','boardertype')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12 col-medium-5 fill-container">

                            <label for="squarefeet" class="bold black">Square Feet</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="number" min="0" onkeyup="preview(this,'squarefeet-prev')"
                                        onchange="preview(this,'squarefeet-prev')" class="fill-container"
                                        id="squarefeet" name="squarefeet" placeholder="Square Ft"
                                        value="<?= $SquareFeet ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','SquareFeet','squarefeet')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>


                        <div class="col-12 col-medium-7 fill-container padding-bottom-4">
                            <div class="bold black padding-bottom-2 ">Parking</div>
                            <div class=" row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <?php
                                    if ($Parking == 'y') {
                                        echo "
                                            <input type='radio' name='parking' onclick='preview(this,\"parking-prev\")' value='y' id='Available' checked>
                                            <label for='Available' class=''>Available</label>
                                            <input type='radio' name='parking' onclick='preview(this,\"parking-prev\")' value='n' id='Not-Available'>
                                            <label for='Not-Available' class=''>N/A</label> 
                                        ";
                                    } else {
                                        echo "
                                            <input type='radio' name='parking' onclick='preview(this,\"parking-prev\")' value='y' id='Available' >
                                            <label for='Available' class=''>Available</label>
                                            <input type='radio' name='parking' onclick='preview(this,\"parking-prev\")' value='n' id='Not-Available' checked>
                                            <label for='Not-Available' class=''>N/A</label> 
                                        ";
                                    }

                                    ?>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="updateRadio('BoardingPlace','PlaceId','<?= $placeId ?>','Parking','parking')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12  fill-container">
                            <label for="sml1" class="bold black">Summary Line 1</label>
                            <br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="text" onkeyup="preview(this,'sml1-prev')" class="fill-container"
                                        id="sml1" name="sml1" placeholder="Enter Summary Line 1"
                                        value="<?= $SummaryLine1 ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','SummaryLine1','sml1')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12  fill-container">
                            <label for="sml1" class="bold black">Summary Line 2</label>
                            <br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="text" onkeyup="preview(this,'sml2-prev')" class="fill-container"
                                        id="sml2" name="sml2" placeholder="Enter Summary Line 2"
                                        value="<?= $SummaryLine2 ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','SummaryLine2','sml2')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="col-12  fill-container">
                            <label for="sml1" class="bold black">Summary Line 3</label>
                            <br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <input type="text" onkeyup="preview(this,'sml3-prev')" class="fill-container"
                                        id="sml3" name="sml3" placeholder="Enter Summary Line 3"
                                        value="<?= $SummaryLine3 ?>" required>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','SummaryLine3','sml3')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>


                        <div class="col-12  fill-container">
                            <label for="sml1" class="bold black">Description</label>
                            <br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container">
                                    <textarea class="fill-container" onkeyup="preview(this,'description-prev')"
                                        id="description" name="description" placeholder="Enter Description"
                                        required> <?= preg_replace('/\R+/', "\n", str_replace(["<br>", "<br/>", "<br />"], "\n", $Description)); ?></textarea>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingPlace','PlaceId','<?= $placeId ?>','Description','description')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>
                </div>

                <!-- preview -->
                <div class='col-12 col-large-5 fill-container     '>
                    <h2 class='header-2'>Preview</h2>
                    <div class="col-12 padding-4  shadow fill-vertical border-rounded-more ">

                        <div class="row less-gap ">
                            <div class="col-6  dropdown fill-container">
                                <button
                                    class=' button bold fill-container left bg-white black-hover border-rounded-more  '>
                                    <i data-feather='share-2' class='vertical-align-middle'></i>
                                </button>

                                <div class='dropdown-content'>
                                    <a>
                                        <button class='fill-container border-rounded bg-white-hover left'><i
                                                class='vertical-align-middle padding-horizontal-2'
                                                data-feather='facebook'></i><span
                                                class=' vertical-align-middle'>Facebook</span></button>
                                    </a>
                                    <a>
                                        <button class='fill-container border-rounded bg-white-hover left'><i
                                                class='vertical-align-middle padding-horizontal-2'
                                                data-feather='message-circle'></i><span
                                                class=' vertical-align-middle'>WhatsApp</span></button>
                                    </a>
                                    <a>
                                        <button class='fill-container border-rounded bg-white-hover left'><i
                                                class='vertical-align-middle padding-horizontal-2'
                                                data-feather='send'></i><span
                                                class=' vertical-align-middle'>Telegram</span></button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 header-2 right fill-container">
                                <i data-feather="star" class=" vertical-align-middle"></i>
                                <span class="vertical-align-middle">N/A</span>
                            </div>
                            <div class="col-12 fill-container left">
                                <span id='title-prev' class='header-1 margin-0'>
                                    <?= $Title ?>
                                </span>
                            </div>
                            <div class="col-12 fill-container left">
                                <span class=' margin-0'>
                                    <span id='houseno-prev'>
                                        <?= $HouseNo ?>
                                    </span>, <span id='street-prev'>
                                        <?= $Street ?>
                                    </span>,
                                    <span id='city-prev'>
                                        <?= $CityName ?>
                                    </span>
                                </span>
                            </div>
                            <div class='col-12 fill-container left margin-vertical-3'>
                                <div class='display-inline-block header-2 vertical-align-middle'>
                                    Rs. <span id='price-prev'>
                                        <?= number_format($Price); ?>
                                    </span>
                                </div>
                                <div class='display-inline-block  vertical-align-middle'>
                                    (<span id='price-type-prev'>
                                        <?= $PriceType ?>
                                    </span>)
                                </div>
                            </div>
                            <div class="col-6 fill-container margin-vertical-4 ">
                                <?php

                                if (isset($ownerDP) && $ownerDP != "") {
                                    echo "
                            <img src='$base/$ownerDP' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
                                } else {
                                    echo "
                            <img src='https://ui-avatars.com/api/?background=288684&color=fff&name=$OwnerName' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
                                }
                                ?>
                                <span class='big vertical-align-middle padding-2'>
                                    <?= $OwnerName ?>
                                </span>
                            </div>
                            <div class="col-6 header-2 right fill-container margin-top-4">
                                <button class='bg-white-hover border-1 border-rounded-more'>
                                    <i data-feather="phone-call" class=" vertical-align-middle"></i>
                                    <span class="vertical-align-middle padding-2">Contact</span>
                                </button>
                            </div>
                        </div>
                        <img id='MainPic' src='<?= $base ?>/images/defboarding.png'
                            class='shadow border-rounded-more fill-container'>
                        <div id='imageset-prev' class=' row less-gap padding-4 shadow margin-vertical-4
                            border-rounded-more '>
                            <div class=' col-3 h-100px'>
                                <img onclick=changeImg() src='<?= $base ?>/images/defboarding.png'
                                    class='shadow border-rounded-more fill-container cursor-pointer'>
                            </div>
                        </div>

                        <div class='row less-gap margin-vertical-4 shadow padding-vertical-4 border-rounded-more '>
                            <div title='No. of Members' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='users' class='accent'></i></span>
                                <span class=' display-block center'>
                                    <span id='members-prev'>
                                        <?= $NoOfMembers ?>
                                    </span> Members
                                </span>
                            </div>
                            <div title='PropertyType' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='shopping-bag' class='accent'></i></span>
                                <span id='prop-type-prev' class=' display-block center'>
                                    <?= $PropertyType ?>
                                </span>
                            </div>
                            <div title='No. of Rooms' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='archive' class='accent'></i></span>
                                <span id='rooms-prev' class=' display-block center'>
                                    <?= $NoOfRooms ?> Rooms
                                </span>
                            </div>
                            <div title='No. of Washrooms' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='grid' class='accent'></i></span>
                                <span id='washrooms-prev' class=' display-block center'>
                                    <?= $NoOfWashRooms ?> Washrooms
                                </span>
                            </div>
                            <div title='Gender' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='user' class='accent'></i></span>
                                <span id='gender-prev' class=' display-block center'>
                                    <?= $Gender ?>
                                </span>
                            </div>
                            <div title='Type of Tenant' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='briefcase' class='accent'></i></span>
                                <span id='boardertype-prev' class=' display-block center'>
                                    <?= $BoarderType ?> Boarder
                                </span>
                            </div>
                            <div title='Square Feet' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='shuffle' class='accent'></i></span>
                                <span id='squarefeet-prev' class=' display-block center'>
                                    <?= $SquareFeet ?> Sq.Ft
                                </span>
                            </div>
                            <div title='Parking availability' class='col-3 center fill-container small grey'>
                                <span class='display-block center'>
                                    <i data-feather='navigation' class='accent'></i></span>
                                <span id='parking-prev' class=' display-block center'>
                                    Parking
                                    <?= $Parking ?>
                                </span>
                            </div>
                        </div>

                        <div class='row less-gap padding-4 shadow margin-vertical-4 border-rounded-more  '>
                            <div class="col-12 fill-container">
                                <span class='header-2'>Vacancies</span>
                            </div>
                            <div class="col-6 fill-container">
                                <button class='bg-white-hover border-1 border-rounded-more fill-container'>
                                    <i data-feather="phone-call" class=" vertical-align-middle"></i>
                                    <span class="vertical-align-middle padding-2">Book Appointment</span>
                                </button>
                            </div>
                            <div class="col-6 right fill-container">
                                <button class=' white border-1 border-rounded-more fill-container bg-black-hover'>
                                    <i data-feather="shield" class=" vertical-align-middle"></i>
                                    <span class="vertical-align-middle padding-2">Request Boarding</span>
                                </button>
                            </div>
                        </div>

                        <div class="row margin-vertical-3">
                            <div class="col-12 fill-container shadow border-rounded-more fill-vertical ">
                                <div class="fill-container grey padding-4   ">
                                    <span class="black header-2">Summary</span>
                                    <ul class=' margin-horizontal-3 padding-3'>
                                        <li id="sml1-prev">
                                            <?= $SummaryLine1 ?>
                                        </li>
                                        <li id="sml2-prev">
                                            <?= $SummaryLine2 ?>
                                        </li>
                                        <li id="sml3-prev">
                                            <?= $SummaryLine3 ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 fill-container">
                                <span class='header-2'>Description</span>
                                <p id='description-prev'>
                                    <?= $Description ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>



<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    function changeImg(img) {
        document.getElementById('MainPic').src = '<?= BASEURL ?>/' + img;
    }

    function preview(e, id) { 
        let elem = document.getElementById(id); 
        if (id === 'description-prev') {
            elem.innerHTML = e.value.replace(/\n/g, '<br/>');
        }
        else {
            elem.innerHTML = e.value;
        }
    }

    let imageArray = [];
    let originalImageArray = [];

    window.onload = function () {
        // setTimeout function
        setTimeout(function () {
            <?php
            if (isset($images)) {
                foreach ($images as $image) {
                    $pic = $image->Image;
                    echo "imageArray.push('$pic');";
                    echo "originalImageArray.push('$pic');";
                    echo "console.log(originalImageArray);";
                    echo "console.log(imageArray);";
                }
            }
            echo "imagePrev();";
            ?>
        }, 1000);
    }
    function imagePrev() {
        // map the imageArray to imageset-prev
        let imageSet = document.getElementById('imageset-prev');
        imageSet.innerHTML = "";
        changeImg(imageArray[0]);
        imageArray.forEach(element => {
            // console.log(element);
            let div = document.createElement('div');
            div.classList.add('col-3', 'h-100px');
            let img = document.createElement('img');
            img.src = '<?= BASEURL ?>/' + element;
            img.classList.add('shadow', 'border-rounded-more', 'fill-container', 'cursor-pointer');
            img.onclick = function () {
                changeImg(element);
            }
            div.appendChild(img);
            imageSet.appendChild(div);
        });
    }



    function selectDistrict() {
        let province = document.getElementById("province").value;
        fetch("<?= $base ?>/property/districtRest/" + province)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById("district");
                select.innerHTML = "";
                let option = document.createElement("option");
                option.value = "";
                option.text = "Select District";
                option.disabled = true;
                option.selected = true;

                select.add(option);
                data.forEach(element => {
                    let option = document.createElement("option");
                    option.value = element;
                    option.text = element;
                    select.add(option);
                });
            })
    }
    function selectCity() {
        let district = document.getElementById("district").value;
        fetch("<?= $base ?>/property/cityRest/" + district)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById("city");
                select.innerHTML = "";
                let option = document.createElement("option");
                option.value = "";
                option.text = "Select City";
                option.disabled = true;
                option.selected = true;
                select.add(option);
                data.forEach(element => {
                    let option = document.createElement("option");
                    option.value = element;
                    option.text = element;
                    select.add(option);
                });
            })
    }

    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginFileValidateSize);
    FilePond.create(document.getElementById('listingImages'), {
        server: '<?php echo BASEURL ?>/imageUpload/listingImages',
        files: [
            <?php
            if (isset($images)) {
                foreach ($images as $image) {
                    $pic = $image->Image;
                    echo '{';
                    echo 'source: "' . BASEURL . '/' . $pic . '",';
                    echo 'options: {';
                    echo 'type: "local"';
                    echo '}';
                    echo '},';
                }
            }
            ?>
        ],
    });

    document.getElementById('listingImages').addEventListener('FilePond:processfile', function (e) {
        originalImageArray.push(e.detail.file.file.name);
        console.log(originalImageArray);
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        imageArray.push(filepath);
        console.log(imageArray);
        if (filepath != null) {
            document.getElementById('imagePaths').value = imageArray;
            imagePrev();
        }
    });

    // delete file from array when clicking filepond close button
    document.getElementById('listingImages').addEventListener('FilePond:removefile', function (e) {
        //get the file name
        const removedFile = e.detail.file.file.name;
        console.log(removedFile);

        //find the index of the file name in the array
        const index = originalImageArray.indexOf(removedFile);
        console.log(index);
        //remove the file name from the array
        imageArray.splice(index, 1);
        originalImageArray.splice(index, 1);


        console.log(imageArray);
        console.log(originalImageArray);
        document.getElementById('imagePaths').value = imageArray;
        imagePrev();
    });

    function update(table, id, idvalue, k, value) {
        let v = document.getElementById(value).value;

        const data = {
            Table: table,
            Id: id,
            IdValue: idvalue,
            Key: k,
            Value: v,
        };
        doUpdate(data);
    }
    function updateRadio(table, id, idvalue, k, value) {
        var v = document.getElementsByName(value);
        for (var radio of v) {
            if (radio.checked) {
                val = radio.value;
                break;
            }
        }
        const data = {
            Table: table,
            Id: id,
            IdValue: idvalue,
            Key: k,
            Value: val,
        };
        doUpdate(data);
    }

    function doUpdate(data) {

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
                        title: 'Edited Successfully'
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            }).catch(function (error) {                        // catch
                console.log('Request failed', error);
            });
    };

    function updateImage() {
        const deldata = {
            Table: 'BoardingPlacePicture',
            Id1: 'BoardingPlace',
            IdValue1: '<?= $placeId ?>',
        };
        fetch("<?php echo BASEURL ?>/delete/", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(deldata)
        }).then(response => response.json())
            .then(json => {
                if (json.Status === 'Success') {
                    console.log('deleted Images');
                }
                else {
                    console.log('failed to delete Images');
                }
            }).catch(function (error) {                         
                console.log('Request failed', error);
            });

        const data = {
            PlaceId: <?= $placeId ?>,
            ImagePaths: document.getElementById('imagePaths').value,
        };

        fetch("<?php echo BASEURL ?>/property/editImage", {
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
                        title: 'Edited Successfully'
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            }).catch(function (error) {                        // catch
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