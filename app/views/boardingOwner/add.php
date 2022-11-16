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
        <?php
        $header = "components/navigation/guest.php";
        include_once($header);
        ?>
    </div>
    <main class="">
        <div>
            <div class="  center header-2 small margin-top-5 padding-vertical-5">
                <h1>Add Boarding Owner</h1></br></br>
            </div>
            <div class=" margin-left-5">
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
                            <label for="address" class="bold black">Address</label>
                            <input type="text" id="address" name="address" />
                            <label for="contactNo" class="bold black">Contact NO</label><br>
                            <input type="text" id="contactNo" name="contactNo" />
                        </div>


                        <div class=" container">

                            <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" value="Submit" name="submit"><br><br>
                        </div>
                    </div>
                </form>
            </div>

            <div class=" justify-content margin-left-5">
                <button><a href="manageboardingOwner">Back</a></button>
            </div>
        </div>
    </main>
</body>

</html>