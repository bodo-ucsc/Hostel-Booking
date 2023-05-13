<?php

class viewPropertyCard
{
    public function __construct($value)
    {
        $id = $value->PlaceId;
        $PictureLink = $value->PictureLink;
        if (isset($PictureLink)) {
            $PictureLink = BASEURL . "/$PictureLink";
        } else {
            $PictureLink = BASEURL . "/images/defboarding.png";
        }
        $CityName = $value->CityName;
        $Address = $value->Address;
        $NoOfMembers = $value->NoOfMembers;
        $Boarded = $value->Boarded;

        echo "
        <div class='col-small-6 col-large-4 padding-2 col-12 shadow fill-container border-rounded-more overflow-hidden'>
            <img class='fill-container border-rounded-more  ' src='$PictureLink' alt=''>
        
            <div class='col-12 center fill-container padding-bottom-4'>
                <div class=' padding-vertical-2'>
                    <span class='header-2'>$CityName</span>
                    <br />
                    <span class=''>$Address</span>
                </div>
                <div class=' padding-vertical-2'>
                    <span class='small'>$Boarded / $NoOfMembers Boarded</span>
                    <br /> 
                </div>
                <button class='bg-white-hover border-1 border-rounded-more' onclick='location.href=\"".BASEURL."/property/manage/".$id."\"'> View Property</button>
            </div>
        </div>
        ";
    }
}

?>