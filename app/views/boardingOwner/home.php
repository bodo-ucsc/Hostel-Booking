<?php
session_start();
include("connect.php");


if (!isset($_POST['btn'])) {
} else {
  $q = "select * from boardingOwner";
  $query = mysqli_query($connection, $q);
}
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

  <title>Admin | BoardingOnwer</title>
</head>

<body>


  <?php
  $header =   "components/navigation/guest.php";
  include_once($header);
  ?>
  <main>
    <main class=" full-width overflow-hidden position-absolute">
      <div class="row full-height ">
        <div class="">
          <div>

            <?php

            if (isset($_SESSION["username"])) { ?>

              <div>
                <h1>Boarding Owner Listing</h1>
                </br></br>
                <a href="add">Add Boarding Owner</a></br></br>

              </div>

              <?php

              //$sql = "SELECT fname,lname,nic,email,gender,password,postcode,street,city,contactNo FROM boardingowner";
              $sql = "SELECT * FROM boardingowner";
              $result = $connection->query($sql);

              if ($result->num_rows > 0) {
              ?>

                <div class="tbl">
                  <table border="1" cellspacing="0" cellpadding="3">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>NIC</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>PostCode</th>
                      <th>Street</th>
                      <th>City</th>
                      <th>ContactNo</th>
                      <th>Action</th>
                    </tr>

                    <!-- // output data of each row -->
                    <?php
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                      <tr>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['nic']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['DOB']; ?></td>
                        <td><?php echo $row['postcode']; ?></td>
                        <td><?php echo $row['street']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['contactNo']; ?></td>
                        <td><button><a href="update.php?id=<?php echo $qq['id']; ?>" class="card-link">Edit</a></button>
                          <button><a href="delete.php?id=<?php echo $qq['id']; ?>" class="card-link">Delete</a></button>
                        </td>

                      </tr>

                  <?php
                    }
                  } else {
                    echo "0 results";
                  }

                  ?>
                  </table>
                </div>
                <?php $connection->close(); ?>

                <div>
                  <br />
                  <button><a href="../adminhome">Back</a></button></br>
                  <button><a href="../signout">Logout</a></button>
                </div>

              <?php } else { ?>

                <P>Please Sign In first</P>
                <P><a href="../signIn/admin">Sign In </a></P>

              <?php }  ?>

          </div>
        </div>
      </div>
    </main>
</body>

</html>