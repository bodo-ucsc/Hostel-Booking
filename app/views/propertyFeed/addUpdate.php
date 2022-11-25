<?php
$header = new HTMLHeader("PropertyFeed | Advertisements");
$nav = new Navigation();
$sidebar = new SidebarNav("user", "Advertisements");
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <form action="postUpdate" method="post">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left">
                        <h1 class="header-1 ">
                            <i data-feather="chevron-left"></i>
                            Add Update
                        </h1>
                    </div>

                    <div class="col-12 col-medium-4 fill-container right ">
                        <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                                <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i><span>Save Changes</span></button>
                    </div>
                </div>

                <div class="row margin-top-5 fill-container">
                    <div class="col-12 col-large-7 fill-container ">

                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="name" class="bold black">Name</label><br>
                                <input type="text" class="fill-container" id="name" name="name" placeholder="Enter Name" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="date" class="bold black">Date</label><br>
                                <input type="date" id="date" name="date" placeholder="Enter Date" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="placeid" class="bold black">Property Link</label><br>
                                <input type="text" class="fill-container" id="placeid" name="placeid" placeholder="Enter Property Link" required><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="message" class="bold black">Message</label><br>
                                <input type="textbox" class="fill-container" id="message" name="message" placeholder="Enter Message"><br>
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
                                    <label for="password" class="bold black">Date</label><br>

                                </div>
                                <div class="col-12 col-medium-4 col-large-12 fill-container">
                                    <label for="password" class="bold black">Message</label><br>

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