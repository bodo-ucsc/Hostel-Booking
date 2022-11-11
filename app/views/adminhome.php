<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="login">
        <h1><img src="./img/logo.jpeg"></h1>



        <?php

        if (isset($_SESSION["username"])) {

            //$mysql = require __DIR__ . "../../Config.php";
            //$sql = "SELECT * FROM multi WHERE id= {$_SESSION["username"]}";
            // $result = $mysqli->query($sql);
            //$user = $result->fetch_assoc();


        ?>
            <h2>Admin Home</h2>
            <p>Hello <?= htmlspecialchars($_SESSION["username"]) ?> </p>

            <!-- <button><a href="./boardingOwner/home.php">Boarding owner Manage</a></button> -->
            <button><a href="#">Boarding owner Manage</a></button>
            <button><a href="#">Boarder Manage</a></button>
            <button><a href="#">Verification Team Manage</a></button>
            <P><a href="signout">Sign out</a></P>


        <?php } else { ?>

            <P>Please Sign In first</P>
            <P><a href="signin/admin">Sign In </a></P>

        <?php }; ?>


    </div>
</body>

</html>