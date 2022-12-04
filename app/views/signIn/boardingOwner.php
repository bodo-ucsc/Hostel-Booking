<?php
$header = new HTMLHeader("Sign In | Boarding Owner");
$nav = new Navigation("home");
?>
<main class="navbar-offset flex">
    <div class="justify-content margin-5">
        <div class="row width-90 margin-vertical-5 shadow border-rounded">
            <div class="col-6">
                <img height="400px" src="<?php echo BASEURL . '/public/images/verificationSignIn.svg' ?>">
            </div>
            <div class="col-6">
                <p class="header-2">Boarding Owner Sign In</p>
                <form action="boardingOwnerLogin" method="post">
                    <label for="username">Username<label><br>
                    <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter password">
                    <input class="sign-in-button" type="submit" value="Sign In"><br>
                    <p >Don't have an account?&nbsp;</p> <a class="inverse"
                            href="<?php echo BASEURL ?>/register/boardingOwner">Register</a> </p>               
                </form> 
            </div>        
        </div>
     </div>
</main>