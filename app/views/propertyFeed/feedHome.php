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
                    <span class="header-1 ">
                        Latest Feed Updates
                    </span>
                </div>
                <div class="col-12 col-medium-4 fill-container right">
                    <a href="addUpdate"><button class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="plus" class=" vertical-align-bottom padding-right-2"></i> <span>Add Update</span>
                        </button></a>
                </div>
            </div>
            <?php
                    if ($data) {
                       ?>
            <div class="bg-white shadow border-rounded padding-1 full-width ">
                <table cellspacing="4" cellpadding="9">
                    <div class=" grey">
                        <tr>
                            <th>PostID</th>
                            <th>UserID</th>
                            <th>Property</th>
                            <th>Date Time</th>
                            <th>Message</th>
                        </tr>
                    </div>
                    <?php  
                        while ($row = $data->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['PostId']; ?></td>
                                <td><?php echo $row['UserId']; ?></td>
                                <td><?php echo $row['PlaceId']; ?></td>
                                <td><?php echo $row['DateTime']; ?></td>
                                <td><?php echo $row['Caption']; ?></td>

                                <td><button><a href="<?php echo BASEURL ?>/adminhome/editboardingOwner/<?php echo $row['user_id']; ?>" class="card-link">Edit</a></button>
                                    <button><a href="<?php echo BASEURL ?>/adminhome/deleteboardingOwner/<?php echo $row['user_id']; ?>" class="card-link" onclick="return confirm('Are you sure, Do you want to delete this user?')">Delete</a></button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>
                </table>
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