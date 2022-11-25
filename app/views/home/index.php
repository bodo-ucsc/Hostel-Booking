<?php
    $header = new HTMLHeader("Home");
    $nav = new Navigation("home");
    ?>

<main class=" home full-width full-height overflow-hidden ">
    <div class="row margin-left-5 full-height">
        <div class=" col-large-7 fill-container padding-left-5  ">
            <div class=" fill-container cover-text">Boarding?</div>
            <div class="margin-left-3">
                <?php
                    $search = new Search();
                    // $filter = new Filter();
                    // $sidebar = new SideBarNav("user","admin"); //pass the parameter to set active
                    ?>
            </div>
        </div>
        <div class="col-1"></div>

    </div>


</main>


<?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
?>