<?php
    $header = new HTMLHeader("Home");
    $nav = new Navigation("home");
    ?>

<main class=" home full-width full-height overflow-hidden ">
    <div class="row  no-gap margin-medium-left-5 margin-horizontal-3 full-height">
    <div class="display-block  display-small-none"></div>

        <div class=" col-large-7 col-medium-9 col-12 fill-container padding-horizontal-3  ">
            <div class="fill-container cover-text">Boarding?</div> 
            <div class="margin-medium-left-3">
                <?php 
                    $search = new Search();
                    // $filter = new Filter();
                    // $sidebar = new SideBarNav("user","admin"); //pass the parameter to set active
                    ?>
            </div>
        </div>
        <div class="fill-container padding-5 display-block  display-small-none"></div>
        <div class="col-small-1 "></div>

    </div>


</main>


<?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
?>
