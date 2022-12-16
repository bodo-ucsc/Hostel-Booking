<?php
$header = new HTMLHeader("Sign In | Boarding Owner");
$nav = new Navigation();
?>
<main class="full-width full-height">
    <div class="row fill-container full-height">
        <div class=" display-none display-medium-block col-12 col-medium-2 col-large-3"></div>
        <div class="col-12 col-medium-8 col-large-6 padding-5 fill-container shadow border-rounded-more">
            <div class="row padding-2 ">
                <div class="display-none display-small-block col-12 col-small-6  fill-container center border-right-1 ">
                    <img class="fill-vertical " src="<?php echo BASEURL . '/public/images/boardingOwner.svg' ?>">
                </div>
                <div class="col-12 col-small-6  ">
                    <p class="header-2">Boarding Owner Sign In</p>
                    <form action="<?php echo BASEURL ?>/signin/boardingOwnerLogin" method="post">
                        <label for="username">Username<label><br>
                                <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                                <label for="password">Password</label><br>
                                <input type="password" id="password" name="password" placeholder="Enter password">
                                <input class="bg-blue-hover white-hover border-rounded fill-container" type="submit"
                                    value="Sign In"><br>
                                <p class="center  ">
                                    Forgot Password?
                                    <a class="inverse" href="<?php echo BASEURL ?>/forgotPassword">Reset
                                        Password</a>
                                    <br>
                                    Don't have an account?&nbsp;<a class="inverse"
                                        href="<?php echo BASEURL ?>/register/boardingOwner">Register</a>
                                </p>
                    </form>
                </div>
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