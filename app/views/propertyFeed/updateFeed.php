<?php
$header = new HTMLHeader("PropertyFeed | Advertisements");
$nav = new Navigation();
$sidebar = new SidebarNav("user", "Advertisements");

$result = $data['res'];
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <form action="<?php echo BASEURL ?>/propertyFeed/updateFeed" method="POST">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left">
                        <h1 class="header-1 ">
                            <i data-feather="chevron-left"></i>
                            Edit Update
                        </h1>
                    </div>

                    <div class="col-12 col-medium-4 fill-container right ">
                        <button type="submit" value="submit" class="bg-blue white border-rounded header-nb padding-3 right" value="Save Changes">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i>
                            <span>Save Changes</span></button>
                    </div>
                </div>

                <div class="row margin-top-5 fill-container">
                    <div class="col-12 col-large-7 fill-container ">

                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="name" class="bold black">Name</label><br>
                                <input type="text" class="fill-container" id="username" name="username" placeholder="Enter Name" value="<?php echo $result['Username']; ?>" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="date" class="bold black">Date</label><br>
                                <input type="datetime-local" id="date" name="date" placeholder="Enter Date" value="<?php echo $result['DateTime']; ?>" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="placeid" class="bold black">Property Link</label><br>
                                <input type="text" class="fill-container" id="placeid" name="placeid" placeholder="Enter Property Link" value="<?php echo $result['PlaceId']; ?>" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-8 fill-container">
                                <label for="message" class="bold black">Message</label><br>
                                <input type="text" class="fill-container" id="message" name="message" value="<?php echo $result['Caption']; ?>" placeholder="Enter Message"><br>
                            </div>
                        </div>
                    </div>
            </form>

            <div class="col-12 col-large-5 ">
                <span class="header-2">Preview</span>
                <div class="shadow  padding-3 width-90">
                    <div class="row fill-container">
                        <div class="col-12 col-medium-4 col-large-12 fill-container">
                            <label for="username" class="bold black">Name</label><br>

                        </div>
                        <div class="col-12 col-medium-4 col-large-12 fill-container">
                            <label for="" class="bold black">Date</label><br>

                        </div>
                        <div class="col-12 col-medium-4 col-large-12 fill-container">
                            <label for="" class="bold black">Message</label><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="postid" name="postid" value="<?php echo $result['PostId']; ?>" />
    </div>
    </div>
</main>

<?php

$footer = new HTMLFooter();

?>