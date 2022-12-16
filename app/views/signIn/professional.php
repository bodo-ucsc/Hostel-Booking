<?php
$header = new HTMLHeader("Sign In | Professional");
$nav = new Navigation();
?>

<main class=" full-width  ">
    <div class="row full-height ">
        <div class=" display-none display-medium-block col-medium-3 col-large-4 "></div>
        <div
            class="col-12 col-medium-6 col-large-4 fill-container full-height navbar-offset padding-horizontal-5 shadow  ">

            <div class=" row">
                <div class=" col-12">
                    <img class=" fill-container " src="<?php echo BASEURL . '/public/images/logo.svg' ?>">
                </div>
            </div>
            <div class=" row">
                <div class=" col-12">
                    <img class=" fill-container " src="<?php echo BASEURL . '/public/images/professionalSignIn.svg' ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="header-2">Professional Sign In</h2>
                    <form action="<?php echo BASEURL ?>/signin/professionalLogin" method="post">
                        <label for="username" class="bold black">Username</label><br>
                        <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                        <label for="password" class="bold black">Password</label><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password">
                        <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded "
                            type="submit" value="Sign In"><br>
                        <p class="center  ">
                            Forgot Password?
                            <a class="inverse" href="<?php echo BASEURL ?>/forgotPassword">Reset
                                Password</a>
                            <br>
                            Don't have an account?
                            <a class="inverse" href="<?php echo BASEURL ?>/register/professional">Register</a>
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