<?php

// $is_invalid = false;

// if ($_SERVER["REQUEST_METHOD"] === "POST") {

//     $mysqli = require __DIR__ . "/database.php";

//     $sql = sprintf(
//         "SELECT * FROM user WHERE email ='%s'",
//         $mysqli->real_escape_string($_POST["email"])
//     );

//     $result = $mysqli->query($sql);

//     $user = $result->fetch_assoc();

//     if ($user) {

//         if (password_verify($_POST["password"], $user["passwordHash"])) {
//             // die("Login successfull");
//             session_start();
//             session_regenerate_id();
//             $_SESSION["user_id"] = $user["id"];
//             header("Location: ./tmp.php");  
            
//         }
//     }
//     $is_invalid = true;
// }else{
//     echo "Invalid request";
// }

?>


<!-- 
<!DOCTYPE html>

<html>

<head>
    <title>Sign in</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="signup">
        <h1><img src="./MVC/public/images/logo.svg"></h1>
            <h2>Admin Sign In</h2>

            <?php //if ($is_invalid) : ?>
                <em>invalid login</em>
            <?php //endif; ?>

            <form method="post" class="fm">
                <div class="inpt">

                    <label>UserName</label><br/>
                    <input class="lbl" type="email" id="email" placeholder="Enter username" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                    <br /><br />

                    <label>Password</label><br/>
                    <input class="lbl" type="password" placeholder="Enter password" id="password" name="password" required>
                    <br /><br />

                    <button class="btn">Sign In</button>
                    <br/>
                    <a href="#">Forgot Password?</a>
                </div>
    </div>
    <br /><br />
    <button><a href="index.php">Back To Home</a></button>
    </form>
    </div>
</body>

</html> -->

        