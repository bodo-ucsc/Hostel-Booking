<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("home");


?>

<main class=" navbar-offset full-width full-height overflow-hidden ">
    <div class="row  ">

        <div class="advert shadow bg-white border-rounded-more padding-3">
            <div class="row no-gap vertical-align-middle">
                <div class=" padding-2">
                    <?php echo " <img src='https://ui-avatars.com/api/?background=288684&color=fff&name=kasun+peiris' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>"; ?>
                </div>
                <div class="col-8 fill-container left margin-left-2">
                    <div class="row no-gap">
                        <div class="col-12 fill-container left  ">
                            <div class="display-inline-block big vertical-align-middle">
                                Kasun Peiris
                            </div>
                            <div
                                class="display-inline-block border-rounded-more shadow fill-vertical padding-1 margin-left-2 vertical-align-middle">
                                <i data-feather="award"
                                    class="feather-body vertical-align-middle bg-accent white border-circle padding-2"></i>
                                <span class="small vertical-align-middle padding-2">Verified</span>
                            </div>

                        </div>
                        <div class="col-12 fill-container left">
                            June 21, 12:45 pm
                        </div>
                    </div>
                </div>
            </div>
            <div class="row padding-2">
                <div class="col-12 fill-container left">
                    We need a uni room mate for our boarding place at Nugegoda
                </div>
            </div>
            <div class="row padding-4 ">
                <div class="col-12 shadow fill-container padding-2 padding-right-4 border-rounded-more">
                    <div class="row">
                        <div class="col-5 fill-container property-image fill-vertical ">
                            <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/brewster-mcleod-architects-1486154143.jpg"
                                class="fill-container fill-vertical  border-rounded-more" alt="">
                        </div>

                        <div class="col-7 fill-container padding-3 ">
                            <div class="row">
                                <div class="col-8 header-2 fill-container left">
                                    Nugegoda
                                </div>
                                <div class="col-4 big bold fill-container right">
                                    <i data-feather="star" class="fill-black vertical-align-middle"></i>
                                    <span class=" vertical-align-middle">4.5</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 fill-container left small grey">
                                    Raymond Road, Nugegoda
                                </div>
                            </div>
                            <div class="table padding-vertical-2 margin-top-2">
                                <div class="hs less">
                                    <div title="No. of Members" class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="users" class="accent"></i></span>
                                        <span class=" display-block center">4 Members</span>
                                    </div>
                                    <div title="No. of Rooms" class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="archive" class="accent"></i></span>
                                        <span class=" display-block center">2 Rooms</span>
                                    </div>
                                    <div title="No. of Washrooms" class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="grid" class="accent"></i></span>
                                        <span class=" display-block center">1 Washroom</span>
                                    </div>
                                    <div title="Gender" class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="user" class="accent"></i></span>
                                        <span class=" display-block center">Ladies</span>
                                    </div>
                                    <div title="Type of Tenant" class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="briefcase" class="accent"></i></span>
                                        <span class=" display-block center">Professional</span>
                                    </div>
                                    <div title="Square Feet" class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="shuffle" class="accent"></i></span>
                                        <span class=" display-block center">200 Sq.Ft</span>
                                    </div>
                                    <div title="Parking availability"
                                        class="col-2 center fill-container left small grey">
                                        <span class="display-block center">
                                            <i data-feather="navigation" class="accent"></i></span>
                                        <span class=" display-block center">Available</span>
                                    </div>








                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 fill-container left  grey">
                                    <ul>
                                        <li>5KM from University of Colombo</li>
                                        <li>Suitable for Female Students</li>
                                        <li>House for rent</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="row no-gap">
                                <div class="col-12 fill-container left  ">
                                    <div class="display-inline-block big vertical-align-middle">
                                        Rs. 50,000
                                    </div>
                                    <div class="display-inline-block small vertical-align-middle">
                                        (per month)
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


</main>


<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>