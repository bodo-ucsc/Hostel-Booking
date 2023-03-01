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
                        <h2 class="header-2 flex">Reset New Password</h2>
                        <P>
                            
                        </P>
                        <form action="<?php echo BASEURL ?>/forgotpassword/updatePassword" method="post">
                            <label for="password" class="bold black" >New Password</label><br>
                            <input type="password" id="password" name="password" required><br>

                            <label for="Re-password" class="bold black" >Confirm Password</label><br>
                            <input type="password" id="Re-password" name="Re-password" required><br>
                            
                            <input type="hidden" id="userId" name="userId" value="<?php echo $row['UserId']; ?>"><br>
                            
                            
                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" name="submit" value="Process"><br><br>
                            <a href="<?php echo BASEURL ?>/signin/admin" class="flex">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<script>
       var password = document.getElementById("password")
        , confirm_password = document.getElementById("Re-password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    </script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>