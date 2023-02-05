<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("Friends");
$base = BASEURL;

?>

<main class="navbar-offset full-width full-height">
    <div class="row">
        <div class="col-2">
        <?php 
                    $search = new Searchfriends();
                    // $filter = new Filter();
                    // $sidebar = new SideBarNav("user","admin"); //pass the parameter to set active
                    ?>
            

        </div>
        <div class="col-10">
        <?php 
                    $search = new SearchPeopleYouMayKnow();
                    // $filter = new Filter();
                    // $sidebar = new SideBarNav("user","admin"); //pass the parameter to set active
                    ?>

        </div>
    </div>
</main>
