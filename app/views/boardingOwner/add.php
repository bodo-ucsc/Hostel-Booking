<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Add Boarding Owner</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="form">
        <a href="home.php">Back To Home</a>
    </div>
    <div class="">
        <h1>Add Boarding Owner</h1></br></br>
        <form action="processAdd" method="POST" novalidate>

            <div class="inpt">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="lbl" name="fname" />
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="lbl" name="lname" />
                </div>

                <div class="form-group">
                    <label>NIC</label>
                    <input type="text" class="lbl" placeholder="" name="nic" maxlength="12" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="lbl" placeholder="sample@gmail.com" name="email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="lbl" placeholder="Enter password" name="password" required>
                </div>
                <div>
                    <label for="ComPassword ">Confirm Password</label>
                    <input class="lbl" type="password" id="ComPassword" placeholder="Confirm password" name="ComPassword">
                    <br /><br />
                </div>

                <div class="form-group">

                    <label>Gender</label></br>

                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label></br>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>

                </div>

                <div class="form-group">
                    <label>Date Of Birth<input type="date" class="lbl" name="DOB" /></label>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    </br>
                    <label>Postal code<input type="text" class="lbl" name="postcode" /></label>
                    <label>Street<input type="text" class="lbl" name="street" /></label>
                    <label>City<input type="text" class="lbl" name="city" /></label>
                </div>

                <div class="form-group">
                    <label>Contact No</label>
                    <input type="tel" class="lbl" placeholder="07X XXX XXXX" name="contactNo" maxlength="10">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-danger" name="btn">
                </div>
            </div>
        </form>
    </div>

    
    <!-- <?php

    if (isset($_POST["btn"])) {


        // if (empty($_POST["name"])) {
        //     die("Name is required");
        // }

        // if(!empty($_POST['email']) || ! filter_var($_POST["email"])) {
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
            if ($date < $DOB) {
                die("Date Of Birth is a future date");
            } else {
                include("connect.php");

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $nic = $_POST['nic'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $DOB = $_POST['DOB'];
                $postcode = $_POST['postcode'];
                $street = $_POST['street'];
                $city = $_POST['city'];
                $contactNo = $_POST['contactNo'];


                $record = "INSERT into boardingowner (fname,lname,nic,email,password,gender,DOB,postcode,street,city,contactNo)
               VALUES ('$fname','$lname','$nic','$email','$password','$gender','$DOB','$postcode','$street','$city','$contactNo')";

                $res = mysqli_query($connection, $record);

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

    ?>
    -->

</body>

</html>