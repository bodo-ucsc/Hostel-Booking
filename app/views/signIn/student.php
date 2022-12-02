<?php
$header = new HTMLHeader("Login | Student");
$nav = new Navigation("home");
?>


<main class=" full-width overflow-hidden position-absolute">
        <div class="row full-height">
             <div class="display-none display-small-block col-small-6 col-12 col-medium-8 bg-light-grey  fill-container center full-height">
                            <div class=" vertical-align-bottom fill-vertical padding-5 margin-top-5">
                                <img class=" vertical-align-bottom fill-container fill-vertical" src="<?php echo BASEURL . '/public/images/studentSignIn.svg' ?>">
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
                        <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded "
                            type="submit" value="Sign In"><br>
                        <p>Don't have an account? <a class="inverse" href="<?php echo BASEURL ?>/register/student">Register</a> </p>
                    </form>
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