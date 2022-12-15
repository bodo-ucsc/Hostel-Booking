<?php

class ViewCard
{
    
    public function __construct($FirstName, $LastName, $UserType, $ProfilePicture, $PostId, $DateTime, $Caption, $SummaryLine1, $SummaryLine2, $SummaryLine3, $Price, $PriceType, $Street, $CityName, $NoOfMembers, $NoOfRooms, $NoOfWashRooms, $Gender, $BoarderType, $SquareFeet, $Parking, $showComment = null)
    {
        $base = BASEURL;

        if ($UserType == "BoardingOwner") {
            $UserType = "Owner";
        } else {
            $UserType = ucfirst($UserType);
        }
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
        $Price = number_format($Price);
        $base = BASEURL;
        echo "
    <div class='advert shadow bg-white border-rounded-more padding-3 display-inline-block'>
    <div class='row no-gap vertical-align-middle'>
        <div class=' padding-2'>";
        if ($ProfilePicture == null) {
            echo "<img src='https://ui-avatars.com/api/?background=288684&color=fff&name=$FirstName+$LastName' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
        } else {
            echo "<img src='$base/$ProfilePicture' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
        }
        echo " </div>
        <div class='col-11 fill-container left margin-left-2'>
            <div class='row no-gap'>
                <div class='col-12 fill-container left  '>
                    <div class='display-inline-block big vertical-align-middle'>
                        $FirstName $LastName
                    </div>
                    <div
                        class='display-inline-block border-rounded-more shadow   padding-1 margin-left-2 vertical-align-middle'>
                        <i data-feather='award'
                            class='feather-body vertical-align-middle bg-accent white border-circle padding-2'></i>
                        <span class='small vertical-align-middle padding-2'>$UserType</span>
                    </div>

                </div>
                <div class='col-12 fill-container left'>";
        $timestamp = strtotime($DateTime);
        echo date("M d, Y h.i A", $timestamp);
        echo "</div>
            </div>
        </div>
    </div>
    <div class='row padding-2'>
        <div class='col-12 fill-container left'>
            $Caption
        </div>
    </div>
    <div class='row padding-4 '>
        <div class='col-12 shadow fill-container padding-3 border-rounded-more'>
            <div class='row'>
                <div class='col-12 col-large-5 fill-container property-image fill-vertical '>
                    <img src='https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/brewster-mcleod-architects-1486154143.jpg'
                        class='fill-container fill-vertical  border-rounded-more' alt=''>
                </div>

                <div class='col-12 col-large-7 fill-container padding-3 '>
                    <div class='row'>
                        <div class='col-8 header-2 fill-container left'>
                            $CityName
                        </div>
                        <div class='col-4 big bold fill-container right'>
                            <i data-feather='star' class='fill-black vertical-align-middle'></i>
                            <span class=' vertical-align-middle'>4.5</span>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container left small grey'>
                            $Street, $CityName
                        </div>
                    </div>
                    <div class='table padding-vertical-2 margin-top-2'>
                        <div class='hs less'>
                            <div title='No. of Members' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='users' class='accent'></i></span>
                                <span class=' display-block center'>$NoOfMembers Members</span>
                            </div>
                            <div title='No. of Rooms' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='archive' class='accent'></i></span>
                                <span class=' display-block center'>$NoOfRooms Rooms</span>
                            </div>
                            <div title='No. of Washrooms' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='grid' class='accent'></i></span>
                                <span class=' display-block center'>$NoOfWashRooms Washroom</span>
                            </div>
                            <div title='Gender' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='user' class='accent'></i></span>
                                <span class=' display-block center'>$Gender</span>
                            </div>
                            <div title='Type of Tenant' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='briefcase' class='accent'></i></span>
                                <span class=' display-block center'>$BoarderType</span>
                            </div>
                            <div title='Square Feet' class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='shuffle' class='accent'></i></span>
                                <span class=' display-block center'>$SquareFeet Sq.Ft</span>
                            </div>
                            <div title='Parking availability'
                                class='col-2 center fill-container left small grey'>
                                <span class='display-block center'>
                                    <i data-feather='navigation' class='accent'></i></span>
                                <span class=' display-block center'>$Parking</span>
                            </div>








                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container left  grey'>
                            <ul>
                                <li>$SummaryLine1</li>
                                <li>$SummaryLine2</li>
                                <li>$SummaryLine3</li>

                            </ul>
                        </div>
                    </div>
                    <div class='row no-gap'>
                        <div class='col-12 fill-container left  '>
                            <div class='display-inline-block big vertical-align-middle'>
                                Rs. $Price
                            </div>
                            <div class='display-inline-block small vertical-align-middle'>
                                ($PriceType)
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class='row padding-2'>
        <!-- like, comment, share buttons -->
        <div class='col-4 fill-container'>
            <button class='button bold fill-container bg-white-hover black-hover border-rounded-more shadow '>
                <i data-feather='thumbs-up' class='vertical-align-middle'></i>
                <span class='display-none display-large-inline-block vertical-align-middle'>Like</span>
            </button>
        </div>
        <div class='col-4 fill-container'>
            <button class='button bold fill-container bg-white-hover black-hover border-rounded-more shadow ' onclick='location.href=\"$base/feed/viewPost/$PostId\"'>
                <i data-feather='message-circle' class='vertical-align-middle'></i>
                <span class='display-none display-large-inline-block vertical-align-middle'>Comment</span>
            </button>
        </div>
        <div class='col-4 fill-container'>
            <button class='button bold fill-container bg-white-hover black-hover border-rounded-more shadow '>
                <i data-feather='share-2' class='vertical-align-middle'></i>
                <span class='display-none display-large-inline-block vertical-align-middle'>Share</span>
            </button>
        </div>
    </div>";
        if (isset($showComment)) {
            echo "<div class='margin-top-3 row bg-light-grey border-rounded padding-vertical-4 padding-horizontal-3'>";

            $url = "$base/feed/commentRest/$PostId";
            $client = curl_init($url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($client);
            $result = json_decode($response);

            foreach ($result as $key => $value) {
                $comment = new comment($value->FirstName, $value->LastName, $value->DateTime, $value->Comment);
            }

            echo "</div>";


            echo "<form action= '$base/Feed/addComment' method='post'>
            <div class='row '>
                <div class='col-10 fill-container'>
                    <input type='text' class='vertical-align-middle fill-container margin-top-4' id='comment' name='comment'
                    placeholder='Your Message' required>
                </div>
                <div class='col-2 fill-container'>
                    <button role='submit' class='border-rounded vertical-align-middle fill-container bg-blue-hover white-hover'>
                      <i data-feather='send' class='feather-body'></i>
                    </button>
                </div>
            </div>
            <input type='hidden' id='postid' name='postid' value=$PostId>
            </form>";
        }
        echo "</div>";
    }
}