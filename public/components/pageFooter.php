<?php

class pageFooter
{

    public function __construct($colour = null)
    {
        $base = BASEURL;
        if (isset($_SESSION['UserId'])) {
            $suprole = $_SESSION['role'];
            $supuserid = $_SESSION['UserId'];
            if ($suprole == 'Admin' || $suprole == 'Manager' || $suprole == 'VerificationTeam') {
                echo "";
            } else {

                echo "
    
        <div class=' bottom-0 right-0 position-fixed '>
            <div class=' padding-2 border-circle margin-bottom-3 margin-right-3  shadow bg-blue-hover '
                onclick=\"openSupportModal()\">
                <i data-feather='headphones' class='feather-large white padding-horizontal-2 padding-vertical-1'></i>
            </div>
        </div>
    <div id='supportModal' class='modal display-none position-fixed zindex fill-container fill-vertical '>
            <form action='$base/support/addSupportForm' method='post'>
    
                <div class='modal-content position-fixed bottom-0 padding-5 border-box  fill-container'>
                    <div class='padding-4 shadow border-rounded-more bg-white'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-12 col-medium-5 fill-container center'>
                                    <img src='$base/images/support.svg' class='max-width-300' alt=''>
                                </div>
                                <div class='col-12 col-medium-7 fill-container padding-4 border-box'>
    
                                    <div class='row'>
                                        <span class='header-2 col-12 fill-container'>Contact Support</span>
    
                                        <div class='col-12 col-medium-3 fill-container'>
                                            <label for='supportType' class='bold black'>Support Type</label><br>
                                            <select name='type' id='supportType' required>
                                                <option disabled selected>Select Type</option>
                                                <option value='Issue'>Issue</option>
                                                <option value='Suggestion'>Suggestion</option>
                                            </select>
                                        </div>
                                        <div class='col-12 col-medium-5 fill-container'>
                                            <label for='support' class='bold black'>
                                                What would you like to know
                                            </label><br>
                                            <input type='text' class='fill-container' id='support' name='support'
                                                placeholder=' What would you like to know' required>
                                        </div>
                                        <div class='col-12 col-medium-4 fill-container'>
                                            <label for='supportimage' class='bold black'>
                                                Any Image (if applicable)
                                            </label><br>
                                            <input id='supportimage' name='supportimage' credits='false'
                                                accept='image/png, image/jpeg, image/gif' type='file'>
                                        </div>
                                        <div class='col-12 fill-container'>
                                            <label for='support' class='bold black'>
                                                Please provide more details
                                            </label><br>
                                            <textarea class='fill-container' id='supportDescription' name='description'
                                                placeholder='Please provide more details' required></textarea>
                                        </div>
                                        <input type='hidden' id='supportImages' name='images' required>
                                        <input type='hidden' id='supportUserType' name='userType' value='$suprole' >
                                        <input type='hidden' id='supportUserId' name='userId' value='$supuserid' >
                                        <input type='hidden' id='currUrl' name='currUrl' value='' >
    
                                        <div class='col-6 fill-container'>
                                            <button type='submit'
                                                class=' fill-container border-rounded-more white bg-blue-hover'>Submit</button>
                                        </div>
                                        
                                        <div class='col-6 fill-container'>
                                            <button type='button' onclick='closeSupportModal()'
                                                class=' fill-container border-rounded-more border-2 border-grey grey bg-white-hover'>Cancel</button>
                                        </div>
                                        
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    
        </div>
    ";
            }
        } else {
            echo "<div class=' bottom-0 right-0 position-fixed '>
            <div class=' padding-2 border-circle margin-bottom-3 margin-right-3  shadow bg-blue-hover '
                onclick=\"openSupportModal()\">
                <i data-feather='headphones' class='feather-large white padding-horizontal-2 padding-vertical-1'></i>
            </div>
        </div>
        ";
        }
        echo "
    <div class=' fill-container footer $colour '>
            <div class='navbar-offset display-none display-medium-block'></div>
            <div class='row less-gap '>
                <div class='col-12 fill-container margin-top-5  display-none display-small-block'></div>
                <div class='col-12 fill-container margin-top-5  display-none display-large-block'></div>
                <div class='col-12 fill-container margin-top-5 display-block display-medium-none'></div>
                <div class='col-12 fill-container margin-top-5 display-block display-medium-none'></div>
                <div class='col-12 col-medium-4 fill-container center'>
                    <img class='width-150px margin-0' src='$base/public/images/logo.svg'>
                </div>
                <div class='col-12 col-medium-4 fill-container center'>
                    <span class='big display-block padding-vertical-2'>Links</span>
                    <span class='display-inline-block padding-horizontal-2'><a href='$base'>Home</a></span>
                    <span class='display-inline-block padding-horizontal-2'><a href='$base/about'>About</a></span>
                    <span class='display-inline-block padding-horizontal-2'><a href='$base/feed'>Feed</a></span>
                    <span class='display-inline-block padding-horizontal-2'><a
                            href='$base/listing'>Listing</a></span>
                    <span class='display-inline-block padding-horizontal-2'><a href='$base/about/privacy'>Privacy
                            Policy</a></span>
    
                </div>
                <div class='col-12 col-medium-4 fill-container center'>
                    <span class='big display-block padding-vertical-2'>Contact</span>
                    <span class='display-inline-block padding-horizontal-2'><a
                            href='mailto:jvatsbodo@gmail.com'>jvatsbodo@gmail.com</a></span>
                </div>
            </div>
            <div class='row less-gap margin-top-4'>
                <div class='col-12 fill-container center'>
                    <span class='small'>© 2021 BODO. All rights reserved.</span>
                </div>
            </div>
    
        </div>
    
    
    ";


    }
}


?>