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

    <title>Admin | Student</title>
</head>

<body>
    <div class="row">
        <?php
        $header =   new Navigation();
        ?>
    </div>
    <main class="">
        <div>
            <div class=" center margin-top-5 ">
                <div>
                    <span class=" header-2">Add Boarding Owner</span>
                </div>

               <div class="">
                    <form action="<?php echo BASEURL ?>/register/boardingownerSignup" method="POST">

                        <div>

                            <div class=" container">
                                <label for="username" class="bold black">UserName</label><br>
                                <input type="text" id="username" name="username" required />
                                <label for="first_name" class="bold black">First Name</label><br>
                                <input type="text" id="first_name" name="first_name" />
                                <label for="last_name" class="bold black">Last Name</label><br>
                                <input type="text" id="last_name" name="last_name" />
                                <label for="nic" class="bold black">NIC</label><br>
                                <input type="text" id="nic" name="nic" required />
                                <label for="email" class="bold black">Email</label><br>
                                <input type="email" id="email" name="email" required /><br>
                                <label for="password" class="bold black">Password</label><br>
                                <input class="bold black" type="password" id="password" placeholder="Enter password" name="password" required>
                                <label for="ComPassword" class="bold black">Confirm Password</label><br>
                                <input class="bold black" type="password" id="ComPassword" placeholder="Confirm password" name="ComPassword" required>
                                <label for="gender" class="bold black">Gender</label><br>
                                <input type="text" id="gender" name="gender" />
                                <label for="DOB" class="bold black">DOB</label><br>
                                <input type="date" id="DOB" name="DOB" /><br><br>
                                <label class=" bold black">Address</label><br>
                                <label for="postcode" class="bold black">Postcode</label>
                                <input type="text" id="postcode" name="postcode" />
                                <label for="street" class="bold black">Street</label>
                                <input type="text" id="street" name="street" />
                                <label for="city" class="bold black">City</label>
                                <input type="text" id="city" name="city" />
                                <label for="contactNo" class="bold black">Mobile</label><br>
                                <input type="text" id="contactNo" name="contactNo" />
                            </div>

                            <div class=" container">

                                <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" value="submit" name="submit"><br><br>
                            </div>
                        </div>
                    </form>
                </div>

                <button class=" bg-blue border-rounded-more margin-bottom-3 margin-top-3"><a href="managestudent" class=" white white-hover">Back</a></button>

            </div>
    </main>
</body>

</html>