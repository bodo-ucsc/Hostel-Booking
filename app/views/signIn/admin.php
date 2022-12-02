<?php
$header = new HTMLHeader("Login | Admin");
$nav = new Navigation("home");
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
                        <h2 class="header-2">Admin Sign In</h2>
                        <form action="<?php echo BASEURL ?>/signin/adminLogin" method="post">
                            <label for="username" class="bold black">Username</label><br>
                            <input type="text" id="username" name="username" placeholder="Enter username"><br>
                            <label for="password" class="bold black">Password</label><br>
                            <input type="password" id="password" name="password" placeholder="Enter Password">
                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" value="Sign In"><br>
                            <a href="<?php echo BASEURL ?>/forgotpassword" class=" center">Forgot Password</a>
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