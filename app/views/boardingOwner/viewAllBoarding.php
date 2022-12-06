<?php
$header = new HTMLHeader("All Property");
$nav = new Navigation("home");
$sidebar = new SidebarNav($active = "user");

$_boardingOwner = new boardingOwner;

?>
<main class="full-width">
    <div class="navbar-offset sidebar-offset">
        <div class="row margin-top-5 fill-container flex ">
            <div class="col-12 col-small-12 width-90">
                <div class="row">
                <div class="col-8 header-1 fill-container">Hello
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo "Random User";
                    }
                    ?>!
                </div>
                <div class="col-4 fill-container flex">
                    <div>
                        <button
                            class=" bg-blue-hover white-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4"><i
                                data-feather="plus"></i>Add Property</button>
                    </div>
                    <div class=" header-nb">
                        <?php
                        if (isset($_SESSION['userid'])) {
                            $uid = $_SESSION['userid'];
                            $num = $_boardingOwner->howManyBoardings('boardingplace', "'UserId' = $uid");
                        } else {
                            $num = 69;
                        }
                        echo $num;
                        ?> Properties
                    </div>
                </div>
                </div>
                <div class="row margin-vertical-5 ">

                    <?php
                    if (isset($_SESSION['userid'])) {
                         $ownersBoardings = $_boardingOwner->viewBoardingPlaces($_SESSION['userid']);

                        while ($boarding = $ownersBoardings->fetch_assoc()) {
                            $viewcard = new ViewCard($boarding['PlaceId'], $boarding['CityName'], $boarding['NoOfMembers'], null, $boarding['CurrentBoarderCount']);
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>

</main>

<?php
$footer = new HTMLFooter();
?>