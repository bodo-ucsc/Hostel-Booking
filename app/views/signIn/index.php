<?php
$header = new HTMLHeader("Sign In");
$nav = new Navigation();
?>


<main class=" full-width overflow-hidden position-absolute">
    <div class="row full-height ">
        <div class=" display-none display-small-inline-block col-small-7  bg-light-grey   full-height">
            <div class=" padding-5  vertical-align-middle flex full-height ">
                <img class="  width-90 vertical-align-middle " src="<?php echo BASEURL . '/public/images/signin.svg' ?>">
            </div>
        </div>
        <div class="col-small-5 col-12  bg-white flex full-height">
            <div>
                <h2 class="header-2">Sign In</h2>
                <form action="<?php echo BASEURL ?>/signin/login" method="post">
                    <label for="username" class="bold black">Username or Email</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                    <label for="password" class="bold black">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter Password">
                    <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit"
                        value="Sign In"><br>
                    <div class="center padding-top-3 ">
                        Forgot Password?
                        <a class="inverse" href="<?php echo BASEURL ?>/forgotPassword">Reset
                            Password</a>
                        <br>
                    </div>
                    <div class="center  ">
                        No account?
                        <a class="inverse" href="<?php echo BASEURL ?>/Register">Register</a>
                        <br>
                    </div>
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