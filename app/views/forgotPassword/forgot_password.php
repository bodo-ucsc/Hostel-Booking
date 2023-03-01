<?php
$header = new HTMLHeader("Forgot Password");
//$nav = new Navigation("home");
?>
<main class=" full-width overflow-hidden position-absolute">
    <div class="row">
        <div class="col-12 bg-white flex full-height">
            <div class="shadow border-rounded-more padding-5">
                <div class="row">
                    <div class="col-12">
                        <img class=" fill-container " src="<?php echo BASEURL . '/public/images/logo.svg' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-2 flex">Recover Your Password</h2>
                        <P>Please enter the email address you used to sign up on this site.</P>
                        <P>OTP will be sent to this email address.</P>

                        <?php
                        ?>
                        <form action="<?php echo BASEURL ?>/forgotpassword/Check" method="post">
                            <label for="email" class="bold black">Email</label><br>
                            <input type="email" id="email" name="email" placeholder="Enter Email" required><br>

                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded "
                                type="submit" name="submit" value="Send Link"><br><br>
                            <a onclick="window.history.back()" class=" cursor-pointer flex">Back</a>
                        </form>
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