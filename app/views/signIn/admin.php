<?php
$header = new HTMLHeader("Login | Admin");
$nav = new Navigation("home");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo BASEURL . '/public/styles/styles.css' ?>">
    <link rel="shortcut icon" href=" <?php echo BASEURL . '/public/images/favicon.png' ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Login | Admin</title>
</head>

<body>

    <?php
        $header =   new Navigation();
    ?>
    <main class=" full-width overflow-hidden position-absolute">
        <div class="row">
            <div class="col-12 bg-white flex full-height">
                <div class="shadow padding-5">
                    <div class="row">
                        <div class="col-12">
                            <img class=" fill-container " src="<?php echo BASEURL . '/public/images/logo.svg' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="header-2">Admin Sign In</h2>
                            <form action="adminLogin" method="post">
                                <label for="username" class="bold black">Username</label><br>
                                <input type="text" id="username" name="username" placeholder="Enter Username"><br>
                                <label for="password" class="bold black">Password</label><br>
                                <input type="password" id="password" name="password" placeholder="Enter Password">
                                <input class=" bg-accent-hover white-hover fill-container bold padded border-rounded " type="submit" value="Sign In"><br>
                                <a class="center" href="#">Forgot Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</main>

<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>