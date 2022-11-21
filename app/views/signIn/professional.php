<?php
$header = new HTMLHeader("Login | Professional");
$nav = new Navigation("home");
?>

<main class=" full-width overflow-hidden  position-absolute ">
    <div class="row full-height ">
        <div class="col-3 "></div>
        <div class="col-6 full-height padding-vertical-3 padding-horizontal-5 shadow  ">
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
                    <form style="">
                        <label for="username" class="bold black">Username</label><br>
                        <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                        <label for="password" class="bold black">Password</label><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password">
                        <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded "
                            type="button" value="Sign In"><br>
                        <p>Don't have an account? <a class="inverse" href="#">Register</a> </p>
                    </form>
                </div>

            </div>

        </div>

    </div>
</main>

<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>