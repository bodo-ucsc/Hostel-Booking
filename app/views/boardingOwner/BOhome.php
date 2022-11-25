<?php
$header = new HTMLHeader("Register | Boarding Owner");
$nav = new Navigation("home");
$sidebar = new SidebarNav("user", "Boarding Owner");
?>
<main class="  full-width">
  <div class=" row sidebar-offset navbar-offset ">
    <div class="col-12 col-medium-12 width-90">


      <div class="row ">
        <div class="col-12 col-medium-8 fill-container left">
          <div>
            <span class=" header-2">Boarding Owner Listing</span>
          </div>

          <?php
          $header =   new Search();
          ?>
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
            while ($row = $data->fetch_assoc()) {
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

                <td><button><a href="<?php echo BASEURL ?>/adminhome/editboardingOwner/<?php echo $row['user_id']; ?>" class="card-link">Edit</a></button>
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
  <?php //else { 
  ?>

  <!-- <div class=" full-width overflow-hidden ">

        <div class=" row full-height ">
          <div class=" col-5 bg-white flex shadow border-rounded  position-absolute padding-5 ">
            <div>
              <P>Please Sign In first</P>
              <P><button><a href="../signIn/admin">Sign In </a></button></P>
            </div>
          </div>
        </div>
      </div> -->

  <?php
  // }  
  ?>

  </div>
  </div>
  </div>
  </div>
</main>
<?php
$footer = new HTMLFooter();

?>