<?php
$header = new HTMLHeader("Login | Verification Team");
$nav = new Navigation("home");
?>


<main class=" full-width overflow-hidden position-absolute">
    <div class="row full-height">
        <div class="col-small-5 col-12  bg-white flex full-height">
            <div>
                <h2 class="header-2">Verification Team Sign In</h2>
                <form action="<?php echo BASEURL ?>/signin/verificationTeamLogin" method="post">
                    <label for="username" class="bold black">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                    <label for="password" class="bold black">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter Password">
                    <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit"
                        value="Sign In"><br>
                    <p>Don't have an account? <a class="inverse"
                            href="<?php echo BASEURL ?>/register/verificationTeam">Register</a> </p>
                </form>
            </div>
        </div>
        <div class="col-small-7 col-12 bg-light-grey flex  full-height">
            <div class=" padding-5 margin-top-5">
                <img class=" fill-container " src="<?php echo BASEURL . '/public/images/verificationSignIn.svg' ?>">
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
</body>

    </div>
</main>

<?php
 if (isset($data['error'])) {
     $footer = new HTMLFooter($data['error']);
 } else {
     $footer = new HTMLFooter();
 }
 ?>
