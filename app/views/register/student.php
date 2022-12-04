<?php
$header = new HTMLHeader("Register | Student");
$nav = new Navigation("home");
?>

<main class="navbar-offset">
  <div class="row">
    <div class="col-5 fill-container justify-content center">
      <img width="374px" height="510px" src="<?php echo BASEURL . '/public/images/professionalSignIn.svg' ?>">
        <div class="margin-top-5">
          <div class="col-3 fill-container">
              <input class=" padding-5 bg-blue-hover white-hover" type="submit" value="Student">
              <input class=" padding-5 bg-blue-hover white-hover" type="submit" value="Boarding owner">
              <input class=" padding-5 bg-blue-hover white-hover" type="submit" value="Professional">

          </div>
        </div>
    </div>
    <div class="col-7 margin-3 fill-container">
        <form action="<?php echo BASEURL ?>/register/studentSignUp" method="post">
            <div class="row">
                <div class="col-9">
                    <h1 class="header-1">
                        Create Student Account
                    </h1>

                    <h2 class="header-2">Personal details</h2>
                    <div class="row">
                        <div class="col-4">
                            <label class="big" for="firstname">First Name</label>
                            <input class="margin-top-2" type="text" name="firstname" id="firstname">
                        </div>
                        <div class="col-4">
                            <label class="big" for="lastname">Last Name</label>
                            <input class="margin-top-2" type="text" name="lastname" id="lastname">
                        </div>
                        <div class="col-4 fill-container padding-bottom-4">
                            <div class="bold black padding-bottom-2 ">Gender</div>
                            <!-- <label class="big padding-bottom-3" style="margin-top: -1.5em;" for="gender">Gender</label><br>-->
                                <input  type="radio" name="gender" value="m" id="male" checked>
                                <lable for="m">Male</lable>
                                <input  type="radio" name="gender" value="f" id="female">
                                <lable for="f">Female</lable>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="col-3 bg-grey-hover border-circle padding-5">
                        <i data-feather="image" class="white"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="big" for="nic">NIC Number</label>
                    <input class="margin-top-2" type="text" name="nic" id="nic">
                </div>
                <div class="col-4">
                    <label class="big" for="mobile">Mobile Number</label>
                    <input class="margin-top-2" type="text" name="mobile" id="mobile">
                </div>
                <div class="col-4">
                    <label class="big" for="dob">Date of Birth</label>
                    <input class="margin-top-2" type="date" name="dob" id="dob">
                </div>
            </div>
            <div class="row">
                <div class="col-5 fill-container"><div>
                    <label class="big" for="address">Address</label>
                    <input class="margin-top-2" type="text" name="address" id="address"></div>
                </div>
                <div class="col-6">
                    <label class="big" for="niclink">NIC Upload Link</label>
                    <input class="margin-top-2" type="text" name="niclink" id="niclink">
                </div>
            </div>
            <div class="header-2">University Details</div><p></p>
                 <div class="row">
                    <div class="col-4">
                        <label class="big" for="university">University</label>
                        <input class="margin-top-2" type="text" name="uni" id="uni">
                    </div>
                      <div class="col-3 fill-container padding-bottom-4">
                           <div class="bold black padding-bottom-2 ">University Email</div>
                           <!--<label class="big padding-bottom-3" style="margin-top: -1.5em;" for="uniemail">University Email</label><br>-->
                           <div>
                               <input  type="radio" name="uniemail" value="y" id="yes" checked>
                               <lable for="y">Yes</lable>
                               <input  type="radio" name="uniemail" value="n" id="no">
                               <lable for="n">No</lable>
                           </div>
                       </div>
                    <div class="col-4">
                        <label class="big" for="uniid">University ID Number</label>
                        <input class="margin-top-2" type="text" name="uniid" id="uniid">
                    </div>
                </div>
            <div class="row">
                <div class="col-4">
                    <label class="big" for="email">University Email Address</label>
                    <input class="margin-top-2" type="text" name="email" id="email">
                </div>
                 <div class="col-6" style="margin-right: 20%;">
                     <label class="big" for="uniidlink">University ID Scanned Copy</label>
                     <input class="margin-top-2" type="text" name="uniidlink" id="uniidlink">
                 </div>


            </div>

            <h2 class="header-2">Login Credentials</h2>
            <div class="row">
                <div class="col-4">
                    <label class="big" for="username">Username</label>
                    <input class="margin-top-2" type="text" name="username" id="username">
                </div>
                <div class="col-4">
                    <label class="big" for="password">Password</label>
                    <input class="margin-top-2" type="password" name="password" id="password">
                </div>
                <div class="col-4">
                    <label class="big" for="password-repaet">Re-Type Password</label>
                    <input class="margin-top-2" type="password" name="password-repaet" id="password-repaet">
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
                <div class="col-4"></div>
                <div class="col-4 fill-container">
                    <input class=" fill-container padding-5 bg-blue-hover white-hover border-rounded" type="submit"value="Create Account">
                </div>
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