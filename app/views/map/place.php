<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;

?>

<main class='navbar-offset'>
    <span>Google Map</span>
    <form action="<?php echo BASEURL ?>/admin/viewNearby" method="post">
        <input type="text" name="address" id="address">
        <input type="submit" value="Search">
        <!-- <input type="button" value="Search" onclick="AddressCords()"> -->
    </form>
</main>

<?php

if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}

?>