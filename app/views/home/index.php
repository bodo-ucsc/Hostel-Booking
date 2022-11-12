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

    <title>Home</title>
</head>

<body>

    <?php
    $header = "components/navigation/guest.php";
    include_once($header);
    ?>

    <main>
        <div class="container padding-top-5">
            <div class="padding-top-5">
                Hello

                <?php

                session_start();

                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    echo ' <br><a href="' . BASEURL . '/home/signout">Sign Out</a>  <br>';
                } else {
                    echo '<br>You are not logged in';
                }

                ?>


                <br>
                <a href="<?php echo BASEURL ?>/file1">click</a>

            </div>
        </div>

    </main>


</body>

</html>