<?php

$header = new HTMLHeader("Property");
$nav = new Navigation('management');
$sidebar = new SidebarNav("properties");


$result = restAPI('property/getBoardingOwner');

?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">

                <div class="col-6 fill-container left">
                    <h1 class="header-1 ">
                        Property Owners
                    </h1>
                </div>
                <div class="col-6 fill-container right">
                    <span class='header-nb'>
                        <?php if ($result != null) {
                            echo count($result)." ";
                        } else {
                            echo "0 ";
                        } ?>
                        Owners
                    </span>
                </div>
            </div>

            <div class="row margin-top-5 fill-container">
                <?php
                $result = restAPI('property/getBoardingOwner');
                if ($result != null) {
                    foreach ($result as $key => $value) {
                        new ownerCard($value);
                    }
                } else {
                    echo "<h2 class='text-center'>No Post Found</h2>";
                }
                ?>

            </div>

        </div>
    </div>
</main>


        <?php
        if (isset($data['alert'])) {
            $footer = new HTMLFooter($data['alert'], $data['message']);
        } else {
            $footer = new HTMLFooter();
        }
        ?>