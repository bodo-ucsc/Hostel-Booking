<?php
$header = new HTMLHeader("Forgot Password");
//$nav = new Navigation("home");
?>
<main class=" full-width overflow-hidden position-absolute">
    <div class="row">
        <div class="col-12 bg-white flex full-height">
            <div class="shadow padding-5">
                <div class="row">
                    <div class="col-12">
                        <img class=" fill-container " src="<?php echo BASEURL . '/public/images/logo.svg' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-2 flex">Recover Your Password</h2>
                        <P>Please enter your email address you used to sign up on this site.</P>
                        <P>OTP will send to your email address.</P>

                        <?php
                        ?>
                        <form action="<?php echo BASEURL ?>/forgotpassword/Check" method="post">
                            <label for="email" class="bold black">Email</label><br>
                            <input type="text" id="email" name="email" placeholder="Enter Email"><br>

                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" name="submit" value="Send Link"><br><br>
                            <a href="<?php echo BASEURL ?>/signin/admin" class=" flex">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php
        $base = BASEURL;
        if (isset($data['code'])) {
            echo "Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '$data[code]',
            footer: '<a href>Why do I have this issue?</a>'
        })";
            unset($data['code']);
        }
        ?>
    </script>
    </div>
</main>

<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>