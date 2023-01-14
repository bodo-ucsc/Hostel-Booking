<?php

class likeSection
{
    public function __construct($PostId, $likes = null, $commentCount = 0)
    {
        $base = BASEURL;

        $likedArray = array();
        if (!empty($likes)) {
            foreach ($likes as $key => $value) {
                if ($value->Reaction == "y") {
                    array_push($likedArray, "$value->FirstName $value->LastName");
                }
            }
        }
        $likeCount = count($likedArray);
        $ltext = "Likes";
        if ($likeCount == 1) {
            $ltext = "Like";
        }

        $ctext = "Comments";
        if ($commentCount == 1) {
            $ctext = "Comment";
        }
        echo "
            <div class='row no-gap padding-2 margin-bottom-2  '>
                <div class='col-12 fill-container '> 
                    <div class='row no-gap padding-horizontal-4 padding-vertical-2 bg-white shadow-small border-rounded-more cursor-pointer'>

                            <div class='col-6 dropdown padding-horizontal-4 padding-vertical-2 fill-container '>
                                <a class='  bg-white left fill-container '><div class='fill-container'> <span id='like-count-post-$PostId'>$likeCount</span> $ltext </div></a>

                                <div class='dropdown-content '>";
        foreach ($likedArray as $key => $value) {
            echo "<div class=' left padding-left-4 padding-2  '>$value</div>";
        }
        echo "
                                </div> 
                            </div>  
                            <div class='col-6 fill-container padding-horizontal-4 padding-vertical-2'>
                                <a class=' bg-white right fill-container ' onclick='location.href=\"$base/feed/viewPost/$PostId\"'><div class='fill-container'> $commentCount $ctext </div></a>
                            </div> 
                        </div>
                    </div>
                </div>
        ";

    }
}