<?php
$header = new HTMLHeader("Sign In | Admin");
$nav = new Navigation();
?>

<main class=" full-width overflow-hidden position-absolute">
    <div class="row ">
        <div class="col-12  bg-white flex full-height">
            <div class="shadow padding-5">
                <div class="row">
                    <div class="col-12">
                        <img class=" fill-container " src="<?php echo BASEURL . '/public/images/logo.svg' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-2">Admin Sign In</h2>
                        <form action="<?php echo BASEURL ?>/signin/adminLogin" method="post">
                            <label for="username" class="bold black">Username</label><br>
                            <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                            <label for="password" class="bold black">Password</label><br>
                            <input type="password" id="password" name="password" placeholder="Enter Password">
                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" value="Sign In"><br><br>
                            <a href="<?php echo BASEURL ?>/forgotpassword" class="flex">Forgot Password?</a>
                        </form>
                    </div>
                </div>
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