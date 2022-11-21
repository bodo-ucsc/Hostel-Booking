<?php
$header = new HTMLHeader("File1");
$nav = new Navigation("home");
$search = new Search();
$filter = new Filter();
$sidebar = new SideBarNav("user", "verification");
?>


<main class=" margin-top-5 padding-top-5">
    <div class="row border-red border-1 margin-2 padding-2">
        <div class=" padding-2 margin-2 border-1 border-accent fill-container flex">
            <i data-feather='star'></i>

        </div>
    </div>

</main>

<?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
    ?>