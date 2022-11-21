<?php
$header = new HTMLHeader("Test");
$nav = new Navigation("home");
$sidebar = new SideBarNav("user", "admin"); //pass the parameter to set active                  
?>

<main class=" home full-width full-height overflow-hidden ">
    <div class="row sidebar-offset full-height">
        <div class=" col-large-10 fill-container padding-left-5  ">
            <div class=" fill-container cover-text">Boarding?</div>
            <div class="margin-left-3">
                <?php
                    $search = new Search();
                    ?>
            </div>
        </div>
        <div class="col-12 border-1 border-accent fill-container flex">Hi</div>
    </div>

</main>


<?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
?>