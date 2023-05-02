<?php
$header = new HTMLHeader("Pop Up");
//$nav = new Navigation('My Boarding');
$base = BASEURL;

$basePage = BASEURL . '/popup';


?>

<main class=" full-width ">


    <div class="container margin-top-5">
        <button data-modal-target="#modal"
            class="padding-4 border-rounded bg-white-hover border-blue border-1 blue-hover"> Professional</button>




    </div>

    <!-- <div class="container margin-top-5"> -->

    <div class="row">
        <div class=" col-12  bg-white flex full-height ">
            <div class="modal" id="modal">
                <div class="shadow-small border-rounded padding-5">
                    <!-- <div class='row'> -->
                    <div class='col-3'>

                        <img src="<?php echo BASEURL . '/public/images/group.svg' ?>">

                    </div>
                    <!-- </div> -->

                    <h1 class="header-1">Thank you for Boarding with BODO!</h2>
                        <h2 class="header-nb">We hope you enjoyed your stay!</h2>
                        <h2 class="header-2">Please consider rating and providing a review about your boarding
                            experience!
                        </h2>

                        <!-- <form action="<?php echo BASEURL ?>/signin/login" method="post"> -->
                        <label for="username" class="bold black">How was your experience?</label><br><br>
                        <input type="text" id="username" name="username" placeholder="Describe your experience"><br>
                        <div class="row">
                            <div class="col-2 fill-container">
                                <!-- <input class=" bg-accent-hover white-hover bold padded border-rounded fill-container "
                                    type="submit" value="Cancel">
                                    <button
                                    class="padding-4 border-rounded fill-container bg-white-hover border-black border-1">
                                    Cancel</button>  -->
                                <button data-close-button
                                    class="padding-4 border-rounded bg-white-hover border-black border-1 black-hover fill-container">Cancel</button>
                            </div>
                            <div class="col-5 fill-container">
                                <!-- <input class=" bg-accent-hover white-hover bold padded border-rounded fill-container " type="submit"
                                    value="Leave without review">

                                <button
                                    class="padding-4 border-rounded fill-container bg-white-hover border-red border-1">
                                    Leave without review</button> -->

                                <button
                                    class="padding-4 border-rounded bg-white-hover border-red border-1 red-hover fill-container">Leave
                                    without review</button>

                            </div>
                            <div class="col-5 fill-container">
                                <input class="bg-blue white-hover bold padded border-rounded fill-container"
                                    type="submit" value="Submit Review & Leave">
                            </div><br>
                        </div>
                        <!-- <div class="center padding-top-3 ">
                            Forgot Password?
                            <a class="inverse" href="<?php echo BASEURL ?>/forgotPassword">Reset
                                Password</a>
                            <br>
                        </div>
                        <div class="center  ">
                            No account?
                            <a class="inverse" href="<?php echo BASEURL ?>/Register">Register</a>
                            <br>
                        </div> -->
                        <!-- </form> -->
                </div>
            </div>
        </div>


    </div>
    <!-- </div> -->

    <div id="overlay"></div>



    <script>
        const openModalButtons = document.querySelectorAll('[data-modal-target]')
        const closeModalButtons = document.querySelectorAll('[data-close-button]')
        const overlay = document.getElementById('overlay')

        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget)
                openModal(modal)
            })
        })

        overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal.active')
            modals.forEach(modal => {
                closeModal(modal)
            })
        })

        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.modal')
                closeModal(modal)
            })
        })

        function openModal(modal) {
            if (modal == null) return
            modal.classList.add('active')
            overlay.classList.add('active')
        }

        function closeModal(modal) {
            if (modal == null) return
            modal.classList.remove('active')
            overlay.classList.remove('active')
        }

    </script>













</main>