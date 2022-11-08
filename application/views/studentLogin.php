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

    <header class="bg-white">
        <div class="row">
            <div class=" col-3 nav-logo">
                <img src="../../public/assets/images/logo.svg" alt="logo">
            </div>
            <nav class="col-6  nav-link flex header-nb">
                <a class="padding-3" href="index.html">Home</a>
                <a class="padding-3" href="feed.html">Feed</a>
                <a class="padding-3" href="listing.html">Listing</a>
            </nav>
            <div class="col-3 nav-signup flex ">
                <a href="signup.html"><button
                        class="header-2 border-black margin-2 bg-white black border-1 border-rounded">Sign
                        Up</button></a>
                <a href="signin.html"><button
                        class="header-2 border-black margin-2 bg-black white border-1 border-rounded">Sign
                        In</button></a>
            </div>
        </div>
    </header>
    <main class=" full-width position-absolute">
        <div class="row full-height">
            <div class="col-6 bg-light-grey flex">
                <img class="login-img" src="student-login.png">
            </div>
            <div class="col-6 bg-white flex">
            <p style="...">Student Sign In</p>
            <form style="...">
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