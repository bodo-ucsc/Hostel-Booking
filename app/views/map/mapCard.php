<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;

?>
<main class='navbar-offset full-width'>
<div class='col-8 shadow padding-3 border-rounded-more'>
<div class='row'>
    <div class='col-3  fill-vertical padding-3 '>
      <img src='https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/brewster-mcleod-architects-1486154143.jpg'
            class='fill-container fill-vertical border-rounded-more' alt=''>
    </div>

    <div class='col-4 padding-3'>
        <div class='row'>
            <div class='col-3 header-2 fill-container left'>
                CityName
            </div>
            <div class='col-3 big bold fill-container right'>
                <i data-feather='star' class='fill-black vertical-align-middle'></i>
                <span class=' vertical-align-middle'>4.5</span>
            </div>
        </div>
        <div class='row'>
            <div class='col-3 fill-container left small grey'>
                Street, CityName
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