<?php
$header = new HTMLHeader("MyBoarding | Professional");
$nav = new Navigation("home");

if (isset($_SESSION["username"])) {
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
   
?>

    <main class=" full-width full-height overflow-hidden ">

        <div class=" row sidebar-offset full-height ">
            <div class=" col-5 bg-white flex shadow border-rounded  position-absolute padding-5 ">
                <div>

                    <div class="header-1">Dashboard</div>

                    <h2>Hello <?php echo $_SESSION["username"] ?> </h2>

                    <button><a href="<?php echo BASEURL ?>/myboarding/leave/<?php echo $userid?>">Leave Boarding</a></button>

                <?php } else { ?>

                    <div class=" full-width overflow-hidden ">

                        <div class=" row full-height ">
                            <div class=" col-5 bg-white flex shadow border-rounded  position-absolute padding-5 ">
                                <div>
                                    <P>Please Sign In first</P>
                                    <P><button><a href="signin/professional">Sign In </a></button></P>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
                </div>
            </div>
        </div>

    </main>


    <body>
        <style type="text/css">
            @import url("public/styles/styles1.css");
        </style>
        <input type="checkbox" id="show">

        <label for="show" class="show-btn">Leave Boarding</label>

        <div class="container">

            <div class="row full-height">
                <div class="col-3 "></div>
                <div class="col-6 full-height padding-vertical-3 padding-horizontal-5 shadow  ">
                    <div class=" row">
                        <div class=" col-12">
                            <!-- <img class=" fill-container " src="logo.svg"> -->
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <img class=" fill-container " src="<?php echo BASEURL . '/public/images/logo.svg' ?>">
                        </div>
                    </div>
                    <!-- <div class=" row">
                    <div class=" col-12">
                        <img class=" fill-container " src="professionalSignIn.svg">
                    </div>
                </div> -->
                    <div class="row">
                        <div class="col-12">
                            <h1 class="header-1">Thank you for Boarding with BODO!</h1>
                            <!-- <hnb class="header-nb">We hope you enjoyed your stay at Kirulapone!!</hnb> -->
                            <div class="header-nb">
                                <p>We hope you enjoyed your stay at Kirulapane!!</p>
                            </div>
                            <h2 class="header-2">Please consider rating and providing a review about your boarding
                                experience!</h2>

                            <form action="<?php echo BASEURL . '/boardingplace/addReview' ?>" method="post">
                                <label for="review" class="bold black">How was your experience?</label><br>
                                <input type="text" id="review" name="review" placeholder="Describe your experience at Kirulapone"><br>
                                <label for="review" class="bold black">Give Rate</label><br>
                                <select name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select><br><br>

                                <!-- <input class=" bg-red-hover white-hover  bold padded border-rounded " type="submit" value="Cancel"> -->
                                <!-- <button type="button" input class="bg-red-hover white-hover  bold padded border-rounded">
                                <label for="show">Cancel</label>
                            </button> -->
                                <input class=" bg-red-hover white-hover bold padded border-rounded" type="submit" name="cancel" value="Cancel">
                                <input class=" bg-red-hover white-hover bold padded border-rounded" type="submit" name="withoutReview" value="Leave without review">
                                <input class=" bg-blue-hover  white-hover bold padded border-rounded" type="submit" name="withReview" value="Submit review & leave">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
    ?>