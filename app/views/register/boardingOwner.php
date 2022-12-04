<?php
$header = new HTMLHeader("Register | Boarding Owner");
$nav = new Navigation("home");
$sidebar = new SidebarNav("user", "boardingOwner");
?>
<main class=" full-width ">
    <form action="boardingownerSignup" method="POST">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left">
                        <h1 class="header-1 black">

                            <i data-feather="chevron-left"></i>
                            Add Boarding Owner
                        </h1>
                    </div>
                    <div class="col-12 col-medium-4 fill-container right">
                        <!-- <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i> <span>Save</span>
                        </button> -->
                        <!-- <div class="row "> -->

                        <div class="col-4 fill-container">
                            <input class=" padding-5 bg-blue-hover white-hover border-rounded header-nb right" type="submit" value="Save">
                            
                        </div>
                    </div>
                </div>
                <div class="row margin-top-3 fill-container">
                    <div class="col-12 col-large-12 fill-container ">
                        <h2 class="header-2">Personal Details</h2>
                        <div class="row">
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="firstname" class="bold black">First Name</label><br>
                                <input type="text" class="fill-container" id="firstname" name="firstname" placeholder="Enter First Name" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="lastname" class="bold black">Last Name</label><br>
                                <input type="text" class="fill-container" id="lastname" name="lastname" placeholder="Enter Last Name" required><br>
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
                                <input type="text" class="fill-container" id="nic" name="nic" placeholder="Enter NIC Number" required><br>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="mobile" class="bold black">Mobile</label><br>
                                <input type="tel" class="fill-container" id="mobile" name="mobile" placeholder="+94 077 123 4567" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="occupation" class="bold black">Occupation</label><br>
                                <input type="text" class="fill-container" id="occupation" name="occupation" placeholder="Enter Occupation" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-5 fill-container">
                                <label for="address" class="bold black">Address</label><br>
                                <input type="text" class="fill-container" id="address" name="address" placeholder="Enter Address" required><br>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="workplace" class="bold black">Work Place</label><br>
                                <input type="text" class="fill-container" id="workplace" name="workplace" placeholder="Enter Work Place" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="email" class="bold black">Email</label><br>
                                <input type="email" class="fill-container" id="email" name="email" placeholder="Enter Email" required><br>
                            </div>

                        </div>
                    </div>


                    <div class="col-12 col-large-12 fill-container ">
                        <h2 class="header-2">Login Credentials</h2>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="username" class="bold black">Username</label><br>
                                <input type="text" id="username" name="username" placeholder="Enter Username" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="password" class="bold black">Password</label><br>
                                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="repassword" class="bold black">Re-Type Password</label><br>
                                <input type="password" id="repassword" name="repassword" placeholder="Re-Type Password" required>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">                  
            <div class="col-5 fill-container"><div>
                <label class="big" for="address">Address</label>
                <input class="margin-top-2" type="text" name="address" id="address"></div>                   
            </div>
            <div class="col-6" style="margin-right: 30%;">
                <label class="big" for="niclink">NIC Upload Link</label>
                <input class="margin-top-2" type="text" name="niclink" id="niclink">             
            </div>
        </div>
        <div class="row">                  
            <div class="col-3">
                <label class="big" for="email">E-mail Address</label>
                <input class="margin-top-2" type="text" name="email" id="email">                   
            </div>
            <div class="col-3">
                <label class="big" for="occupation">Occupation</label>
                <input class="margin-top-2" type="text" name="occupation" id="occupation">                   
            </div>
            <div class="col-3">
                <label class="big" for="workplace">Work Place</label>
                <input class="margin-top-2" type="text" name="workplace" id="workplace">                   
            </div>
        </div>  
        <div class="header-2">Login Credentials</div><br>
        <div class="row">                   
            <div class="col-3">
                <label class="big" for="username">Username</label>
                <input class="margin-top-2" type="text" name="username" id="username">                   
            </div>
            <div class="col-3">                
                <label class="big" for="password">Password</label>
                <input class="margin-top-2" type="password" name="password" id="password">
            </div>                    
            <div class="col-3">                
                <label class="big" for="password-repaet">Re-Type Password</label>
                <input class="margin-top-2" type="password" name="password-repaet" id="repassword">
            </div>                                       
        </div>  
        <div class="row">
            <div class="col-9">
                <input type="checkbox" id="agreement" name="agreement" value="True">
                I agree to all <a class="inverse">Terms</a> and <a class="inverse">Privacy Policy</a><br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-9">
            <input class="boarding-owner-btn" type="submit" value="Create Account"><br>
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
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>