<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;
 ?>

<main class='navbar-offset'>

    <?php
    new ShowMap("ucsc,colombo,sri lanka", "University of Jayawardanapura, Nugegoda, Sri Lanka");
    ?>
</main>

<?php

if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}

?>