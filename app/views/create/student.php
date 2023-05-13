<?php
$header = new HTMLHeader("Add User | Student");
$nav = new Navigation("management");
$sidebar = new SidebarNav("user", "student");
$base = BASEURL;


?>
<main class=" full-width ">
    <form action="<?php echo BASEURL ?>/userManagement/createStudent" method="post">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left"
                        onclick=" location.href='<?= $base ?>/userManagement/student'">
                        <h1 class="header-1 black-hover cursor-pointer">
                            <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                            <span class="vertical-align-middle">Add Student</span>
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
                                <input type="radio" name="gender" value="m" id="male" checked>
                                <label for="male" class="">Male</label>

                                <input type="radio" name="gender" value="f" id="female">
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
                            <div class="col-12 col-medium-5 fill-container">
                                <div>
                                    <label class="bold black" for="address">Address</label>
                                    <input type="text" name="address" placeholder="Address" id="address" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <h2 class="header-2">University Details</h2>
                        <div class="row">
                            <div class="col-12 col-medium-3 fill-container">
                                <label class="bold black" for="uni">University</label>
                                <select id='uni' name='uni' required>
                                    <option value=''>Select University</option>
                                    <?php
                                    $university = restAPI('userManagement/universityRest');
                                    foreach ($university as $uni) {
                                        echo "<option value='" . $uni->Name . "'>" . $uni->Name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-medium-2 fill-container padding-bottom-4">
                                <div class="bold black padding-bottom-4 ">University Email</div>
                                <div>
                                    <input type="radio" name="uniemail" value="y" id="yes" checked>
                                    <lable for="y">Yes</lable>
                                    <input type="radio" name="uniemail" value="n" id="no">
                                    <lable for="n">No</lable>
                                </div>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label class="bold black" for="uniid">University ID Number</label>
                                <input type="text" name="uniid" id="uniid">
                            </div>

                            <div class="col-12 col-medium-4 fill-container">
                                <label class="bold black" for="email">University Email Address</label>
                                <input type="text" name="email" id="email" required>
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

let password = document.getElementById("password")
        , confirm_password = document.getElementById("repassword");

    function validatePassword() {
        let passwordValue = password.value;
        let confirmPasswordValue = confirm_password.value;

        let pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]+$/;

        if (passwordValue.length < 8) {
            password.setCustomValidity("Password should be at least 8 characters long.");
        }
        else if (!/[A-Z]/.test(passwordValue)) {
            password.setCustomValidity("Password should contain at least one uppercase letter.");
        }

        else if (!/[a-z]/.test(passwordValue)) {
            password.setCustomValidity("Password should contain at least one lowercase letter.");
        }
        else if (!/\d/.test(passwordValue)) {
            password.setCustomValidity("Password should contain at least one digit.");
        }

        else if (!/[^a-zA-Z0-9]/.test(passwordValue)) {
            password.setCustomValidity("Password should contain at least one special character.");
        }
        else if (!pattern.test(passwordValue)) {
            password.setCustomValidity("Password should follow the pattern: at least one letter and one digit.");
        } else {
            password.setCustomValidity("");
        }

        if (passwordValue !== confirmPasswordValue) {
            confirm_password.setCustomValidity("Passwords don't match.");
        } else {
            confirm_password.setCustomValidity("");
        }
    }


    password.addEventListener("keyup", validatePassword);
    confirm_password.addEventListener("keyup", validatePassword);
</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>