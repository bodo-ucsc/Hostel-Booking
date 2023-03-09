<?php
$type = ucfirst($data['type']);
$header = new HTMLHeader("Support | $type");
$nav = new Navigation('management');
$sidebar = new SidebarNav("support","$type");
$basePage = BASEURL . "/admin/support/$type";
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">

                <div class="col-12 col-medium-8 fill-container left">
                    <h1 class="header-1 ">
                        Support | <?php echo $type ?>
                    </h1>
                </div>
                <div class="col-12 col-medium-4 fill-container right">
                    <button class="bg-blue white border-rounded header-nb padding-3 right" onclick="location.href='<?php echo BASEURL ?>/admin/addSupport/<?php echo $type ?>' ">
                        <i data-feather="plus" class=" vertical-align-middle "></i>
                        <span class="display-small-inline-block padding-left-2 display-none">Add <?php echo $type ?></span>
                    </button>
                </div>
            </div>




            <div class="row margin-top-5 fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div
                            class="col-8 col-small-9 table fill-container border-rounded-more-left padding-top-4 padding-bottom-5 shadow-small bg-white ">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-3  text-overflow bold">Name</div>
                                <div class="col-3  text-overflow bold">User Type</div>
                                <div class="col-3  text-overflow bold">Email</div>
                                <div class="col-2  text-overflow bold">Status</div>
                                <div class="col-3  text-overflow bold">Topic</div>
                                <div class="col-4  text-overflow bold">Message</div>
                            </div>
                            <?php
                            if (isset($data['result'])) {
                                $SupportidArray = array();
                                while ($row = $data['result']->fetch_assoc()) {
                                    array_push($SupportidArray, [$row['SupportId'], $row['SupportStatus']]);
                                    $supportStatus = $row['SupportStatus'];
                                    if ($supportStatus == "resolved") {
                                        $style = " border-accent accent";
                                    } else {
                                        $style = " border-grey grey";
                                        $supportStatus = "not resolved";
                                    }
                                    echo "<div class='hs padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['FirstName'] . " " . $row['LastName'] . "' >" . $row['FirstName'] . " " . $row['LastName'] . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['UserType'] . "' >" . $row['UserType'] . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['Email'] . "' >" . $row['Email'] . "</div>";
                                    echo "<div class='col-2 text-overflow ' title=' $supportStatus ' > <span class=' border-1 border-rounded-more small padding-horizontal-2 $style'> $supportStatus  </span></div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $row['SupportTitle'] . "' >" . $row['SupportTitle'] . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $row['SupportMessage'] . "' >" . $row['SupportMessage'] . "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>

                        </div>
                        <div
                            class="col-4 col-small-3 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($SupportidArray)) {
                                foreach ($SupportidArray as $support) {
                                    echo "<div class='row less-gap padding-1 padding-horizontal-3'>";

                                    echo "<div class='col-6 fill-container '>";
                                    echo "<a href='" . $basePage . "View/".$support[0]."'><div class=' fill-container border-accent bg-white accent-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='eye' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>View</span>";
                                    echo "</div></a>";
                                    echo "</div>";

                                    if ($support[1] == "resolved") {
                                        $style = " border-grey grey cursor-default"; 
                                    } else {
                                        $style = "border-blue blue-hover";
                                    }
                                    echo "<div class='col-6 fill-container '>";
                                    echo "<a href='" . $basePage . "Resolve/".$support[0]."'><div class=' fill-container bg-white $style border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='check' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Resolve</span>";
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