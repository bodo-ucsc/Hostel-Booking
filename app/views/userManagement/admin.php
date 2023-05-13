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




            <div class="row fill-container">
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
                                foreach ($data['result'] as $key => $value) { 
                                    echo "<div class='hs padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                    echo "<div class='col-4  text-overflow ' title='" . $value->FirstName . "' >" . $value->FirstName . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $value->LastName . "' >" . $value->LastName . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $value->Username . "' >" . $value->Username . "</div>"; 
                                    echo "<div class='col-4  text-overflow ' title='" . $value->Email . "' >" . $value->Email . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $value->ContactNumber . "' >" . $value->ContactNumber . "</div>"; 
                                    echo "</div>";
                                }
                            }
                            ?>

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