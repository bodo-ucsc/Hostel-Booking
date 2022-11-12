<?php
session_start();
?>

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

    <title>Admin | Home</title>
</head>

<body>

    <?php
    $header =   "components/navigation/guest.php";
    include_once($header);
    ?>
    <main class=" full-width overflow-hidden position-absolute"">
        
    <div class="row full-height ">
        <div class="col-5 bg-white flex shadow border-rounded">
            <div>

  
        <?php

        if (isset($_SESSION["username"])) {

            //$mysql = require __DIR__ . "../../Config.php";
            //$sql = "SELECT * FROM multi WHERE id= {$_SESSION["username"]}";
            // $result = $mysqli->query($sql);
            //$user = $result->fetch_assoc();

        ?>
            <h1>Admin Home</h1>
            <h2>Hello <?= htmlspecialchars($_SESSION["username"]) ?> </h2>

            <!-- <button><a href="./boardingOwner/home.php">Boarding owner Manage</a></button> -->
            <button><a href="adminhome/manageboardingOwner">Boarding owner Manage</a></button>
            <button><a href="#">Boarder Manage</a></button>
            <button><a href="#">Verification Team Manage</a></button>
            <!-- <P><a href="signout">Sign out</a></P> -->
            <P><a href="adminhome/signout">Sign out</a></P>


        <?php } else { ?>

            <P>Please Sign In first</P>
            <P><a href="signin/admin">Sign In </a></P>

        <?php }; ?>
        </div>
        </div>
    </div>

        </main>
</body>

</html>