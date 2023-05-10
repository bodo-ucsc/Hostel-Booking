<?php
$header = new HTMLHeader("Password Mesaage");

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
                <?php
                $row = $data['info'];

                ?>
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-2 flex">OTP Verification</h2>
                        <P>
                            An OTP has been sent to your email address to reset your password.
                        </P>
                        <form action="<?php echo BASEURL ?>/forgotpassword/otpCheck" method="post">
                            <label for="otp" class="bold black">OTP</label><br>
                            <input type="text" id="otp" name="otp" placeholder="Enter OTP here" required><br>

                            <input type="hidden" id="email" name="email" value="<?php echo $row['Email']; ?>"><br>
                            <input type="hidden" id="userId" name="userId" value="<?php echo $row['UserId']; ?>"><br>

                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" name="submit" value="Submit"><br><br>
                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" name="resend" value="Resend"><br><br>
                            <a href="<?php echo BASEURL ?>/signin/admin" class=" flex">Back</a>
                        </form>
                    </div>
                </div>
                <?php
                ?>
            </div>
        </div>
    </div>
    

    </div>

    <?php new pageFooter(); ?>
</main>

