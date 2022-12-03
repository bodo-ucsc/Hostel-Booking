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
                        <div class="col-5 fill-container fill-vertical ">
                            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be"
                                class="fill-container fill-vertical property-image border-rounded-more" alt="">
                        </div>

                        <div class="col-7 fill-container ">
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
                            <div class="row">
                                <div class="col-12 fill-container left small grey">
                                    <ul>
                                        <li>2 Rooms</li>
                                        <li>2 Bathrooms</li>
                                        <li>1 Kitchen</li>
                                        <li>1 Living Room</li>
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