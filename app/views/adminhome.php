<?php
//session_start();
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
    $header =   new Navigation();
    ?>

    <?php

    if (isset($_SESSION["username"])) {
        $sidebar = new SideBarNav("user", "admin");
    ?>
        <!-- <div class=" margin-top-5  margin-top-4 padding-top-5 position-absolute">
            <div class="">
                <ul>
                    <li><a href="<?php echo BASEURL ?>/adminhome">Admin Home</a></li>
                    <li><a href="<?php echo BASEURL ?>/adminhome/managestudent">Student</a></li>
                    <li><a href="<?php echo BASEURL ?>/adminhome/manageprofessional">Professional</a></li>
                    <li><a href="<?php echo BASEURL ?>/adminhome/viewboardingOwner">Boarding Owner</a></li>
                    <li><a href="#">Property</a></li>
                </ul>
            </div>
        </div> -->

        <main class=" full-width full-height overflow-hidden ">

            <div class=" row sidebar-offset full-height ">
                <div class=" col-5 bg-white flex shadow border-rounded  position-absolute padding-5 ">
                    <div>

                        <?php

                        //$mysql = require __DIR__ . "../../Config.php";
                        //$sql = "SELECT * FROM multi WHERE id= {$_SESSION["username"]}";
                        // $result = $mysqli->query($sql);
                        //$user = $result->fetch_assoc();

                        ?>
                        <div class="header-1">Admin Home</div>

                        <h2>Hello <?= htmlspecialchars($_SESSION["username"]) ?> </h2>

                        <button><a href="<?php echo BASEURL ?>/adminhome/viewboardingOwner">Boarding owner Manage</a></button>
                        <button><a href="#">Property Manage</a></button>
                        <button><a href="<?php echo BASEURL ?>/adminhome/viewstudent">Student Manage</a></button>
                        <button><a href="<?php echo BASEURL ?>/adminhome/viewprofessional">Professional Manage</a></button>
                        <button><a href="#">Verification Team Manage</a></button>

                        <!-- <br><br><br>
                        <button><a href="home/signout">Sign out</a><button> -->

                    <?php } else { ?>

                        <div class=" full-width overflow-hidden ">

                            <div class=" row full-height ">
                                <div class=" col-5 bg-white flex shadow border-rounded  position-absolute padding-5 ">
                                    <div>
                                        <P>Please Sign In first</P>
                                        <P><button><a href="signin/admin">Sign In </a></button></P>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                    </div>
                </div>
            </div>

        </main>
</body>

</html>