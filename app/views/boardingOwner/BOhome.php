<?php
//session_start();
include("connect.php");


if (!isset($_POST['btn'])) {
} else {
  $q = "select * from boardingowner";
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

  <div class="row">
    <?php
    $header =   "components/navigation/guest.php";
    include_once($header);
    ?>
  </div>
  <main class=" position-absolute">
    <div class=" center ">
      <div class="">
        <div>

          <?php
          
          if (isset($_SESSION["username"])) { ?>
            <div class="header-1 margin-5 padding-vertical-5 small">
              <h1>Boarding Owner Listing</h1>
            </div>
            <div class=" container">
              </br></br>
              <button class=" bg-neutral"><a href="addBoardingOwner">Add Boarding Owner</a></button></br></br>
            </div>

            <?php

            //$sql = "SELECT fname,lname,nic,email,gender,password,postcode,street,city,contactNo FROM boardingowner";
            $sql = "SELECT * FROM boardingowner";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
            ?>

              <div class=" center col-12 container">
                <table border="1" cellspacing="0" cellpadding="3">
                  <tr>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>First Name</th>
                      <th>Last Name</th>
                      <th>NIC</th>
                      <th>Email</th>
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
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['password']; ?></td>
                      <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['nic']; ?></td>
                        <td><?php echo $row['email']; ?></td>
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

              <div class=" container">
                <br />
                <button><a href="../adminhome">Back</a></button></br>
                <button><a href="../adminhome/signout">Sign out</a></button>
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