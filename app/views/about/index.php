<?php
$header = new HTMLHeader("About");
$nav = new Navigation("home");

// $nav = new Navigation("about");
?>


<main class="full-height bg-black  ">

    <div class="fill-container  vertical-align-middle bwblue">
        <div class="row vertical-align-middle full-height">

            <div class="col-12 display-block display-medium-none center ">
                <img class=" width-150px margin-0" src="<?= BASEURL ?>/public/images/emblem.svg">
                <br />
                <span class="header-1  ">Hello, we are</span><br />
                <span class=" cover-text margin-n1 ">BODO</span><br />
                <a href="#about">
                    <button class=" header-nb padding-4 border-rounded border-2 border-blue blue bg-transparent">Get
                        Started</button>
                </a>
            </div>

            <div class="col-medium-1 fill-container display-none display-medium-block "></div>
            <div class="col-medium-7 fill-container left display-none display-medium-block ">
                <!-- <div class="col-12 col-medium-7 width-90"> -->
                <span class="header-1  ">Hello, we are</span><br />
                <span class=" cover-text margin-n1 ">BODO</span><br />
                <a href="#about">
                    <button class=" header-nb padding-4 border-rounded border-2 border-blue blue bg-transparent">Get
                        Started</button>
                </a>

            </div>

            <div class="col-medium-4 display-none display-medium-block ">
                <img class="fill-container" src="<?php echo BASEURL . '/public/images/emblem.svg' ?>">
            </div>

        </div>
    </div>

    <div class="fill-container navbar-offset bwblueb fill-vertical" id='about'>
        <div class="row ">
            <div class="header-1 col-12 padding-horizontal-5 border-box fill-container left">About Us</div>


            <div class="col-medium-5 display-none display-medium-block padding-horizontal-5 border-box">
                <img class="fill-container" style="height: 400px; width: 400px;"
                    src="<?php echo BASEURL ?>/public/images/home.svg" alt="Professional sign-in interface">
            </div>
            <div class="col-12 col-medium-7 fill-container padding-horizontal-5 border-box">
                <span class=" header-2  ">WELCOME TO BODO!</span>
                <br />

                <p class="big ">
                    A website dedicated to providing easy and convenient access to hostels and boarding houses for
                    students and professionals. Our team consists of second-year undergraduate students from the
                    University of Colombo School of Computing who are passionate
                    about creating innovative solutions that can benefit our fellow students and the wider
                    community.</p>
            </div>
            <div class="col-12 display-medium-none display-block padding-horizontal-5 border-box">
                <img class="fill-container" style="height: 400px; width: 400px;"
                    src="<?php echo BASEURL ?>/public/images/home.svg" alt="Professional sign-in interface">
            </div>
        </div>

    </div>

    <div class="fill-container navbar-offset bbluew fill-vertical" id='services'>
        <div class="row">

            <div class="header-1 col-12 padding-horizontal-5 border-box fill-container left white">Our Services</div>
            <div class="col-1 fill-container"></div>
            <div class="padding-3 border-rounded  fill-container col-10 ">
                <div class="row margin-top-2 ">
                    <div class='col-12 col-medium-4 padding-3 margin-2'>
                        <div class="shadow-small padding-4 bg-black1 center ">
                            <i data-feather="home" class="feather-large white"></i>
                            <div class='header-2 white'>Hostel Booking</div>
                            <p class='big  light'>BODO can be highly beneficial for users as it saves time, is
                                cost-effective, provides user reviews and ratings, offers a wide selection of options,
                                and is convenient for booking and payment.</p>
                        </div>
                    </div>

                    <div class='col-12 col-medium-4 padding-3 margin-2'>
                        <div class="shadow-small padding-4 bg-black1 center ">
                            <i data-feather="trello" class="feather-large white"></i>
                            <div class='header-2 white'>Advertising</div>
                            <p class='big light'>Advertising boarding places on BODO can provide increased
                                bookings, cost-effective advertising, positive user reviews, streamlined booking
                                processes, and access to analytics and data. This can help owners attract more guests,
                                improve their reputation, and make data-driven decisions about their business
                                strategies.</p>
                        </div>
                    </div>

                    <div class='col-12 col-medium-4 padding-3 margin-2'>
                        <div class="shadow-small padding-4 bg-black1 center ">
                            <i data-feather="command" class="feather-large white"></i>
                            <div class='header-2 white'>Hostel Management</div>
                            <p class='big light'>BODO helps boarders, and Boarding Owners to manage their bookings,
                                payments, room
                                allocation, information, and view reviews and feedback more efficiently. This
                                can help improve the overall efficiency, reduce administrative burden, etc...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="fill-container bwblueb fill-vertical" id='skills'>
        <div class="row">

            <div class="padding-3 border-rounded  fill-container col-12  display-medium-block">
                <div class="row margin-top-2 fill-container">
                    <div class="header-1 col-12 padding-horizontal-5 border-box fill-container left">Our Skills</div>

                    <div class="col-medium-1 fill-container"></div>
                    <div class='col-12 col-medium-6 border-box padding-3  fill-container'>
                        <div class="padding-5">

                            <div class='big'>As second year undergraduate students of University of Colombo School of
                                Computing, our web development skills include proficiency in programming languages such
                                as HTML, CSS, JavaScript, PHP and other web development technologies. In addition to
                                technical skills, we possess strong problem-solving and critical thinking skills,
                                attention to detail, and the ability to work collaboratively in a team environment. We
                                also have a creative mindset and an understanding of user experience (UX) and user
                                interface (UI) design principles. These skills enable us to design and create engaging
                                and effective websites, and we are excited to showcase our skills through this web site.
                            </div>
                        </div>
                    </div>



                    <div class='col-12 col-medium-4 border-box padding-3  fill-container center'>
                        <img class="width-90 max-width-300" src="<?php echo BASEURL . '/public/images/signin.svg' ?>">
                    </div>
                </div>
            </div>
        </div>








    </div>




    <div class="fill-container bg-black white padding-bottom-5 " id='team'>
        <div class="row">

            <div class="padding-3 border-rounded  fill-container col-12  display-medium-block">
                <div class="row margin-top-2 fill-container">
                    <div class="header-1 col-12 padding-horizontal-5 border-box fill-container left">Our Team</div>

                    <div class="col-12 header-nb padding-horizontal-5 left border-box padding-bottom-5 fill-container">
                        Meet the team behind BODO!
                    </div>
                    <div class="col-large-1 fill-container display-none display-large-block"></div>

                    <div class='col-6 fill-container center col-small-4 col-large-2'>
                        <div class=" fill-container center">
                            <img src="<?php echo BASEURL . '/public/images/us/aj.webp' ?>"
                                class='border-circle width-150px'>
                        </div>
                        <div class="big center">Abdullah Jasmin</div>
                    </div>

                    <div class='col-6 fill-container center col-small-4 col-large-2'>
                        <div class=" fill-container center">
                            <img src="<?php echo BASEURL . '/public/images/us/sm.webp' ?>"
                                class='border-circle width-150px'>
                        </div>
                        <div class="big center">Shamalka Manorathne</div>
                    </div>

                    <div class='col-6 fill-container center col-small-4 col-large-2'>
                        <div class=" fill-container center">
                            <img src="<?php echo BASEURL . '/public/images/us/ji.webp' ?>"
                                class='border-circle width-150px'>
                        </div>
                        <div class="big center"> Janidu Idusara</div>

                    </div>

                    <div class="col-small-2 fill-container display-none display-small-block display-large-none"></div>

                    <div class='col-6 fill-container center col-small-4 col-large-2'>
                        <div class=" fill-container center">
                            <img src="<?php echo BASEURL . '/public/images/us/vl.webp' ?>"
                                class='border-circle width-150px'>
                        </div>
                        <div class="big center">Vishal Lochana</div>
                    </div>
                    <div class="col-3 fill-container display-block display-small-none"></div>

                    <div class='col-6 fill-container center col-small-4 col-large-2'>
                        <div class=" fill-container center">
                            <img src="<?php echo BASEURL . '/public/images/us/tp.webp' ?>"
                                class='border-circle width-150px'>
                        </div>
                        <div class="big center">Tharusha Pathirana</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-offset"></div>
    </div>







  <?php new pageFooter('bg-black'); ?>
</main>



<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>