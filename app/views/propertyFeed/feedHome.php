<?php
$header = new HTMLHeader("PropertyFeed | Advertisements");
$nav = new Navigation();
$sidebar = new SidebarNav("user", "Advertisements");
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">

            <div class="row ">
                <div class="col-12 col-medium-8 fill-container left">
                    <div>
                        <span class="header-2 ">Latest Feed Updates</span>
                    </div>
                </div>

            </div>
            <div class="col-12 col-medium-4 fill-container right">
                <a href="addUpdate"><button class="bg-blue white border-rounded header-nb padding-3 right">
                        <i data-feather="plus" class=" vertical-align-bottom padding-right-2"></i>
                        <span class=" header-nb">Add Update</span>
                    </button></a>
            </div>
            <?php

            if ($data) {
                while ($row = $data->fetch_assoc()) {

            ?>
                    <div class=" col-12 col-large-6">
                        <div class="shadow border-rounded padding-3 fill-container">

                            <!-- <label>PostID :</label><?php echo $row['PostId']; ?><br>
                            <label>UserID :</label><?php echo $row['UserId']; ?><br>
                            <label>PlaceID :</label><?php echo $row['PlaceId']; ?><br> -->
                            <span class=" header-nb"><?php echo $row['FirstName'], " ", $row['LastName']; ?></span><br>
                            <?php echo $row['DateTime']; ?><br>
                            <span class=" header-nb"><?php echo $row['Caption']; ?></span><br>
                            <label>Property :</label><?php echo $row['Title']; ?><br>
                            <span class=" header-2"><?php echo $row['CityName']; ?></span><br>
                            
                            
                            <button>
                                <a href="<?php echo BASEURL ?>/propertyFeed/editUpdate/<?php echo $row['PostId']; ?>" class="card-link">Edit</a></button>
                            <button>
                                <a href="<?php echo BASEURL ?>/#/<?php echo $row['PostId']; ?>" class="card-link" onclick="return confirm('Are you sure, Do you want to delete this user?')">Delete</a></button>

                        </div>
                <?php
                }
            } else {
                echo "0 results";
            }
                ?>
                    </div>
                    <div class="row margin-top-5 fill-container">
                        <div class="col-12 col-large-7 fill-container ">
                        </div>
                    </div>
        </div>
    </div>
</main>

<?php
$footer = new HTMLFooter();
?>