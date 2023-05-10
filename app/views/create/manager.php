<?php
$header = new HTMLHeader("Register | Manager");
$nav = new Navigation("management");
$sidebar = new SidebarNav("user", "manager");
$base = BASEURL;
?>
<main class=" full-width ">
    <form action="<?php echo BASEURL ?>/userManagement/createManager" method="post">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left"
                        onclick=" location.href='<?= $base ?>/userManagement/manager'">
                        <h1 class="header-1 black-hover cursor-pointer">

                            <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                            <span class="vertical-align-middle">Add Manager</span>
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
                                <input type="text" class="fill-container" id="firstname" name="firstname"
                                    placeholder="Enter First Name" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="lastname" class="bold black">Last Name</label><br>
                                <input type="text" class="fill-container" id="lastname" name="lastname"
                                    placeholder="Enter Last Name" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="dob" class="bold black">Date of Birth</label><br>
                                <input type="date" id="dob" name="dob" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="mobile" id="mobileLabel" class="bold black">Mobile</label><br>
                                <input type="tel" class="fill-container" id="mobile" name="mobile"
                                    onkeyup="checkUserNumber()" placeholder="+94 077 123 4567" required><br>
                            </div>
                            <div class="col-12 col-medium-5 fill-container">
                                <label id="emailLabel" for="email" class="bold black">Email</label><br>
                                <input type="email" class="fill-container" id="email" name="email"
                                    onkeyup="checkUserEmail()" placeholder="Enter Email" required><br>

                            </div>
                            <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                                <!-- gender radio buttons-->
                                <div class="bold black padding-bottom-2 ">Gender</div>
                                <input type="radio" name="gender" value="m" id="male"  checked>
                                <label for="male" class="">Male</label>

                                <input type="radio" name="gender" value="f" id="female" >
                                <label for="female" class="">Female</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-8 fill-container">
                                <label for="address" class="bold black">Address</label><br>
                                <input type="text" class="fill-container" id="address" name="address"
                                    placeholder="Enter Address" required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="nic" class="bold black">NIC Number</label><br>
                                <input type="text" class="fill-container" id="nic" name="nic"
                                    placeholder="Enter NIC Number" required><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-large-4 shadow padding-3 width-90">
                        <h2 class="header-2">Login Credentials</h2>
                        <div class="row fill-container">
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label id="usernameLabel" for="username" class="bold black">Username</label><br>
                                <input type="text" id="username" name="username" placeholder="Enter Username"
                                    onkeyup="checkUserName()" required><br>
                            </div>
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label for="password" class="bold black">Password</label><br>
                                <input type="password" id="password" name="password" placeholder="Enter Password"
                                    required>
                            </div>
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label for="repassword" class="bold black">Re Type Password</label><br>
                                <input type="password" id="repassword" name="repassword" placeholder="Re Type Password"
                                    required>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </form>

</main>



<script>



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
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>