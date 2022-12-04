<?php
    $header = new HTMLHeader("Home");
    $nav = new Navigation("home");
    ?>

    <main>
        <div class="container padding-top-5">
            <div class="padding-top-5">
                Hello

                <?php

                session_start();

                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    echo ' <br><a href="' . BASEURL . '/home/signout">Sign Out</a>  <br>';
                } else {
                    echo '<br>You are not signed in';
                    echo '<br><a href="<?php echo BASEURL ?>/signin/admin">click to sign in</a></br>';
                }

                ?>
                <main class=" home full-width full-height overflow-hidden ">
                    <div class="row margin-left-5 full-height">
                        <div class=" col-large-7 fill-container padding-left-5  ">
                            <div class=" fill-container cover-text">Boarding?</div>
                            <div class="margin-left-3">
                                <?php
                                $search = new Search();
                                $filter = new Filter();
                                $sidebar = new SideBarNav("user", "admin"); //pass the parameter to set active
                                ?>
                            </div>
                        </div>
                        <div class="col-1"></div>

                    </div>


                </main>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
                <script>
                    feather.replace()
                </script>
</body>
<!-- <main class=" home full-width full-height overflow-hidden ">
    <div class="row margin-left-5 full-height">
        <div class=" col-large-7 fill-container padding-left-5  ">
            <div class=" fill-container cover-text">Boarding?</div>
            <div class="margin-left-3">
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
