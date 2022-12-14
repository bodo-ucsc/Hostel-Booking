<?php
$header = new HTMLHeader("Register | Boarding Owner");
$nav = new Navigation("home");
$sidebar = new SidebarNav("user", "boardingOwner");
$basePage = BASEURL . '/boardingOwner';
?>
<main class="  full-width">
  <div class=" row sidebar-offset navbar-offset ">
    <div class="col-12 col-medium-12 width-90">


      <div class="row ">
        <div class="col-12 col-medium-8 fill-container left">
          <div>
            <span class=" header-2">Boarding Owner Listing</span>
          </div>

          <div class="col-9 col-small-10 col-large-9 fill-container left">
            <?php $search = new SearchUser("Boarding Owner") ?>
          </div>
        </div>
        <div class="col-1 display-small-none"></div>
      </div>
      <div class="col-2 col-large-3 fill-container right">
        <a href="<?php echo BASEURL ?>/adminhome/addBoardingOwner">
          <button class=" bg-blue white border-rounded header-nb  padding-3 right">
            <i data-feather="plus" class=" vertical-align-bottom padding-right-2"></i>
            <span class=" header-nb">
              Add Boarding Owners</span></button></a>
      </div>


      <div class="row margin-top-5 fill-container">
        <div class="shadow-small border-rounded-more fill-container col-12">
          <div class="row no-gap fill-container">

            <div class="col-8 col-small-9 table fill-container border-rounded-more-left padding-top-4 padding-bottom-5 shadow-small bg-white ">
              <div class="hs padding-horizontal-5 padding-vertical-3">
                <div class="col-2  text-overflow bold">First Name</div>
                <div class="col-2  text-overflow bold">Last Name</div>
                <div class="col-2  text-overflow bold">User Name</div>
                <div class="col-2  text-overflow bold">DOB</div>
                <div class="col-2  text-overflow bold">Gender</div>
                <div class="col-3  text-overflow bold">NIC</div>
                <div class="col-3  text-overflow bold">Email</div>
                <div class="col-3  text-overflow bold">Contact</div>
                <div class="col-4  text-overflow bold">Address</div>
              </div>
              <?php

              //$row = $data['info'];
              if ($data) {
                $useridArray = array();
                while ($row = $data->fetch_assoc()) {

                  array_push($useridArray, $row['UserId']);
                  $gender = $row['Gender'];
                  if ($gender == 'm') {
                    $gender = 'Male';
                  } else {
                    $gender = 'Female';
                  }

                  echo "<div class='hs padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                  echo "<div class='col-2  text-overflow ' title='" . $row['FirstName'] . "' >" . $row['FirstName'] . "</div>";
                  echo "<div class='col-2  text-overflow ' title='" . $row['LastName'] . "' >" . $row['LastName'] . "</div>";
                  echo "<div class='col-2  text-overflow ' title='" . $row['Username'] . "' >" . $row['Username'] . "</div>";
                  echo "<div class='col-2  text-overflow ' title='" . $row['DateOfBirth'] . "' >" . $row['DateOfBirth'] . "</div>";
                  echo "<div class='col-2  text-overflow ' title=' $gender'>$gender</div>";
                  echo "<div class='col-3  text-overflow ' title='" . $row['NIC'] . "' >" . $row['NIC'] . "</div>";
                  echo "<div class='col-3  text-overflow ' title='" . $row['Email'] . "' >" . $row['Email'] . "</div>";
                  echo "<div class='col-3  text-overflow ' title='" . $row['ContactNumber'] . "' >" . $row['ContactNumber'] . "</div>";
                  echo "<div class='col-4  text-overflow ' title='" . $row['Address'] . "' >" . $row['Address'] . "</div>";
                  echo "</div>";
                }
              } else {
                echo "0 results";
              }
              ?>
            </div>
            <div class="col-4 col-small-3 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
              <div class="col-12 fill-container padding-3 bold ">Actions</div>

              <?php
              if (isset($useridArray)) {
                foreach ($useridArray as $userid) {
                  echo "<div class='row less-gap padding-1 padding-horizontal-3'>";
                  echo "<div class='col-6 fill-container '>";
                  echo "<a href='$basePage/editBO/$userid'><div class=' fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>";
                  echo "<i data-feather='edit' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Edit</span>";
                  echo "</div></a>";
                  echo "</div>";

                  echo "<div class='col-6 fill-container '>";
                  echo "<a href='$basePage/deleteBO/$userid'><div class=' fill-container border-red bg-white red-hover border-1 border-rounded padding-vertical-1  center'>";
                  echo "<i data-feather='trash' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Delete</span>";
                  echo "</div></a>";

                  echo "</div>";
                  echo "</div>";
                }
              }
              ?>
            </div>
          </div>
          </div>
           
            <!-- <button><a href="<?php echo BASEURL ?>/boardingOwner/editBO/<?php echo $row['UserId']; ?>" class="card-link">Edit</a></button>
              <button><a href="<?php echo BASEURL ?>/boardingOwner/deleteBO/<?php echo $row['UserId']; ?>" class="card-link" onclick="return confirm('Are you sure, Do you want to delete this user?')">Delete</a></button> -->
            
        </div>
      </div>
    </div>
  </div>

</main>



<?php
$footer = new HTMLFooter();

?>