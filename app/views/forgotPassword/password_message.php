<?php
$header = new HTMLHeader("Password Mesaage");
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
                        <h2 class="header-2">Recover Your Password</h2>
                        <P>
                            An email has been sent to your email address to with a link to reset your password.
                        </P>
                        <form action="<?php echo BASEURL ?>/forgotpassword/check" method="post">
                            <label for="email" class="bold black">Email</label><br>
                            <input type="text" id="email" name="email"><br>
    
                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" value="Send Link"><br>
                            <a href="<?php echo BASEURL ?>/signin/admin" class=" center">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </div>
</main>

<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>