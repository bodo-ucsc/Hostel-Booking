<?php
$header = new HTMLHeader("PropertyFeed | Advertisements");
$nav = new Navigation();
$sidebar = new SidebarNav("user", "Advertisements");
$bplace = $data['place'];
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <form action="<?php echo BASEURL ?>/propertyFeed/postUpdate" method="POST">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left">
                        <h1 class="header-1 ">
                            <i data-feather="chevron-left"></i>
                            Add Update
                        </h1>
                    </div>

                    <div class="col-12 col-medium-4 fill-container right ">
                        <button type="submit" value="submit" class="bg-blue white border-rounded header-nb padding-3 right" value="Save Changes">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i>
                            <span>Save Changes</span></button>
                    </div>
                </div>

                <div class="row margin-top-5 fill-container">
                    <div class="col-12 col-large-6 fill-container ">

                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="firstname" class="bold black">First Name</label><br>
                                <input type="text" class="fill-container" id="firstname" name="firstname" placeholder="Enter Name" value="<?php echo $_SESSION['firstname']; ?>" readonly required><br>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="lastname" class="bold black">Last Name</label><br>
                                <input type="text" class="fill-container" id="lastname" name="lastname" placeholder="Enter Name" value="<?php echo $_SESSION['lastname']; ?>" readonly required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="date" class="bold black">Date</label><br>
                                <input type="datetime-local" id="date" name="date" placeholder="Enter Date" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="placeid" class="bold black">Property Link</label><br>
                                <input type="text" class="fill-container" id="placeid" name="placeid" value="<?php echo $bplace['PlaceId']; ?>" placeholder="Enter Property Link" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-8 fill-container">
                                <label for="message" class="bold black">Message</label><br>
                                <input type="text" class="fill-container" id="message" name="message" placeholder="Enter Message"><br>
                            </div>
                        </div>
                    </div>
            </form>

            <div class="col-12 col-large-6 ">
                <span class="header-2">Preview</span>
                <div class="shadow border-rounded padding-4 width-90">
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

    </div>
    </div>
</main>

<?php

$footer = new HTMLFooter();

?>