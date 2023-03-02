<?php

new HTMLHeader("Search | Place");
new Navigation("listing");
$base = BASEURL;
?>

<div class='navbar-offset full-width'>
    <div class='row full-width margin-bottom-4'>
        <div class='col-12'>
            <?php
            $search = new Search(); ?>
        </div>
    </div>
    <?php
    if ($data) {
        $resultCount = $data['resultCount'];
        $searchText = $data['searchText'];
    }
    echo "
        <div class='row full-width'>
            <span class='col-12 grey'>
                Search result for '" . $searchText . "'<br>
                There are " . $resultCount . " results found!!!
            </span>
        </div>";

    if ($resultCount > 0) {

        echo "<div class='center'>";
        while ($row = $data['result']->fetch_assoc()) {

            $PlaceId = $row['PlaceId'];
            //echo $PlaceId;
            //new PropertyCard($PlaceId);

            // echo "place id= ".$row['PlaceId']."<br>";
            // echo $row['Title']."<br>";
            // echo $row['Description']."<br>";
            // echo $row['Price']."<br>";
            // echo $row['PriceType']."<br>";
            // echo $row['Street']."<br>";
            // echo $row['CityName']."<br>";
            // echo $row['NoOfMembers']."<br>";
            // echo $row['NoOfRooms']."<br>";

        }
    }

    echo "</div>";
    echo "
</div>";
    new HTMLFooter();
