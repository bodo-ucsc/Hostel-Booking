<?php

class ViewCardProperty
{
    public function __construct($placeid,  $city = null, $houseNo = null, $street = null, $imgLink = null, $noofmembers = null)
    {
        $address = "$houseNo, $street, $city";
        $base = BASEURL;

        echo "
            <div class=' padding-2 col-large-4 col-medium-6 col-12'>
            <div class='border-rounded padding-2 padding-bottom-4 shadow center'>
            
        ";

        if (isset($imgLink)) {
            echo "
                <img  class='fill-container border-rounded padding-5' src = $imgLink >
            ";
        } else {
            echo "
                <img class='fill-container border-rounded padding-5' src = $base/public/images/randomboardinghouse.png >
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

        if (isset($noofmembers)) {
            echo "
                <div class=' grey small margin-top-2'> $noofmembers Boarders</div>
            ";
        }

        echo "
            <button class=' bg-white border-1 border-black white-hover margin-top-3 border-rounded-more'><a class=' black' href= $base/boardingOwner/viewABoardingPlace/$placeid>View Property</a></button>
            </div>
            </div>
        ";
    }
}