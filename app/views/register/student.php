<?php
$header = new HTMLHeader("Register | Student");
$nav = new Navigation("home");
?>


<main class=" full-width position-absolute">
    <div class="row full-height">
        <div class="col-6 bg-light-grey flex">
            <img class="login-img" src="student-login.png">
        </div>
        <div class="col-12 col-medium-8 width-90">
            <form action="<?php echo BASEURL ?>/register/studentSignUp" method="post">
                <div class="row">
                    <div class="col-10 fill-container">
                        <h1 class="header-1 margin-0">
                            Create Student Account
                        </h1>

                        <h2 class="header-2 margin-top-2 margin-bottom-1">Personal details</h2>
                        <div class="row fill-container">
                            <div class="col-12 col-medium-5 fill-container">
                                <label class="big" for="firstname">First Name</label>
                                <input class="margin-top-2" type="text" name="firstname" id="firstname" required>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label class="big" for="lastname">Last Name</label>
                                <input class="margin-top-2" type="text" name="lastname" id="lastname" required>
                            </div>
                            <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                                <div class="big black padding-bottom-3 ">Gender</div>
                                <div class="display-inline-block padding-bottom-3">
                                    <input type="radio" name="gender" value="m" id="male" checked>
                                    <lable for="m">Male</lable>
                                </div>
                                <div class="display-inline-block padding-bottom-3">
                                    <input type="radio" name="gender" value="f" id="female">
                                    <lable for="f">Female</lable>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2  ">
                        <div class="col-12 col-medium-3 bg-grey-hover border-circle padding-5">
                            <i data-feather="image" class="white "></i>
                        </div>
                    </div>
                </div>
                <div class="row fill-container">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="nic">NIC Number</label>
                        <input class="margin-top-2" type="text" name="nic" id="nic" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="mobile">Mobile Number</label>
                        <input class="margin-top-2" type="text" name="mobile" id="mobile" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="dob">Date of Birth</label>
                        <input class="margin-top-2" type="date" name="dob" id="dob" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-medium-5 fill-container">
                        <div>
                            <label class="big" for="address">Address</label>
                            <input class="margin-top-2" type="text" placeholder="Address" name="address" id="address" required>
                        </div>
                    </div>
                    <div class="col-12 col-medium-6 fill-container">
                        <label class="big" for="niclink">NIC Upload Link</label>
                        <input class="margin-top-2" type="text" name="niclink" id="niclink">
                    </div>
                </div>
                <div class="header-2 margin-top-2 margin-bottom-1">University Details</div>
                <p></p>
                <div class="row">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="university">University</label>
                        <input class="margin-top-2" type="text" name="uni" id="uni" required>
                    </div>
                    <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                        <div class="big black padding-bottom-2 ">University Email</div>
                        <div>
                            <input type="radio" name="uniemail" value="y" id="yes" checked>
                            <lable for="y">Yes</lable>
                            <input type="radio" name="uniemail" value="n" id="no">
                            <lable for="n">No</lable>
                        </div>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="uniid">University ID Number</label>
                        <input class="margin-top-2" type="text" name="uniid" id="uniid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="email">University Email Address</label>
                        <input class="margin-top-2" type="text" name="email" id="email" required>
                    </div>
                    <div class="col-12 col-medium-6 fill-container">
                        <label class="big" for="uniidlink">University ID Scanned Copy</label>
                        <input class="margin-top-2" type="text" name="uniidlink" id="uniidlink">
                    </div>
                    <div class="col-12 col-medium-6 fill-container">
                        <label class="big" for="uniadmission">University Admission Letter</label>
                        <input class="margin-top-2" type="text" name="uniadmission" id="uniadmission" value="NULL">
                    </div>


                </div>

                <h2 class="header-2 margin-top-2 margin-bottom-1">Login Credentials</h2>
                <div class="row fill-container">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="username">Username</label>
                        <input class="margin-top-2" type="text" name="username" id="username" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="password">Password</label>
                        <input class="margin-top-2" type="password" name="password" id="password" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="repassword">Re-Type Password</label>
                        <input class="margin-top-2" type="password" name="repassword" id="repassword" required>
                    </div>
                </div>
                <div class="row fill-container">
                    <div class="col-12  fill-container center">
                        <input class="vertical-align-middle" type="checkbox" id="agreement" name="agreement" required>
                        <span class="vertical-align-middle">I agree to all the <a class="inverse">Terms</a> and the <a
                                class="inverse">Privacy Policy</a></span>
                    </div>
                </div> 
                <div class="row fill-container padding-vertical-2">
                    <div class="col-medium-4 display-none display-medium-block fill-container"></div>
                    <div class="col-12 col-medium-4 fill-container">
                        <input class=" fill-container padding-5 bg-blue-hover white-hover border-rounded" type="submit"
                            value="Create Account">
                    </div>
                </div>

                <div class="col-12 center fill-container padding-bottom-3">
                    <span class="center">Already have an account? <a class="inverse"
                            href="<?php echo BASEURL ?>/signIn/student">Sign In</a></span>
                </div>
            </form>


        </div>

    </div>
</main>

<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>