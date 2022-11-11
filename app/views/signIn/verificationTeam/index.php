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

    <title>Login | Verification</title>
</head>

<body>

    <?php
    $header = PATH . "/public/components/navigation/guest.php";
    include_once($header);
    ?>
    <main class=" full-width overflow-hidden position-absolute">
        <div class="row full-height">
            <div class="col-5 bg-white flex full-height">
                <div>
                    <h2 class="header-2">Verification Team Sign In</h2>
                    <form action="../Users" method="POST">
                        <label for="username" class="bold black">Username</label><br>
                        <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                        <label for="password" class="bold black">Password</label><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password">
                        <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded "
                            type="submit" value="Sign In"><br>
                        <p>Don't have an account? <a class="inverse" href="#">Register</a> </p>
                    </form>
                </div>
            </div>
            <div class="col-7 bg-light-grey flex  full-height">
                <div class=" padding-5 margin-top-5">
                    <img class=" fill-container " src="<?php echo BASEURL . '/public/images/verificationSignIn.svg' ?>">
                </div>
            </div>


        </div>
    </main>

</body>

</html>