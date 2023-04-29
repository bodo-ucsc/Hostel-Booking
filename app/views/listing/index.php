<?php

new HTMLHeader("Listing | Place");
new Navigation("listing");
$base = BASEURL;
?>

<div class='navbar-offset full-width center'>
    <div class='row full-width margin-bottom-4'>
        <div class='col-12'>
            <?php
            $search = new Search("true");
            ?>
        </div>
    </div>

    <?php

    if ($data) {
        echo "<div class='center'>";
        while ($row = $data['result']->fetch_assoc()) {
            new PropertyCard(
                $row['PlaceId']
            );
        }
    } else {
        echo "<h1 class='text-center'>No Post Found</h1>";
    }

    echo "</div>";

new HTMLFooter();
?>