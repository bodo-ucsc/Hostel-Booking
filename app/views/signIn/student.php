<?php
$header = new HTMLHeader("Login | Student");
$nav = new Navigation("home");
?>


<main class=" full-width position-absolute">
    <div class="row full-height">
        <div class="col-6 bg-light-grey flex">
            <img class="login-img" src="student-login.png">
        </div>
        <div class="col-6 bg-white flex">
            <p style="">Student Sign In</p>
            <form style="">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                <label for="pwd">Password:</label><br>
                <input type="password" id="pwd" name="pwd" placeholder="Enter Password">
                <input class="sign-in-button" type="button" value="Sign In"><br>
                <p style="display: inline-block; font-size: 12px; padding-left: 2.5em;">Don't have an account?&nbsp;
                </p><a class="register-link" href="#">Register</a>
            </form>


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
