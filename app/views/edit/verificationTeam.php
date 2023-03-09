<?php

if (isset($data['result'])) {
    $row = $data['result']->fetch_assoc();

    $UserId = $row['UserId'];
    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $UserType = $row['UserType'];
    $DateOfBirth = $row['DateOfBirth'];
    $NIC = $row['NIC'];
    $Email = $row['Email'];
    $ContactNumber = $row['ContactNumber'];
    $Address = $row['Address'];
    $Gender = $row['Gender'];

    $header = new HTMLHeader("Edit | $FirstName ");
    $nav = new Navigation("home");
    $sidebar = new SidebarNav("user", "verification");
    $base = BASEURL;
}
else{
    header('Location: ' . BASEURL . '/admin/verificationTeam');
}
?>
<main class=" full-width ">
    <form action="<?php echo $base.'/admin/editingVerificationTeam'; ?>" method="post">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left">
                        <h1 class="header-1 ">

                            <i data-feather="chevron-left"></i>
                            Edit
                            <?php echo $FirstName; ?>'s Details
                        </h1>
                    </div>
                    <div class="col-12 col-medium-4 fill-container right">
                        <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i> <span>Save</span>
                        </button>
                    </div>
                </div>
                <div class="row margin-top-5 fill-container">
                    <div class="col-12 col-large-8 fill-container ">
                        <h2 class="header-2">Personal Details</h2>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="firstname" class="bold black">First Name</label><br>
                                <?php
                                echo "
                                <input type='text' class='fill-container' id='firstname' name='firstname' placeholder='$FirstName' value='$FirstName' ><br>";
                                ;
                                ?>

                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="lastname" class="bold black">Last Name</label><br>
                                <?php
                                echo "
                                <input type='text' class='fill-container' id='lastname' name='lastname' placeholder='$LastName' value='$LastName' ><br>";
                                ;
                                ?>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="dob" class="bold black">Date of Birth</label><br>
                                <?php
                                echo "
                                <input type='date' class='fill-container' id='dob' name='dob' placeholder='$DateOfBirth' value='$DateOfBirth' ><br>";
                                ;
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="mobile" class="bold black">Mobile</label><br>
                                <?php
                                echo "
                                <input type='tel' class='fill-container' id='mobile' name='mobile' placeholder='$ContactNumber' value='$ContactNumber' ><br>";
                                ;
                                ?>
                            </div>
                            <div class="col-12 col-medium-5 fill-container">
                                <label for="email" class="bold black">Email</label><br>
                                <?php
                                echo "
                                <input type='email' class='fill-container' id='email' name='email' placeholder='$Email' value='$Email' ><br>";
                                ;
                                ?>
                            </div>
                            <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                                <!-- gender radio buttons-->
                                <div class="bold black padding-bottom-2 ">Gender</div>
                                <?php
                                if ($Gender == 'm') {
                                    echo '
                                        <input type="radio" name="gender" value="m" id="male" id="" checked>
                                        <label for="male" class="">Male</label>

                                        <input type="radio" name="gender" value="f" id="female" id="">
                                        <label for="female" class="">Female</label>
                                    ';
                                } else {
                                    echo '
                                        <input type="radio" name="gender" value="m" id="male" id="" >
                                        <label for="male" class="">Male</label>

                                        <input type="radio" name="gender" value="f" id="female" id="" checked>
                                        <label for="female" class="">Female</label>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-8 fill-container">
                                <label for="address" class="bold black">Address</label><br>
                                <?php
                                echo "
                                <input type='text' class='fill-container' id='address' name='address' placeholder='$Address' value='$Address' ><br>";
                                ;
                                ?>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="nic" class="bold black">NIC Number</label><br>
                                <?php
                                echo "
                                <input type='text' class='fill-container' id='nic' name='nic' placeholder='$NIC' value='$NIC' ><br>";
                                ;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-large-4 shadow padding-3 width-90">
                        <h2 class="header-2">Edit Credentials</h2>
                        <div class="row fill-container">

                            <div class="col-12 col-medium-4 col-large-12  fill-container">
                                <label for="username" class="bold black">User Name</label><br>
                                <?php
                                echo "
                                <input type='text' class='fill-container' id='username' name='username' placeholder='$Username' value='$Username' ><br>";
                                ;
                                ?>
                            </div>
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label for="currentpassword" class="bold black">Current Password</label><br>
                                <input type="password" id="currentpassword" name="currentpassword"
                                    placeholder="Enter Current Password" ><br>
                            </div>
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label for="newpassword" class="bold black">New Password</label><br>
                                <input type="password" id="newpassword" name="newpassword"
                                    placeholder="Enter New Password" >
                            </div>
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label for="repassword" class="bold black">Re Type Password</label><br>
                                <input type="password" id="repassword" name="repassword" placeholder="Re Type Password"
                                    >
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </form>
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