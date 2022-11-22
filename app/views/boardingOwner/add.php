<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo BASEURL . '/public/styles/styles.css' ?>">
    <link rel="shortcut icon" href=" <?php echo BASEURL . '/public/images/favicon.png' ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Admin | BoardingOnwer</title>
</head>

<body>
    <div class="row">
        <?php $header =   new Navigation(); ?>
    </div>
    <?php if (isset($_SESSION["username"])) {
        $sidebar = new SideBarNav("user", "admin");
    ?>
        <main class="  full-width full-height overflow-hidden ">
            <div class=" row sidebar-offset full-height ">
                <div class="  margin-top-5">
                    <div class=" margin-left-4 full-height margin-top-5 ">

                        <div class=" margin-top-5 padding-vertical-3">
                            <span class=" header-1 ">Add Boarding Owner</span>
                        </div>

                        <form action="<?php echo BASEURL ?>/register/boardingownerSignup" method="POST">
                            <div class=" right-flex margin-right-5 padding-right-5">
                                <input class=" bg-accent-hover white-hover  bold padded border-rounded " type="submit" value="Save Changes" name="submit"><br><br>
                            </div>
                            <div class=" container full-width">
                            <span class=" header-2"> Personal Details</span>
                                <div class=" row fill-container padding-top-4">
                                   
                                    <label for="username" class="bold black">UserName</label>
                                    <input type="text" id="username" name="username" required />
                                    <label for="first_name" class="bold black">First Name</label>
                                    <input type="text" id="first_name" name="first_name" />
                                    <label for="last_name" class="bold black">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" />
                                    <label for="gender" class="bold black">Gender</label>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label>
                                </div>
                                <div class=" row">
                                    <label for="nic" class="bold black">NIC</label>
                                    <input type="text" id="nic" name="nic" required />
                                    <label for="contactNo" class="bold black">Mobile</label>
                                    <input type="text" id="contactNo" name="contactNo" />
                                    <label for="DOB" class="bold black">DOB</label>
                                    <input type="date" id="DOB" name="DOB" />
                                </div>
                                <div class=" row">
                                    <label for="address" class="bold black">Address</label>
                                    <input type="text" id="address" name="address" />
                                    <label for="email" class="bold black">Email</label>
                                    <input type="email" id="email" name="email" required />

                                </div>
                                <div class=" row">
                                    <label for="password" class="bold black">Password</label>
                                    <input class="bold black" type="password" id="password" placeholder="Enter password" name="password" required>
                                    <label for="ComPassword" class="bold black">Confirm Password</label>
                                    <input class="bold black" type="password" id="ComPassword" placeholder="Confirm password" name="ComPassword" required>
                                </div>
                            </div>
                        </form>
                        <div class=" justify-content margin-left-5">
                            <button class=" bg-blue border-rounded-more margin-bottom-3 margin-top-3"><a href="<?php echo BASEURL ?>/adminhome/viewboardingOwner" class=" white white-hover">Back</a></button>
                        </div>


                        <div class="col-12 col-large-4 shadow padding-3 width-90">
                        <h2 class="header-2">Login Credentials</h2>
                        <div class="row fill-container">
                            <div class="col-12 col-medium-4 col-large-12 fill-container">
                                <label for="username" class="bold black">Username</label><br>
                                <input type="text" id="username" name="username" placeholder="Enter Username"
                                    required><br>
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
        </main>
    <?php
    }
    ?>
</body>

</html>