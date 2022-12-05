<?php
$header = new HTMLHeader("Register | Boarding Owner");
$nav = new Navigation("home");
?>
<main class="navbar-offset margin-0">
<div class="row">
<div class="col-4 fill-container justify-content center">
    <img class=" width-90" src="<?php echo BASEURL . '/public/images/verificationSignIn.svg' ?>">
 <!--   <div class="margin-top-5">
        <button class="">Boarding owner</button><br>
        <button class="">Professional</button>
        <button class="">Student</button>
    </div>-->
</div>
<div class="col-8 margin-5 fill-container">
    <form action="<?php echo BASEURL ?>/register/boardingOwnerSignUp" method="post">
        <div class="row">
            <div class="col-12 header-1 padding-bottom-2 left">
                Create Boarding Owner Account
            </div>
        </div>
        <div class="row"> 
            <div class="col-12 header-2 padding-vertical-2">Personal details</div>
        </div>    
        
        <div class="row">                   
            <div class="col-4 fill-container">
                <label class="big" for="firstname">First Name</label>
                <input class="margin-top-2" type="text" name="firstname" id="firstname">                   
            </div>
            <div class="col-4 fill-container">                
                <label class="big" for="lastname">Last Name</label>
                <input class="margin-top-2" type="text" name="lastname" id="lastname">
            </div>                    
            <div class="col-4 padding-bottom-5 fill-container">                        
                <label class="big padding-bottom-3 " for="gender">Gender</label><br>
                <div>
                    <input  type="radio" name="gender" value="m">
                    <lable for="m">Male</lable>  
                    <input  type="radio" name="gender" value="f">
                    <lable for="f">Female</lable>                      
                </div>                                              
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
            <div class="col-4">
                <label class="big" for="dob">Date of Birth</label>
                <input class="margin-top-2" type="date" name="dob" id="dob">                   
            </div>
        </div>
        <div class="row">                  
            <div class="col-6 fill-container"><div>
                <label class="big" for="address">Address</label>
                <input class="margin-top-2" type="text" name="address" id="address"></div>                   
            </div>
            <div class="col-6">
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
            <div class="col-4">
                <label class="big" for="workplace">Work Place</label>
                <input class="margin-top-2" type="text" name="workplace" id="workplace">                   
            </div>
        </div>  
        <div class="header-2">Login Credentials</div><br>
        <div class="row">                   
            <div class="col-2">
                <label class="big" for="username">Username</label>
                <input class="margin-top-2" type="text" name="username" id="username">                   
            </div>
            <div class="col-4">                
                <label class="big" for="password">Password</label>
                <input class="margin-top-2" type="password" name="password" id="password">
            </div>                    
            <div class="col-4">                
                <label class="big" for="password-repaet">Re-Type Password</label>
                <input class="margin-top-2" type="password" name="password-repaet" id="repassword">
            </div>                                       
        </div>  
        <div class="row">
            <div class="col-9">
                <input type="checkbox" id="agreement" name="agreement" value="True" required>
                I agree to all <a class="inverse">Terms</a> and <a class="inverse">Privacy Policy</a><br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-9">
            <input class=" bg-blue white-hover border-rounded" type="submit" value="Create Account"><br>
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