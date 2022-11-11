<?php

if (isset($_POST["btn"])) {
    include("connect.php");



    // if( !empty($_POST['email']) || !filter_var($_POST["email"])) {
    //     die("Vlaid email is required");
    // }
    // if(strlen($_POST["password"])<  8){
    //     die("password must be at least 8 characters");
    // }
    // if(! preg_match("/[a-z]/i",$_POST["password"])){
    //     die("password must contain at least one letter");
    // }

    // if(! preg_match("/[0-9]/i",$_POST["password"])){
    //     die("password must contain at least one number");
    // }


    if ($_POST["password"] !== $_POST["ComPassword"]) {
        die("both password must be match");
    } else {

        $date = date_create();
        if ($date < $_POST["DOB"]) {
            die("Date Of Birth is a future date");
        } else {

            $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $mysqli = require __DIR__ . "/database";

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $nic = $_POST['nic'];
            $email = $_POST['email'];
            $password = $passwordHash;
            $gender = $_POST['gender'];
            $DOB = $_POST['DOB'];
            $postcode = $_POST['postcode'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $contactNo = $_POST['contactNo'];

            $sql = "INSERT into boardingowner (fname,lname,nic,email,password,gender,DOB,postcode,street,city,contactNo)
        VALUES ('$fname','$lname','$nic','$email','$password','$gender','$DOB','$postcode','$street','$city','$contactNo')";

            //         $sql = "INSERT INTO boardingowner (name, email, passwordHash)
            // VALUES (?, ?, ?)";

            $res = mysqli_query($connection, $sql);
            if (!$res) {
?>
                <p><?php echo "Record Not Inserted"; ?></p>
            <?php
            } else {
            ?>
                <p><?php echo "Record Successfully Inserted"; ?></p>
<?php
            }
        }
    }
}
// print_r($_POST);
// var_dump($passwordHash);

?>