<?php

if (isset($data['PlaceId'])) {
    $PlaceId = $data['PlaceId'];
    $result = restAPI("listing/placeRest/$PlaceId");
    if (empty($result)) {
        header("Location: " . BASEURL . "/listing");
    }
} else {
    header("Location: " . BASEURL . "/listing");
}

$base = BASEURL;
new HTMLHeader("Listing | Place");
new Navigation("listing");



echo "<div class='navbar-offset full-width center'>";
new PropertyCard(
    $PlaceId
);


echo "</div>";
new HTMLFooter();
