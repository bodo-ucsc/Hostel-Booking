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

    <title>Login | Student</title>
</head>

<body>

    <?php 
        $header = "components/navigation/guest.php";
        include_once($header); 
    ?>


    <main class=" full-width position-absolute">
        <div class="row full-height">
            <div class="col-6 bg-light-grey flex">
                <img class="login-img" src="student-login.png">
            </div>
            <div class="col-6 bg-white flex">
                <p>Student Sign In</p>
                <form>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                    <label for="pwd">Password:</label><br>
                    <input type="password" id="pwd" name="pwd" placeholder="Enter Password">
                    <input class="sign-in-button" type="button" value="Sign In"><br>
                    <p style="display: inline-block; font-size: 12px; padding-left: 2.5em;">Don't have an account?&nbsp;
                    </p><a class="register-link" href="#">Register</a>
                </form>

               
            </div>

        </div>
    </main>

</body>

</html>