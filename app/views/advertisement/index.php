<?php
$header = new HTMLHeader("Admin | Advertisement Management");
$nav = new Navigation("management");
$base = BASEURL;

new SideBarNav("Advertisement");
?>

<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 fill-container">
            <div class="row margin-horizontal-5 ">
                <div class="col-8 left fill-container">
                    <h1 class="header-1 ">
                        Advertisement Management
                    </h1>
                </div>

                <div class="col-4  fill-container right">
                    <button class="bg-blue-hover white border-rounded header-nb padding-3 right"
                        onclick="location.href='<?php echo $base ?>/admin/addUpdate'">
                        <i data-feather="plus" class=" vertical-align-middle "></i>
                        <span class="display-large-inline-block padding-left-2 display-none">Add Advert</span>
                    </button>
                </div>
            </div>

            <?php
            $result = restAPI("feed/postRest/");
            if ($result != null) {
                foreach ($result as $key => $value) {
                    new ViewCard($value);
                }
            } else {
                echo "<h1 class='text-center'>No Post Found</h1>";
            }
            ?>
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