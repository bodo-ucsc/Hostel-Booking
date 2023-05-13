<?php
$header = new HTMLHeader("Register | Boarding Owner");
$nav = new Navigation();
?>

<main class="">
    <div class="row navbar-offset  ">
        <div class="col-12 col-medium-4 width-90 justify-content center">
            <div class="row">
                <div class="display-none display-medium-block col-medium-12 padding-bottom-3">
                    <img class="fill-container" src="<?php echo BASEURL . '/public/images/boardingOwnerSignIn.svg' ?>">
                    <button
                        class=" padding-4 border-rounded fill-container bg-blue cursor-default  border-1 white">Boarding
                        Owner</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 fill-container">
                    <a href="<?php echo BASEURL; ?>/register/professional">
                        <button
                            class="padding-4 border-rounded fill-container bg-white-hover border-blue border-1 blue-hover">
                            Professional</button>
                    </a>
                </div>
                <div class="col-6 fill-container">
                    <a href="<?php echo BASEURL; ?>/register/student">
                        <button
                            class="padding-4 border-rounded fill-container bg-white-hover border-blue border-1 blue-hover">
                            Student</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-medium-8 width-90">
            <form action="<?php echo BASEURL ?>/register/boardingOwnerSignUp" method="post"
                enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-10 fill-container">
                        <h1 class="header-1 margin-0">
                            Create Boarding Owner Account
                        </h1>

                        <h2 class="header-2 margin-top-2 margin-bottom-1">Personal details</h2>
                        <div class="row fill-container">
                            <div class="col-12 col-medium-5 fill-container">
                                <label class="big" for="firstname">First Name</label>
                                <input class="margin-top-2" type="text" name="firstname" id="firstname"
                                    placeholder="First Name" required>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label class="big" for="lastname">Last Name</label>
                                <input class="margin-top-2" type="text" name="lastname" id="lastname"
                                    placeholder="Last Name" required>
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
                    <div class="col-2 fill-container padding-0 ">
                        <input type="file" id="profilepic" credits='false' name="profilepic"
                            accept="image/png, image/jpeg, image/gif" />
                        <input type="hidden" id="pplink" name="pplink">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="nic-number">NIC Number</label>
                        <input class="margin-top-2" type="text" name="nic-number" placeholder="Nic Number"
                            id="nic-number" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label id="mobileLabel" class="big" for="mobile">Mobile Number</label>
                        <input class="margin-top-2" type="text" name="mobile" placeholder="+94771234567"
                            onkeyup="checkUserNumber()" id="mobile" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="dob">Date of Birth</label>
                        <input class="margin-top-2" type="date" name="dob" placeholder="dob" id="Date of Birth"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-medium-7 fill-container">
                        <div>
                            <label class="big" for="address">Address</label>
                            <input class="margin-top-2" type="text" name="address" placeholder="Address" id="address"
                                required>
                        </div>
                    </div>
                    <div class="col-12 col-medium-5 fill-container">
                        <label class="big" for="nicupload">Upload NIC</label>
                        <input id="nicupload" name='nicupload' credits='false' accept="image/png, image/jpeg, image/gif"
                            type="file" required>
                    </div>
                    <input type="hidden" id="niclink" name="niclink" required>
                </div>
                <div class="row">
                    <div class="col-12 col-medium-4 fill-container">
                        <label id="emailLabel" class="big" for="email">E-mail Address</label>
                        <input class="margin-top-2" type="text" name="email" placeholder="E-mail Address"
                            onkeyup="checkUserEmail()" id="email" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="occupation">Occupation</label>
                        <input class="margin-top-2" type="text" name="occupation" placeholder="Occupation"
                            id="occupation" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="workplace">Work Place</label>
                        <input class="margin-top-2" type="text" name="workplace" placeholder="Workplace" id="workplace"
                            required>
                    </div>
                </div>
                <div class="header-2">Login Credentials</div><br>
                <div class="row">
                    <div class="col-12 col-medium-4 fill-container">
                        <label id="usernameLabel" class="big" for="username">Username</label>
                        <input class="margin-top-2" type="text" onkeyup="checkUserName()" name="username"
                            placeholder="Username" id="username" required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="password">Password</label>
                        <input class="margin-top-2" type="password" name="password" placeholder="Password" id="password"
                            required>
                    </div>
                    <div class="col-12 col-medium-4 fill-container">
                        <label class="big" for="password-repeat">Re-Type Password</label>
                        <input class="margin-top-2" type="password" name="password-repeat"
                            placeholder="Re-Type Password" id="repassword" required>
                    </div>
                </div>
                <div class="row fill-container">
                    <div class="col-12  fill-container center">
                        <input class="vertical-align-middle" type="checkbox" id="agreement" name="agreement" required>
                        <span class="vertical-align-middle">I agree to all the <span onclick='openTerms()'
                                class="blue-hover cursor-pointer ">Terms</span> and the <span
                                onclick='location.href="<?= BASEURL ?>/about/privacy"'
                                class="blue-hover cursor-pointer ">Privacy Policy</spam></span>
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
                    <span class="center ">Already have an account? <a class="inverse"
                            href="<?php echo BASEURL ?>/signIn/boardingOwner">Sign In</a></span>
                </div>
            </form>
        </div>

</main>
<div class="navbar-offset"></div>
<?php new pageFooter(); ?>




<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>

    function openTerms() {
        Swal.fire({
            title: 'Terms and Conditions',
            customClass: 'swal-wide max-height-500 ',
            html: '<div class="left padding-3 bg-light-grey border-rounded-more ">' +
                '<div class="overflow-y-auto">' +
                '<span class="header-nb">BODO (Boarding Booking and Management System)</span><br><br>' +
                '<span class="big">1. Acceptance of Terms:</span><br>' +
                'By using our Hostel Booking and Management System, you acknowledge that you have read, understood, and agree to comply with these Terms and Conditions.<br><br>' +
                '<span class="big">2. User Obligations:</span><br>' +
                '2.1 You must provide accurate and up-to-date information while using the system.<br>' +
                '2.2 You are responsible for maintaining the confidentiality of your account and password.<br>' +
                '2.3 You agree not to use the system for any unlawful or unauthorized purposes.<br>' +
                '2.4 You agree not to interfere with the system\'s functionality or disrupt its operation.<br><br>' +
                '<span class="big">3. Booking and Reservations:</span><br>' +
                '3.1 The Hostel Booking and Management System allows users to make reservations for hostel accommodation.<br>' +
                '3.2 All bookings are subject to availability, and confirmation is provided based on availability at the time of booking.<br>' +
                '3.3 Users must provide accurate and complete information during the booking process.<br>' +
                '3.4 Users must provide a valid email address and contact number during the booking process.<br><br>' +
                '<span class="big">4. Pricing and Payment:</span><br>' +
                '4.1 All prices are in Sri Lankan Rupees (LKR).<br>' +
                '4.3 The pricing of hostel accommodations and associated services is displayed on the system and is subject to change without notice.<br>' +
                '4.4 Users are responsible for paying the total amount due for their bookings.<br><br>' +
                '<span class="big">5. Modifications and Cancellations:</span><br>' +
                '5.1 Users may modify or cancel their bookings, subject to the terms and conditions specified during the booking process.<br>' +
                '5.2 Any applicable modification or cancellation fees will be clearly communicated to users.<br><br>' +
                '<span class="big">6. Intellectual Property:</span><br>' +
                '6.1 The Hostel Booking and Management System and its content, including but not limited to logos, graphics, and text, are protected by intellectual property rights.<br>' +
                '6.2 Users are prohibited from reproducing, distributing, or modifying any part of the system without prior written permission.<br><br>' +
                '<span class="big">7. Limitation of Liability:</span><br>' +
                '7.1 The Hostel Booking and Management System is provided on an "as-is" basis.We do not guarantee the system\'s uninterrupted or error-free operation.<br>' +
                '7.2 We shall not be liable for any direct, indirect, incidental, consequential, or exemplary damages arising from the use of the system.<br><br>' +
                '<span class="big">8. Privacy:</span><br>' +
                '8.1 Our Privacy Policy outlines how we collect, use, and protect your personal information.By using the system, you consent to the practices described in our Privacy Policy.<br><br>' +
                '<span class="big">Termination:</span><br>' +
                '9.1 We reserve the right to terminate or suspend your access to the Hostel Booking and Management System at any time without prior notice.<br><br>' +
                '<span class="big">10. Governing Law and Jurisdiction:</span><br>' +
                'These Terms and Conditions shall be governed by and construed in accordance with the laws of[jurisdiction].Any disputes arising out of or in connection with these terms shall be subject to the exclusive jurisdiction of the courts of[jurisdiction].<br><br>' +
                'By using our Hostel Booking and Management System, you acknowledge and agree to abide by these Terms and Conditions.' +
                '</div>' +
                '</div>',

        })
    };

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
        var username = document.getElementById("username");
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