<?php
$header = new HTMLHeader("Advertisement Management");
$nav = new Navigation("");
$base = BASEURL;
$fname = $data['User']->FirstName;
$lname = $data['User']->LastName;
$role = $data['User']->UserType;
$UserId = $data['User']->UserId;
$profilepic = $data['User']->ProfilePicture;
$Email = $data['User']->Email;
$ContactNumber = $data['User']->ContactNumber;
?>


<main class=" full-width ">
    <div class="row navbar-offset  ">
        <div class="col-1 fill-container"></div>
        <div class="col-10  center  fill-container">
            <img class=' border-rounded-more fill-container shadow-small ' src='<?= $base ?>/images/animated.svg'
                alt=''>
            <div class=' center fill-container margin-top-n5 '>
                <?php

                if (isset($profilepic)) {
                    echo "<img class='  width-150px border-blue border-1 border-circle' src='$base/$profilepic' alt='user'>";
                } else {
                    echo "<img class=' width-150px border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='user'>";
                }
                ?>
            </div>

            <div class='col-12 center fill-container padding-bottom-4'>
                <div class=' padding-vertical-2'>
                    <span class='header-1'>
                        <?= $fname . " " . $lname ?>
                    </span>
                    <br />
                    <div
                        class='display-inline-block border-rounded-more shadow-small   padding-1 margin-2 vertical-align-middle'>
                        <i data-feather='award'
                            class=' vertical-align-middle bg-accent white border-rounded-more padding-2'></i>
                        <span id='user-type-$PostId' class='header-2 vertical-align-middle padding-2'>
                            <?= $role ?>
                        </span>
                    </div>
                </div>
            </div>

            <?php

            if($UserId == $_SESSION['UserId']){ 
                echo "
                <div class='col-12 center fill-container padding-bottom-4'>
                        <button onclick='location.href = \"$base/profile/edit\"' class='button border-accent accent border-1 bg-white border-rounded shadow-small padding-2 margin-2 vertical-align-middle'>
                            <i data-feather='edit-3'
                                class=' vertical-align-middle   padding-2'></i>
                            <span  class='big vertical-align-middle padding-2'>
                                Edit Profile
                            </span>
                        </button>
                </div>
                ";
            }

            if ($role == "Admin" || $role == "Manager" || $role == "VerificationTeam" || $role == "BoardingOwner") {
                echo "
            <div class='row less-gap'>
                <div class='col-12 col-medium-6 fill-container left padding-3 border-box'>
                    <div class='padding-4 border-box shadow-small  border-rounded'>
                        <span class='big'>Email</span>
                        <br />
                        <span class=' padding-vertical-3'>
                             $Email
                        </span>
                    </div>
                </div>

                <div class='col-12 col-medium-6 fill-container left padding-3 border-box'>
                    <div class='padding-4 border-box shadow-small  border-rounded'>
                        <span class='big'>Contact</span>
                        <br />
                        <span class=' padding-vertical-3'>
                             $ContactNumber
                        </span>
                    </div>
                </div>
            </div>

            ";
            }
            ?>

        </div>
    </div>
    <?php new pageFooter(); ?>

    <?php
    if (isset($data['alert'])) {
        $footer = new HTMLFooter($data['alert'], $data['message']);
    } else {
        $footer = new HTMLFooter();
    }
    ?>