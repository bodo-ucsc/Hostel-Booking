<?php

class PropertyCard
{

    public function __construct($PlaceId, $feed = null, $PostId = null)
    {
        $base = BASEURL;
        if ($PlaceId == 'preview') {
            $PlaceId = 'preview';
            $SummaryLine1 = "Preview line 1";
            $SummaryLine2 = "Preview line 2";
            $SummaryLine3 = "Preview line 3";
            $Price = "x,xxx";
            $PriceType = "(per month)";
            $Street = "Street";
            $CityName = "City";
            $NoOfMembers = "Preview";
            $NoOfRooms = "Preview";
            $NoOfWashRooms = "Preview";
            $Gender = "Preview";
            $SquareFeet = "Preview";
            $PropertyType = "Preview";
            $BoarderType = "Preview";
            $Parking = "Preview";
            $vacancy = "X";
        } else {


            $result = restAPI("listing/placeRest/$PlaceId");
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
            $SquareFeet = $result->SquareFeet;
            $PropertyType = $result->PropertyType;
            $BoarderType = $result->BoarderType;
            $Parking = $result->Parking;

            $vacancy = $NoOfMembers - $Boarded;

            $Price = number_format($Price);

            $imageResult = restAPI("listing/imageRest/$PlaceId");
            if (isset($imageResult[0])) {
                $image = $imageResult[0]->Image;
            }
        }
        if (isset($feed)) {
            $feed5 = "col-large-5";
            $feed7 = "col-large-7";
            $def = "";
        } else {
            $feed5 = "";
            $feed7 = "";
            $def = "def";
            $PostId = $PlaceId;
        }

        if ($Parking == 'y') {
            $Parking = "Available";
        } else {
            $Parking = "Not Available";
        }
        if ($Gender == "M") {
            $Gender = "Male Only";
        } else if ($Gender == "F") {
            $Gender = "Female Only";
        } else {
            $Gender = "Any Gender";
        }
        if (!isset($image)) { 
            $image = "images/defboarding.png";
        }
        echo "   
        <div class='listing display-inline-block top  $def' onclick='window.location.href=\"$base/listing/viewPlace/$PlaceId \"'>
        <div class='row padding-4 '>
            <div class='col-12 shadow cursor-pointer bg-white-hover fill-container padding-3 border-rounded-more'>
                <div class='row'>

                <div class='col-12 $feed5 fill-container property-image fill-vertical padding-5 '>
                    <img id='image-$PostId'  src='$base/$image' class='fill-container fill-vertical border-rounded-more img-cover' alt=''>
                    <div class='flex  margin-top-n4'>
                        <div class='bg-light-grey border-rounded-more shadow '>
                            <button id='vacancy-$PostId' class='border-circle shadow bg-accent padding-horizontal-3 padding-vertical-2 white display-inline-block'>$vacancy</button> 
                            <button class='border-rounded padding-2 bg-light-grey  display-inline-block'> vacancies</button> 
                        </div>
                    </div>
                </div>

                <div class='col-12 $feed7 fill-container padding-3 '>
                    <div class='row'>
                        <div id='city-$PostId' class='col-8 header-2 fill-container left'>
                            $CityName
                        </div>
                        <div class='col-4 big bold fill-container right'>
                            <i data-feather='star' class='fill-black vertical-align-middle'></i>
                            <span id='rating-$PostId' class=' vertical-align-middle'>4.5</span>
                        </div>
                    </div>
                    <div class='row'>
                        <div id='address-$PostId' class='col-12 fill-container left small grey'>
                            $Street, $CityName
                        </div>
                    </div>
                    <div class='table padding-vertical-2 margin-top-2'>
                        <div class='hs less'>
                            <div title='No. of Members' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='users' class='accent'></i></span>
                                <span id='members-$PostId' class=' display-block center'>$NoOfMembers Members</span>
                            </div>
                            <div title='Property Type' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='shopping-bag' class='accent'></i></span>
                                <span id='propertytype-$PostId' class=' display-block center'>$PropertyType</span>
                            </div>
                            <div title='No. of Rooms' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='archive' class='accent'></i></span>
                                <span id='rooms-$PostId' class=' display-block center'>$NoOfRooms Rooms</span>
                            </div>
                            <div title='No. of Washrooms' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='grid' class='accent'></i></span>
                                <span id='washrooms-$PostId' class=' display-block center'>$NoOfWashRooms Washroom</span>
                            </div>
                            <div title='Gender' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='user' class='accent'></i></span>
                                <span id='gender-$PostId' class=' display-block center'>$Gender</span>
                            </div>
                            <div title='Type of Tenant' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='briefcase' class='accent'></i></span>
                                <span id='boardertype-$PostId' class=' display-block center'>$BoarderType</span>
                            </div>
                            <div title='Square Feet' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='shuffle' class='accent'></i></span>
                                <span id='squarefeet-$PostId' class=' display-block center'>$SquareFeet Sq.Ft</span>
                            </div>
                            <div title='Parking availability'
                                class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='navigation' class='accent'></i></span>
                                <span id='parking-$PostId' class=' display-block center'>$Parking</span>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container left  grey'>
                            <ul>
                                <li id='summary1-$PostId'>$SummaryLine1</li>
                                <li id='summary2-$PostId'>$SummaryLine2</li>
                                <li id='summary3-$PostId'>$SummaryLine3</li>

                            </ul>
                        </div>
                    </div>
                    <div class='row no-gap'>
                        <div class='col-12 fill-container left  '>
                            <div id='price-$PostId' class='display-inline-block big vertical-align-middle'>
                                Rs. $Price
                            </div>
                            <div id='priceType-$PostId' class='display-inline-block small vertical-align-middle'>
                                ($PriceType)
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        </div>
        ";

    }
}