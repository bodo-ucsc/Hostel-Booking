<?php
$header = new HTMLHeader("File1");
$nav = new Navigation("home");
$search = new Search(); 
$sidebar = new SideBarNav("user", "verification");
?>


<main class=" margin-top-5 padding-top-5 sidebar-offset">
    <div class="advert shadow">
        hi
    </div>
</main>

<?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
    ?>
