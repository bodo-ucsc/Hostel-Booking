<?php
$header = new HTMLHeader("Login | Student");
$nav = new Navigation("home");
?>


<main class=" full-width position-absolute">
    <div class="row full-height">
        <div
            class="display-none display-small-block col-small-6 col-12 col-medium-8 bg-light-grey  fill-container center full-height">
            <div class="row full-height">
                <div class="col-1"></div>
                <div class="cursor-pointer col-3 fill-container bg-white-hover center padding-5 shadow border-rounded-more"
                    onclick="location.href = '<?php echo BASEURL ?>/signin/professional'">
                    <img class=" max-height-270 fill-container "
                        src="<?php echo BASEURL . '/public/images/professionalSignIn.svg' ?>">
                    <button class="big fill-container bg-transparent border-1 border-rounded">Professional</button>
                </div>
                <div class="zindex  col-4 fill-container bg-accent center padding-5 shadow border-rounded-more">
                    <img class=" fill-container max-height-300 "
                        src="<?php echo BASEURL . '/public/images/studentSignIn.svg' ?>">
                    <button class="big accent fill-container border-rounded">Student</button>
                </div>
                <div class="cursor-pointer col-3 fill-container bg-white-hover center padding-5 shadow border-rounded-more"
                    onclick="location.href = '<?php echo BASEURL ?>/signin/boardingOwner'">
                    <img class=" max-height-270 fill-container "
                        src="<?php echo BASEURL . '/public/images/boardingOwnerSignIn.svg' ?>">
                    <button class="big fill-container bg-transparent border-1 border-rounded">Boarding Owner</button>
                </div>
            </div>

        </div>

        <div class="col-small-6 col-12 col-medium-4  bg-white flex full-height">
            <div>
                <h2 class="header-2">Student Sign In</h2>
                <form action="<?php echo BASEURL ?>/signin/studentLogin" method="post">
                    <label for="username" class="bold black">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                    <label for="password" class="bold black">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter Password">
                    <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit"
                        value="Sign In"><br>
                    <p class="center  ">
                        Forgot Password?
                        <a class="inverse" href="<?php echo BASEURL ?>/forgotPassword">Reset
                            Password</a>
                        <br>Don't have an account? <a class="inverse"
                            href="<?php echo BASEURL ?>/register/student">Register</a>
                    </p>
                </form>
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
