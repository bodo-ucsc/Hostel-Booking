<?php
$header = new HTMLHeader("Property");
$nav = new Navigation("home");
$sidebar = new SidebarNav($active="user");

$_boardingOwner = new boardingOwner;

?>

<main class=" navbar-offset sidebar-offset">

<?php
$placeid = $_GET['placeid'];

$boardingPlace = $_boardingOwner->viewBoardingPlace($placeid);

if (isset($boardingPlace)) {
    $boardingPlaceName = $boardingPlace['CityName'];
}

?>

    <div class="row margin-left-5">
        <div class="col-8 header-1 fill-container margin-left-5">
            <?php
            if (isset($boardingPlaceName)) {
                echo $boardingPlaceName;
            } else {
                echo "Random Boarding";
            }
            ?>
        </div>
        <div class="col-4 fill-container flex">
            <div>
                <button class=" bg-white-hover black-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4 border-1 border-black"><i data-feather="edit"></i>&nbsp;Edit Listing</button>
            </div>
            <div>
                <button class=" bg-accent-hover white-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4"><i data-feather="eye"></i> &nbsp;View Listing</button>
            </div>
        </div>     
    </div>

</main>

<?php
$footer = new HTMLFooter();
?>