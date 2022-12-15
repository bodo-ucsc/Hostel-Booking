<?php
$header = new HTMLHeader("Admin");
$nav = new Navigation('management');
$sidebar = new SidebarNav("user", "admin");
$basePage = BASEURL . '/admin';
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">
                <div class="col-12 left fill-container">
                    <h1 class="header-1 ">
                        Admin
                    </h1>
                </div>
 
            </div>




            <div class="row margin-top-5 fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div class="col-12 table fill-container border-rounded-more padding-top-4 padding-bottom-5 shadow-small bg-white ">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-4  text-overflow bold">First Name</div>
                                <div class="col-4  text-overflow bold">Last Name</div>
                                <div class="col-4  text-overflow bold">User Name</div> 
                                <div class="col-4  text-overflow bold">Email</div>
                                <div class="col-3  text-overflow bold">Contact</div> 
                            </div>
                            <?php
                            if (isset($data['result'])) {
                                $useridArray = array();
                                while ($row = $data['result']->fetch_assoc()) {
                                    array_push($useridArray, $row['UserId']); 
                                    echo "<div class='hs padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['FirstName'] . "' >" . $row['FirstName'] . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['LastName'] . "' >" . $row['LastName'] . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['Username'] . "' >" . $row['Username'] . "</div>"; 
                                    echo "<div class='col-4  text-overflow ' title='" . $row['Email'] . "' >" . $row['Email'] . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['ContactNumber'] . "' >" . $row['ContactNumber'] . "</div>"; 
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