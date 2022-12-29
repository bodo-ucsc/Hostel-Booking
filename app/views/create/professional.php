<?php
$header = new HTMLHeader("Add User | Professional");
$nav = new Navigation("home");
$sidebar = new SidebarNav("user", "professional");
$base = BASEURL . '/admin';

?>
<main class=" full-width ">
    <form action="<?php echo BASEURL ?>/userManagement/createProfessional" method="post">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left"
                        onclick=" location.href='<?= $base ?>/userManagement/professional'">
                        <h1 class="header-1 black-hover cursor-pointer">
                            <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                            <span class="vertical-align-middle">Add Professional</span>
                        </h1>
                    </div>
                    <div class="col-12 col-medium-4 fill-container right">
                        <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i> <span>Save</span>
                        </button>
                    </div>
                    <div class="col-12 col-medium-4 fill-container right">
                        <!-- <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i> <span>Save</span>
                        </button> -->
                        <!-- <div class="row "> -->

                        
                    </div>
                </div>
                <div class="row margin-top-3 fill-container">
                    <div class="col-12 col-large-12 fill-container ">
                        <h2 class="header-2">Personal Details</h2>
                        <div class="row">
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="firstname" class="bold black">First Name</label><br>
                                <input type="text" class="fill-container" id="firstname" name="firstname"
                                    placeholder="Enter First Name" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="lastname" class="bold black">Last Name</label><br>
                                <input type="text" class="fill-container" id="lastname" name="lastname"
                                    placeholder="Enter Last Name" required><br>
                            </div>
                            <div class="col-12 col-medium-2 fill-container padding-bottom-4">
                                <!-- gender radio buttons-->
                                <div class="bold black padding-bottom-2 ">Gender</div>
                                <input type="radio" name="gender" value="m" id="male" id="" checked>
                                <label for="male" class="">Male</label>

                                <input type="radio" name="gender" value="f" id="female" id="">
                                <label for="female" class="">Female</label>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="dob" class="bold black">Date of Birth</label><br>
                                <input type="date" id="dob" name="dob" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="nic" class="bold black">NIC Number</label><br>
                                <input type="text" class="fill-container" id="nic" name="nic"
                                    placeholder="Enter NIC Number" required><br>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="mobile" class="bold black">Mobile</label><br>
                                <input type="tel" class="fill-container" id="mobile" name="mobile"
                                    placeholder="+94 077 123 4567" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="occupation" class="bold black">Occupation</label><br>
                                <input type="text" class="fill-container" id="occupation" name="occupation"
                                    placeholder="Enter Occupation" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-5 fill-container">
                                <label for="address" class="bold black">Address</label><br>
                                <input type="text" class="fill-container" id="address" name="address"
                                    placeholder="Enter Address" required><br>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="workplace" class="bold black">Work Place</label><br>
                                <input type="text" class="fill-container" id="workplace" name="workplace"
                                    placeholder="Enter Work Place" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="email" class="bold black">Email</label><br>
                                <input type="email" class="fill-container" id="email" name="email"
                                    placeholder="Enter Email" required><br>
                            </div>

                        </div>
                    </div>


                    <div class="col-12 col-large-12 fill-container ">
                        <h2 class="header-2">Login Credentials</h2>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="username" class="bold black">Username</label><br>
                                <input type="text" id="username" name="username" placeholder="Enter Username"
                                    required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="password" class="bold black">Password</label><br>
                                <input type="password" id="password" name="password" placeholder="Enter Password"
                                    required>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="repassword" class="bold black">Re-Type Password</label><br>
                                <input type="password" id="repassword" name="repassword" placeholder="Re-Type Password"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>
    </div>
</main>

<script>
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("repassword");

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