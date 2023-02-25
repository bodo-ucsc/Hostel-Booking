<?php

$header = new HTMLHeader("Property");
$nav = new Navigation('management');
$sidebar = new SidebarNav("properties");



?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">

                <div class="col-12 col-medium-8 fill-container left"
                    onclick=" location.href='<?= BASEURL?>/property'">
                    <h1 class="header-1 black-hover cursor-pointer">

                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <?php
                        if (isset($data['id'])) {
                            $result = restAPI('property/getBoardingPlace/' . $data['id']);
                            if ($result != null) {
                                echo $result[0]->Name;
                            }
                        }
                        ?>
                    </h1>
                </div>
                <div class="col-12 col-medium-4 fill-container right">
                    <button class="bg-blue white border-rounded header-nb padding-3 right"
                        onclick="location.href='<?php echo BASEURL ?>/admin/addSupport/<?php echo $type ?>' ">
                        <i data-feather="plus" class=" vertical-align-middle "></i>
                        <span class="display-small-inline-block padding-left-2 display-none">Add Property</span>
                    </button>
                </div>
            </div>

            <div class="row margin-top-5 fill-container">
                <?php
                if ($result != null) {
                    foreach ($result as $key => $value) {
                        new viewPropertyCard($value); 
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