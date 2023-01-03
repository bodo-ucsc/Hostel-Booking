<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;

?>

<main class=" navbar-offset full-width  ">
    <div class=" fill-container center ">

        <?php
        if (isset($data['row'])) {
            while ($row = $data['row']->fetch_assoc()) {


                new ViewCard($PostId = $row['PostId']);
            }
        }
        ?>
    </div>

</main>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>