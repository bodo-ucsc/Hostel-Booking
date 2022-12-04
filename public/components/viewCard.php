<?php

class ViewCard
{
    public function __construct($placeid,  $city = null, $address = null, $boarderCount = null, $imgLink = null, $noofmembers = null)
    {

        $base = BASEURL;

        echo "
            <div class=' viewcard'>
        ";

        if (isset($imgLink)) {
            echo "
                <img width = '300px' class='margin-3 border-rounded' src = $imgLink >
            ";
        } else {
            echo "
                <img width = '300px' class='margin-3 border-rounded' src = $base/public/images/randomboardinghouse.png >
            ";
        }

        if (isset($city)) {
            echo "
                <div class=' header-1 margin-top-2'>$city</div>
            ";
        }

        if (isset($address)) {
            echo "
                <div class=' grey margin-top-2'>$address</div>
            ";
        }

        if (isset($boarderCount) && isset($noofmembers)) {
            echo "
                <div class=' grey small margin-top-2'>$boarderCount / $noofmembers Boarders</div>
            ";
        }

        echo "
            <button class=' bg-white border-1 border-black white-hover margin-top-3 border-rounded-more'><a href= $base/boardingOwner/viewABoardingPlace?placeid=$placeid>View Property</a></button>
            </div>
        ";
    }
}