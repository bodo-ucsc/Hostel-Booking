<?php
$header = new HTMLHeader("Property");
$nav = new Navigation("home");
$sidebar = new SidebarNav($active="user");
$base = BASEURL;
$_boardingOwner = new boardingOwner;

?>

<main class=" navbar-offset sidebar-offset">

<?php
$placeid = $data['placeid'];

$boardingPlace = $_boardingOwner->viewBoardingPlace($placeid);

if (isset($boardingPlace)) {
    $result = $boardingPlace->fetch_assoc();
    $boardingPlaceName = $result['CityName'];
}

?>

    <div class="row margin-left-5">
        <div class="col-8 header-1 fill-container margin-left-5">
            <?php
            if (isset($boardingPlaceName)) {
                echo $boardingPlaceName;
            }
            ?>
        </div>
        <div class="col-4 fill-container flex">
            <div>
                <button class=" bg-white-hover black-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4 border-1 border-black"><i data-feather="edit"></i><?php echo "<a class=' black' href =$base/boardingOwner/editDeleteBoarding/$placeid>&nbsp;Edit Listing</a>";?></button>
            </div>
            <div>
                <button class=" bg-accent-hover white-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4"><i data-feather="eye"></i><?php echo "<a class=' white white-hover' href =$base/boardingOwner/boardingView/$placeid>&nbsp;View Listing</a>";?></button>
            </div>
        </div>     
    </div>

</main>

<?php
$footer = new HTMLFooter();
?>