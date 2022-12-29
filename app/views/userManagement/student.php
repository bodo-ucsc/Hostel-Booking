<?php
$header = new HTMLHeader("Student Management");
$nav = new Navigation('management');
$sidebar = new SidebarNav("user", "student");
$basePage = BASEURL . '/admin/userManagement/student';
$base = BASEURL . '/admin';
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">
                <div class="col-12 left fill-container">
                    <h1 class="header-1 ">
                        Student Management
                    </h1>
                </div>

                <div class="col-9 col-small-10 col-large-9 fill-container left">
                    <?php $search = new SearchUser("Student") ?>
                </div>
                <div class="col-1 display-small-none"></div>
                <div class="col-2 col-large-3 fill-container right">
                <button class="bg-blue white border-rounded header-nb padding-3 right" onclick=" location.href='<?= $base ?>/create/student'">
                        <i data-feather="user-plus" class=" vertical-align-middle "></i>
                        <span class="display-large-inline-block padding-left-2 display-none">Add User</span>
                    </button>
                </div>
            </div>




            <div class="row margin-top-5 fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div
                            class="col-8 col-small-9 table fill-container border-rounded-more-left padding-top-4 padding-bottom-5 shadow-small bg-white ">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-2  text-overflow bold">First Name</div>
                                <div class="col-2  text-overflow bold">Last Name</div>
                                <div class="col-2  text-overflow bold">User Name</div>
                                <div class="col-4  text-overflow bold">Email</div>
                                <div class="col-4  text-overflow bold">University</div>
                                <div class="col-2  text-overflow bold">Uni ID</div>
                                <div class="col-2  text-overflow bold">Verified</div>
                                <div class="col-2  text-overflow bold">DOB</div>
                                <div class="col-2  text-overflow bold">Gender</div>
                                <div class="col-3  text-overflow bold">NIC</div>
                                <div class="col-3  text-overflow bold">Contact</div>
                                <div class="col-4  text-overflow bold">Address</div>
                            </div>
                            <?php
                            if (isset($data['result'])) {
                                $useridArray = array();
                                while ($row = $data['result']->fetch_assoc()) {
                                    array_push($useridArray, $row['UserId']);
                                    $gender = $row['Gender'];
                                    if ($gender == 'm') {
                                        $gender = 'Male';
                                    } else {
                                        $gender = 'Female';
                                    }
                                    $verifiedStatus = $row['VerifiedStatus'];
                                    if($verifiedStatus == "verified"){
                                        $verifiedstyle = " border-accent accent";
                                    }else{
                                        $verifiedstyle = " border-grey grey";
                                        $verifiedStatus = "not verified";
                                    }
                                    echo "<div class='hs padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                    echo "<div class='col-2  text-overflow ' title='" . $row['FirstName'] . "' >" . $row['FirstName'] . "</div>";
                                    echo "<div class='col-2  text-overflow ' title='" . $row['LastName'] . "' >" . $row['LastName'] . "</div>";
                                    echo "<div class='col-2  text-overflow ' title='" . $row['Username'] . "' >" . $row['Username'] . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['Email'] . "' >" . $row['Email'] . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['StudentUniversity'] . "' >" . $row['StudentUniversity'] . "</div>";
                                    echo "<div class='col-2  text-overflow ' title='" . $row['UniversityIDNo'] . "' >" . $row['UniversityIDNo'] . "</div>";
                                    echo "<div class='col-2 text-overflow ' title=' $verifiedStatus ' > <span class=' border-1 border-rounded-more small padding-horizontal-2 $verifiedstyle'> $verifiedStatus  </span></div>";
                                    echo "<div class='col-2  text-overflow ' title='" . $row['DateOfBirth'] . "' >" . $row['DateOfBirth'] . "</div>";
                                    echo "<div class='col-2  text-overflow ' title=' $gender'>$gender</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['NIC'] . "' >" . $row['NIC'] . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['ContactNumber'] . "' >" . $row['ContactNumber'] . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['Address'] . "' >" . $row['Address'] . "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>

                        </div>
                        <div
                            class="col-4 col-small-3 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($useridArray)) {
                                foreach ($useridArray as $userid) {
                                    echo "<div class='row less-gap padding-1 padding-horizontal-3'>";
                                    echo "<div class='col-6 fill-container '>";
                                    echo "<a href='" . $basePage . "Edit/$userid'><div class=' fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='edit' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Edit</span>";
                                    echo "</div></a>";
                                    echo "</div>";

                                    echo "<div class='col-6 fill-container '>";
                                    echo "<a href='" . $basePage . "Delete/$userid'><div class=' fill-container border-red bg-white red-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='trash' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Delete</span>";
                                    echo "</div></a>";

                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row no-gap fill-container ">
                        <div class="col-small-6 display-small-block  display-none  fill-container">
                            <?php
                            if (isset($data['rowCount']) && isset($data['page']) && isset($data['perPage'])) {
                                echo '<span class="padding-horizontal-4">' . $data["perPage"] . ' entries per page (Total ' . $data["rowCount"] . ' entries)</span>';
                            }
                            ?>
                        </div>
                        <div class="col-12 col-small-6 padding-vertical-2 fill-container right">
                            <div class="pagination right padding-right-4">
                                <?php
                                if (isset($data['rowCount']) && isset($data['perPage'])) {
                                    $pages = ceil($data['rowCount'] / $data['perPage']);


                                    if ($data['page'] > 1) {
                                        echo "  <a href='$basePage/1'>
                                                    <button class='shadow-small bg-white'><i class='feather-body vertical-align-middle' data-feather='chevrons-left'></i></button>
                                                </a>";
                                        echo "  <a href='$basePage/" . ($data['page'] - 1) . "'>
                                                        <button class='shadow-small bg-white'><i class='feather-body vertical-align-middle' data-feather='chevron-left'></i></button>
                                                    </a>";
                                    } else {
                                        echo "  <a >
                                                    <button class='shadow-small bg-white grey'><i class='feather-body vertical-align-middle' data-feather='chevrons-left'></i></button>
                                                </a>";
                                        echo "<a >
                                            <button class='shadow-small bg-white grey'><i class='feather-body vertical-align-middle' data-feather='chevron-left'></i></button>
                                        </a>";
                                    }

                                    for ($i = 1; $i <= $pages; $i++) {
                                        if ($i == $data['page']) {
                                            echo "<button class='shadow-small padding-3 bg-blue white '>$i</button>";
                                        } else {
                                            echo "  <a href='$basePage/$i'>
                                                            <button  class='shadow-small bg-white padding-3 '>$i</button>
                                                        </a>";
                                        }
                                    }


                                    if ($data['page'] < $pages) {
                                        echo "  <a href='$basePage/" . ($data['page'] + 1) . "'>
                                                        <button class='shadow-small bg-white'><i class='feather-body vertical-align-middle' data-feather='chevron-right'></i></button>
                                                    </a>";
                                        echo "  <a href='$basePage/$pages'>
                                                    <button class='shadow-small bg-white'><i class='feather-body vertical-align-middle' data-feather='chevrons-right'></i></button>
                                                </a>";
                                    } else {
                                        echo "  <a >
                                                    <button class='shadow-small bg-white grey'><i class='feather-body vertical-align-middle' data-feather='chevron-right'></i></button>
                                                </a>";
                                        echo "<a >
                                            <button class='shadow-small bg-white grey'><i class='feather-body vertical-align-middle' data-feather='chevrons-right'></i></button>
                                        </a>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>