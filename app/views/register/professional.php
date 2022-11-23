<?php
$header = new HTMLHeader("Register | Professional");
$nav = new Navigation("home");
?>
<main class="navbar-offset">
<div class="row">
<div class="col-4 fill-container justify-content center">
    <img width="300px" height="219px" src="<?php echo BASEURL . '/public/images/verificationSignIn.svg' ?>">
 <!--   <div class="margin-top-5">
        <button class="">Boarding owner</button><br>
        <button class="">Professional</button>
        <button class="">Student</button>
    </div>-->
</div>
<div class="col-8 margin-5 fill-container">
    <form action="<?php echo BASEURL ?>/register/boardingOwnerSignUp" method="post">
        <div class="row" style="margin-right: min(0,9999px);">
            <div class="col-9"><div class="header-1">
                Create Professional Account
            </div>
            <div class="header-2">Personal details</div><p></p>
                <div class="row">                   
                    <div class="col-3">
                        <label class="big" for="firstname">First Name</label>
                        <input class="margin-top-2" type="text" name="firstname" id="firstname">                   
                    </div>
                    <div class="col-3">                
                        <label class="big" for="lastname">Last Name</label>
                        <input class="margin-top-2" type="text" name="lastname" id="lastname">
                    </div>                    
                    <div class="col-3" style="display: grid; align-items: baseline;">                        
                        <label class="big padding-bottom-3" style="margin-top: -1.5em;" for="gender">Gender</label><br>
                        <div>
                            <input  type="radio" name="gender" value="m">
                            <lable for="m">Male</lable>  
                            <input  type="radio" name="gender" value="f">
                            <lable for="f">Female</lable>                      
                        </div>                                              
                    </div>                                    
                </div> 
            </div>
            <div class="col-3" style="display: flex; flex-direction: flex-start; margin-left: min(-20vw, -250px)">
                <div class="col-3 margin-bottom-3" style="background-color:#eaeaea; height: 12em; width: 12em; border-radius: 100%;"></div>
            </div>
        </div> 
        <div class="row">                  
            <div class="col-3">
                <label class="big" for="nic-number">NIC Number</label>
                <input class="margin-top-2" type="text" name="nic-number" id="nic-number">                   
            </div>
            <div class="col-3">
                <label class="big" for="mobile">Mobile Number</label>
                <input class="margin-top-2" type="text" name="mobile" id="mobile">                   
            </div>
            <div class="col-3">
                <label class="big" for="dob">Date of Birth</label>
                <input class="margin-top-2" type="date" name="dob" id="dob">                   
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
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("repassword");

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