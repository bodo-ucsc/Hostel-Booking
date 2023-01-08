<?php
$header = new HTMLHeader("Error 404");
$nav = new Navigation("");
$base = BASEURL;

echo "
<main class='full-height'>
        <div class='row full-height'>
        <div class='col-3'></div>
            <div class='col-6 center'>
                <img src='$base/images/404.svg' alt='404' class='fill-container'> 
                <br>
                <span class='header-2 '>Page not found</span>
                <br>
                <span class=' display-block '>Sorry, the page you are looking for does not exist.</span>
                <br>
                <a href='$base'><button class=' bg-white border-blue border-1 blue padding-vertical-3 padding-horizontal-5 border-rounded'>Home</button></a>
            </div>
        </div>
</main> 
";

$footer = new HTMLFooter();

?>