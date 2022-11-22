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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">heet">

  <title>Admin | BoardingOnwer</title>
</head>

<body>

  <div class="row">
    <?php
    $header =   new Navigation();
    ?>

  </div>
  <?php if (isset($_SESSION["username"])) {
    $sidebar = new SideBarNav("user", "admin");
  ?>


    <!-- <div class=" margin-top-5  margin-top-4 padding-top-5 position-absolute">
      <div class="">
        <ul>
          <li><a href="<?php echo BASEURL ?>/adminhome">Admin Home</a></li>
          <li><a href="<?php echo BASEURL ?>/adminhome/viewstudent">Student</a></li>
          <li><a href="<?php echo BASEURL ?>/adminhome/viewprofessional"">Professional</a></li>
      <li><a href=" <?php echo BASEURL ?>/adminhome/viewboardingOwner">Boarding Owner</a></li>
          <li><a href="#">Property</a></li>
        </ul>
      </div>
    </div> -->

    <main class="  full-width full-height overflow-hidden ">
      <div class=" row sidebar-offset full-height ">
        <div class="  margin-top-5">
          <div class=" margin-left-5 full-height margin-top-5 ">
            <div>
              <div>
                <span class=" header-2">Boarding Owner Listing</span>
              </div>

              <!-- <div class=" margin-top-4  width-90">
                <?php
                $header =   new Search();
                ?>
              </div> -->

              <div class='row border-rounded-more margin-top-4'>
                <div class='col-small-1 col-1 '>
                  <i data-feather='search'></i>
                </div>
                <div class='col-small-5 col-7 fill-container'>
                  <input class=' header-nb border-none fill-container' type='text' placeholder='Find boarding owners'>
                </div>
                <div class='col-small-1 col-2 fill-container'>
                  <button class=' fill-container bg-black-hover white-hover border-rounded-more'>Search</button>
                </div>
              </div>

              <button class=" bg-blue border-rounded-more margin-bottom-3 margin-top-3">
                <a href="<?php echo BASEURL ?>/adminhome/addBoardingOwner" class=" white white-hover">Add Boarding Owners</a></button>

              <?php

              if ($data) {
              ?>

                <div class="bg-white shadow border-rounded padding-1 full-width ">
                  <table cellspacing="4" cellpadding="9">
                    <div class=" grey">
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                      </tr>
                    </div>
                    <?php
                    while($row =$data->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['nic']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['DOB']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contactNo']; ?></td>

                        <td><button><a href= "<?php echo BASEURL ?>/adminhome/editboardingOwner/<?php echo $row['user_id']; ?>" class="card-link">Edit</a></button>
                          <button><a href="<?php echo BASEURL ?>/adminhome/deleteboardingOwner/<?php echo $row['user_id']; ?>" class="card-link" onclick="return confirm('Are you sure, Do you want to delete this user?')">Delete</a></button>
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
            </div>
          </div>
          <div class="">
            <br />
            <!-- <button><a href="../adminhome">Back</a></button></br>
            <button><a href="../home/signout">Sign out</a></button> -->
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