<?php
$header = new HTMLHeader("Register | Student");
$nav = new Navigation();
?>

<main class="full-height ">
    <div class="row navbar-offset  ">
        <div class="col-12 col-medium-4 width-90   justify-content center">
            <div class="row">
                <div class="display-none display-medium-block col-medium-12 padding-bottom-3">
                    <img class="fill-container" src="<?php echo BASEURL . '/public/images/studentSignIn.svg' ?>">
                    <button
                        class=" padding-4 border-rounded fill-container bg-blue cursor-default  border-1 white">Student</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 fill-container">
                    <!-- after clicking this button show boarding owner registration form -->
                    <a href="<?php echo BASEURL; ?>/register/boardingOwner">
                        <button
                            class="padding-4 border-rounded fill-container bg-white-hover border-blue border-1 blue-hover">
                            Boarding Owner</button>
                    </a>
                </div>
                <div class="col-6 fill-container">
                    <!-- after clicking this button show  professional registration form -->
                    <a href="<?php echo BASEURL; ?>/register/professional">
                        <button
                            class="padding-4 border-rounded fill-container bg-white-hover border-blue border-1 blue-hover">
                            Professional</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-medium-8 width-90">
            <!-- controller->register->(studentSignUp) function -->
            <form action="<?php echo BASEURL ?>/register/studentSignUp" method="post">
                <div class="row">
                    <div class="col-10 fill-container">
                        <h1 class="header-1 margin-0">
                            Create Student Account
                        </h1>

                        <h2 class="header-2 margin-top-2 margin-bottom-1">Personal details</h2>
                        
                        <div class="row fill-container">
                            <div class="col-12 col-medium-5 fill-container">
                                <label class="big" for="firstname">First Name</label><!-- required -->
                                <input class="margin-top-2" type="text" name="firstname" placeholder="First name"
                                    id="firstname" required>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label class="big" for="lastname">Last Name</label><!-- required -->
                                <input class="margin-top-2" type="text" name="lastname" placeholder="Lastname"
                                    id="lastname" required>
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

                    <!-- field for profile picture -->

                    <div class="col-2 fill-container padding-0 ">
                        <input type="file" id="profilepic" credits='false' name="profilepic"
                            accept="image/png, image/jpeg, image/gif" /> <!-- not required -->
                        <input type="hidden" id="pplink" name="pplink">
                    </div>

                </div>
                <div class="row fill-container">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="nic">NIC Number</label><!-- required -->
                        <input class="margin-top-2" type="text" name="nic" placeholder="NIC Number" id="nic" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label id="mobileLabel" class="big" for="mobile">Mobile Number</label><!-- required -->
                        <input class="margin-top-2" type="text" name="mobile" placeholder="Mobile" id="mobile"
                            onkeyup="checkUserNumber()" required> 
                            <!-- The onkeyup event occurs when the user releases a key on the keyboard. -->
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="dob">Date of Birth</label>
                        <input class="margin-top-2" type="date" name="dob" placeholder="Date of Birth" id="dob"
                            required> <!-- required -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-medium-5 fill-container">
                        <div>
                            <label class="big" for="address">Address</label>
                            <input class="margin-top-2" type="text" placeholder="Address" name="address"
                                placeholder="address" id="address" required><!-- required -->
                        </div>
                    </div>
                    <div class="col-12 col-medium-5 fill-container">
                        <label class="big" for="nicupload">Upload NIC</label>
                        <input id="nicupload" name='nicupload' credits='false' accept="image/png, image/jpeg, image/gif"
                            type="file" required><!-- required -->
                    </div>
                    <input type="hidden" id="niclink" name="niclink" required>
                </div>
                <div class="header-2 margin-top-2 margin-bottom-1">University Details</div>
                <p></p>
                <div class="row">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="uni">University</label>
                        <!-- <input class="margin-top-2" type="text" placeholder="University" name="university"
                                 id="university" required> -->
                       <select id='uni' name='uni' required> 
                            <option value=''>Select University</option> 
                            <!-- empty value and the label "Select University". This serves as the default option when no other option is selected. -->
                            <?php
                            $university = restAPI('userManagement/universityRest');
                            foreach ($university as $uni) {
                                echo "<option value='" . $uni->Name . "'>" . $uni->Name . "</option>";
                            }
                            ?>
                         </select>
                    </div>
                    <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                        <div class="big black padding-bottom-2 ">University Email</div>
                        <div>
                            <!-- uniemail = y -->
                            <input type="radio" name="uniemail" value="y" id="yes" oninput='uniIdAd()' checked>
                            <lable for="y">Yes</lable>
                            <!-- uniemail = n -->
                            <input type="radio" name="uniemail" value="n" id="no" oninput='uniIdAd()'>
                            <lable for="n">No</lable>
                        </div>
                    </div>
                    <div id='uniIDElement' class="col-12 col-medium-4 fill-container">
                        <label class="big" for="uniid">University ID Number</label>
                        <input class="margin-top-2" type="text" name="uniid" placeholder="University ID Number"
                            id="uniid" required>
                    </div>

                    <div id='uniEmailElement' class="col-12 col-medium-4 fill-container">
                        <label id="emailLabel" class="big" for="email">University Email Address</label>
                        <input class="margin-top-2" type="text" name="email" placeholder="University Email Address"
                            onkeyup="checkUserEmail()" id="email" required>
                    </div>

                    <div id='uniIdUploadElement' class="col-12 col-medium-4 fill-container">
                        <label class="big" for="uniidupload">University ID</label>
                        <input id="uniidupload" name='uniidupload' credits='false' class="margin-top-2"
                            accept="image/png, image/jpeg, image/gif" type="file">
                    </div>
                    <input type="hidden" id="uniidlink" name="uniidlink">

                    <div id='uniAdElement' class="display-none col-12 col-medium-4 fill-container">
                        <label class="big" for="uniadupload">University Admission Letter</label>
                        <input id="uniadupload" name='uniadupload' credits='false'
                            accept="image/png, image/jpeg, image/gif" type="file">
                    </div>
                    <input type="hidden" id="uniadmission" name="uniadmission">



                </div>

                <h2 class="header-2 margin-top-2 margin-bottom-1">Login Credentials</h2>
                <div class="row fill-container">
                    <div class="col-12 col-medium-4 fill-container">
                        <label id="usernameLabel" class="big" for="username">Username</label>
                        <input class="margin-top-2" type="text" name="username" placeholder="User Name" id="username"
                            onkeyup="checkUserName()" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="password">Password</label>
                        <input class="margin-top-2" type="password" name="password" placeholder="Password" id="password"
                            required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="repassword">Re-Type Password</label>
                        <input class="margin-top-2" type="password" name="repassword" placeholder="Re-Type Password"
                            id="repassword" required>
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




<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>

    // run uniIdAd onload
    uniIdAd();

    function uniIdAd() {
        //         uniid
        // emailLabel
        // uniidupload
        // uniidlink
        // uniadupload
        // uniadmission
        if (document.getElementById('yes').checked) {
            document.getElementById('uniIDElement').classList.remove('display-none');
            document.getElementById('uniIdUploadElement').classList.remove('display-none');
            document.getElementById('uniAdElement').classList.add('display-none');
            document.getElementById('emailLabel').innerHTML = "University Email Address";
           
            document.querySelector('input[name="uniidupload"]').required = true;
            document.querySelector('input[name="uniadupload"]').required = false;
            document.querySelector('input[name="uniid"]').required = true;

           


        } else {

            let inputElement = document.getElementById("email");

            document.getElementById('emailLabel').innerHTML = "Personal Email Address";
            inputElement.placeholder = "Personal Email Address";
            document.getElementById('uniIDElement').classList.add('display-none');
            document.getElementById('uniIdUploadElement').classList.add('display-none');
            document.getElementById('uniAdElement').classList.remove('display-none'); 
           
            document.querySelector('input[name="uniidupload"]').required = false;
            document.querySelector('input[name="uniadupload"]').required = true;
            document.querySelector('input[name="uniid"]').required = false;


        }
    }

    let emailArray = [];
    // fetch post
    fetch("<?php echo BASEURL ?>/userManagement/getUserEmail", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: JSON.stringify({
            api_key: "bodocode"
        })
    })
        .then((response) => response.json())
        .then((json) => {
            for (var i = 0; i < json.length; i++) {
                emailArray.push(json[i].Email);
            }
        });



    let numberArray = [];
    // fetch post
    fetch("<?php echo BASEURL ?>/userManagement/getUserNumber", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: JSON.stringify({
            api_key: "bodocode"
        })
    })
        .then((response) => response.json())
        .then((json) => {
            for (var i = 0; i < json.length; i++) {
                numberArray.push(json[i].ContactNumber);
            }
        });


    let usernameArray = [];
    fetch("<?php echo BASEURL ?>/userManagement/getUserName", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: JSON.stringify({
            api_key: "bodocode"
        })
    })
        .then((response) => response.json())
        .then((json) => {
            for (var i = 0; i < json.length; i++) {
                usernameArray.push(json[i].Username);
            }
        });


    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImageExifOrientation, FilePondPluginImagePreview, FilePondPluginImageCrop, FilePondPluginImageResize, FilePondPluginImageTransform);

    FilePond.create(document.getElementById('nicupload'), {
        server: '<?php echo BASEURL ?>/imageUpload/nic',
        allowImagePreview: false
    });

    // console log file path after submit
    document.getElementById('nicupload').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('niclink').value = filepath;
        }
    });

    FilePond.create(document.getElementById('uniidupload'), {
        server: '<?php echo BASEURL ?>/imageUpload/uniid',
        allowImagePreview: false
    });

    // console log file path after submit
    document.getElementById('uniidupload').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('uniidlink').value = filepath;
        }
    });


    FilePond.create(document.getElementById('uniadupload'), {
        server: '<?php echo BASEURL ?>/imageUpload/uniad',
        allowImagePreview: false
    });

    // console log file path after submit
    document.getElementById('uniadupload').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('uniadmission').value = filepath;
        }
    });


    FilePond.create(document.getElementById('profilepic'), {
        server: '<?php echo BASEURL ?>/imageUpload/profilepic',
        labelIdle: `<img src='<?php echo BASEURL ?>/images/image.svg'/><br/> <span>Upload Profile Picture</span>`,
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleButtonRemoveItemPosition: 'center bottom'
    });

    // console log file path after submit
    document.getElementById('profilepic').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('pplink').value = filepath;
        }
    });



    async function checkUserName() {
        let username = document.getElementById("username");
        if (usernameArray.includes(username.value)) {
            username.classList.add("bg-red");
            document.getElementById("usernameLabel").classList.add("red");
            document.getElementById("usernameLabel").classList.remove("black");
            username.setCustomValidity("Username exists");
            username.title = "Username exists";

        } else {
            username.setCustomValidity("");
            document.getElementById("usernameLabel").classList.add("black");
            document.getElementById("usernameLabel").classList.remove("red");
            username.classList.remove("bg-red");
            username.title = "";

        }

    }
    async function checkUserEmail() {
        var email = document.getElementById("email");
        if (emailArray.includes(email.value)) {
            email.classList.add("bg-red"); document.getElementById("emailLabel").classList.add("red");
            document.getElementById("emailLabel").classList.remove("black");
            email.setCustomValidity("Email already in use");
            email.title = "Email already in use";

        } else {
            email.setCustomValidity(""); document.getElementById("emailLabel").classList.add("black");
            document.getElementById("emailLabel").classList.remove("red");
            email.classList.remove("bg-red");
            email.title = "";
        }

    }
    async function checkUserNumber() {
        var mobile = document.getElementById("mobile");
        if (numberArray.includes(mobile.value)) {
            mobile.classList.add("bg-red"); document.getElementById("mobileLabel").classList.add("red");
            document.getElementById("mobileLabel").classList.remove("black");
            mobile.setCustomValidity("Number already in use");
            mobile.title = "Number already in use";

        } else {
            mobile.setCustomValidity(""); document.getElementById("mobileLabel").classList.add("black");
            document.getElementById("mobileLabel").classList.remove("red");
            mobile.classList.remove("bg-red");
            mobile.title = "";
        }

    }

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