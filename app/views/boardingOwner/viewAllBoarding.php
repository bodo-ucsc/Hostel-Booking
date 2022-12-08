<?php
$header = new HTMLHeader("All Property");
$nav = new Navigation("home");
$sidebar = new SidebarNav($active = "user");

$_boardingOwner = new boardingOwner;

$base = BASEURL;

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
                    }
                    ?>!
                </div>
                <div class="col-4 fill-container flex">
                    <div>
                        <button
                            class=" bg-blue-hover white-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4"><i
                                data-feather="plus"></i><?php echo "<a class=' white white-hover' href =$base/boardingOwner/addBoarding>&nbsp;Add Property</a>"?></button>
                    </div>
                    <div class=" header-nb">
                        <?php
                        $num;
                        if (isset($_SESSION['userid'])) {
                            $uid = $_SESSION['userid'];
                            $num = $_boardingOwner->howManyBoardings('boardingplace', "OwnerId = $uid");
                            if ($num == null) {
                                $num = 0;
                            }
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
                        if($ownersBoardings != null){
                            while ($boarding = $ownersBoardings->fetch_assoc()) {
                                $viewcard = new ViewCard($boarding['PlaceId'], $boarding['CityName'], $boarding['Address'], $boarding['CurrentBoarderCount'], null, $boarding['NoOfMembers']);
                            }
                        } else {
                            echo "
                                <div class='col-12 fill-container header-nb'>You currently don't have any properties to list</div>
                            ";
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