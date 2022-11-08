<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="../../public/assets/css/styles.css">
       <link rel="stylesheet" href="../../public/assets/css/style.css">
       <link rel="shortcut icon" href="../../public/assets/images/favicon.png" type="image/x-icon">

       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

       <title>Login | Student</title>
   </head>

<body>
    <div class="navbar">
        <div class="logo">
            <img class="logo-img" style="..." src="logo.png">
        </div>
        <div class="list-items">
            <a href="#">Home</a>
            <a href="#">listing</a>
            <a href="#">Feed</a>
        </div>
        <div class="buttons">
            <a class="sign-in-button-in-navbar" href="#">Sign In</a>
            <a class="sign-up-button-in-navbar" href="#">Sign Up</a>
        </div>
    </div>
    <div class="container">
        <div class="img-container">
            <img class="login-img" src="student-login.png">
        </div>
        <div class="form-container">
            <p style="...">Student Sign In</p>
            <form style="...">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                <label for="pwd">Password:</label><br>
                <input type="password" id="pwd" name="pwd" placeholder="Enter Password">
                <input class="sign-in-button" type="button" value="Sign In"><br>
                <p style="display: inline-block; font-size: 12px; padding-left: 2.5em;" >Don't have an account?&nbsp;</p><a class="register-link" href="#">Register</a>
            </form>
        </div>
    </div>

</body>
</html>