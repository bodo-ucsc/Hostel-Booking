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

    $header =   new Navigation();
    
    ?>

  </div>
  <?php if (isset($_SESSION["username"])) { 
    $sidebar = new SideBarNav("user","admin"); 
    ?>


    <!-- <div class=" margin-top-5  margin-top-4 padding-top-5 position-absolute">
      <div class="">
        <ul>
          <li><a href="<?php echo BASEURL ?>/adminhome">Admin Home</a></li>
          <li><a href="<?php echo BASEURL ?>/adminhome/managestudent">Student</a></li>
          <li><a href="<?php echo BASEURL ?>/adminhome/manageprofessional"">Professional</a></li>
      <li><a href=" <?php echo BASEURL ?>/adminhome/manageboardingOwner">Boarding Owner</a></li>
          <li><a href="#">Property</a></li>
        </ul>
      </div>
    </div> -->

    <main class="  full-width full-height overflow-hidden ">

      <div class=" row sidebar-offset full-height ">
      <!-- <div class=" margin-left-5 padding-left-5 full-height"> -->
        <div class="  margin-top-5">
          <div class=" margin-left-5 full-height margin-top-5 ">
            <div>
              <!-- margin-left-3 header-1  margin-top-5 padding-top-5 small -->
              <div>
                <span class=" header-1 ">Boarding Owner Listing</span>
              </div>
              <div class=" margin-left-3">
                </br></br>
                <button class=" bg-neutral"><a href="addBoardingOwner">Add Boarding Owner</a></button></br></br>

                <?php

                //$sql = "SELECT fname,lname,nic,email,gender,password,postcode,street,city,contactNo FROM boardingowner";
                $sql = "SELECT * FROM boardingowner";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                ?>
                  <div class=" center">
                    <table border="1" cellspacing="0" cellpadding="3">
                      <tr>
                        <th>User Name</th>
                        <!-- <th>Password</th> -->
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <!-- <th>PostCode</th>
                      <th>Street</th> -->
                        <th>Address</th>
                        <th>ContactNo</th>
                        <th>Action</th>
                      </tr>


                      <?php
                      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                      ?>
                        <tr>
                          <td><?php echo $row['username']; ?></td>
                          <!-- <td><?php echo $row['password']; ?></td> -->
                          <td><?php echo $row['first_name']; ?></td>
                          <td><?php echo $row['last_name']; ?></td>
                          <td><?php echo $row['nic']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo $row['DOB']; ?></td>
                          <!-- <td><?php echo $row['postcode']; ?></td>
                        <td><?php echo $row['street']; ?></td> -->
                          <td><?php echo $row['address']; ?></td>
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

                    <?php $connection->close(); ?>
                  </div>
                  <div class=" ">
                    <br />
                    <button><a href="../adminhome">Back</a></button></br>
                    <button><a href="../adminhome/signout">Sign out</a></button>
                  </div>
              </div>
            <?php } else { ?>

              <div class=" full-width overflow-hidden ">

                <div class=" row full-height ">
                  <div class=" col-5 bg-white flex shadow border-rounded  position-absolute padding-5 ">
                    <div>
                      <P>Please Sign In first</P>
                      <P><button><a href="../signIn/admin">Sign In </a></button></P>
                    </div>
                  </div>
                </div>
              </div>

            <?php }  ?>

            </div>
          </div>
        </div>
      </div>
    </main>
</body>

</html>