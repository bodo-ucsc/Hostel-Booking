<?php
$header = new HTMLHeader("About");
// $nav = new Navigation("about");
?>


<main class="full-height navbar-offset ">

    <div class="fill-container">
        <div class="row">
            <div class="col-8">
                <!-- <div class="col-12 col-medium-7 width-90"> -->
                <div class="row">
                    <div class="col-4 text-1 fill-container width-90">Hello, we are</div>

                </div>
                <div class="row">
                    <div class="col-11 text-2 fill-container">BODO-UCSC</div>
                </div>

                <div class="row">
                    <div class="col-12 text-3">A software developing organization </div>
                </div>

                <div class="row">
                    <div class="col-3 fill-container">

                        <div class="btn">Hire Us</div>
                        <!-- <button class=" header-nb padding-4 border-rounded fill-container bg-accent-hover border-white border-1  white-hover">HireUs</button> -->
                    </div>



                </div>




            </div>

            <div class="col-4">
                <!-- <div class="col-12 col-medium-5 width-90"> -->
                <div class="row">
                    <div class="display-none display-medium-block col-medium-12 padding-bottom-3">
                        <img class="fill-container" src="<?php echo BASEURL . '/public/images/favicon.png' ?>">

                    </div>
                </div>

            </div>

        </div>



    </div>

    <div class="fill-container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="title">About Us</div>
            </div>
            <div class="col-4"></div>
        </div>



        <!-- <div class="row">

            <div class="col-4">
            <div class="col-12"></div>
            <div class="col-12"></div>
                <div class="display-none display-medium-block padding-bottom-3 padding-top-3">

                    <img class="fill-container" style="height: 400px; width: 400px;"
                        src="<?php echo BASEURL ?>/public/images/professionalSignIn.svg"
                        alt="Professional sign-in interface">

                </div>
            </div>
            <div class="col-8">
            <div class="row">
                <div class="col-2"></div>
                    <h1>WELCOME</h1>

                </div>
                
       
            </div>

        </div> -->
        <div class="row">

            <div class="col-12"></div>
            <div class="col-12"></div>

            <div class="col-12"></div>

        </div>



        <div class="row">

            <!-- <div class="col-12"></div>
            <div class="col-12"></div>
             -->
            <div class="col-5">
                <!-- <div class="col-12 col-medium-5 width-90"> -->
    

            
                <div class="row">
                    <div class="display-none display-medium-block col-medium-12 padding-bottom-3">
                        <img class="fill-container" style="height: 400px; width: 400px;"
                            src="<?php echo BASEURL ?>/public/images/professionalSignIn.svg"
                            alt="Professional sign-in interface">

                    </div>
                </div>

            </div>






            <div class="col-7">
                <!-- <div class="col-12 col-medium-7 width-90"> -->
                <div class="row">
                    <div class="col-6 text-4 fill-container">WELCOME TO BODO!</div>

                </div>
                <div class="row">
                    <div class="col-8 text-5 fill-container">A website dedicated to providing easy and convenient access to hostels and boarding houses for students and professionals. Our team consists of second-year undergraduate students from the University of Colombo School of Computing who are passionate about creating innovative solutions that can benefit our fellow students and the wider community.</div>
                </div>



                <div class="row">
                    <div class="col-3 fill-container">

                        <div class="btn-1">See More</div>
                        <!-- <button class=" header-nb padding-4 border-rounded fill-container bg-accent-hover border-white border-1  white-hover">HireUs</button> -->
                    </div>



                </div>




            </div>



        </div>






    </div>









</main>



<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>