<?php
$header = new HTMLHeader("PropertyFeed | Advertisements");
$nav = new Navigation();
$sidebar = new SidebarNav("user", "Advertisements");
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <div class="row ">
                <div class="col-12 col-medium-8 fill-container left">
                    <span class="header-1 ">
                        Latest Feed Updates
                    </span>
                </div>

                <div class="col-12 col-medium-4 fill-container right">
                    <button type="submit" onclick="myfunc()" name="addUpdate" class="bg-blue white border-rounded header-nb padding-3 right">
                    <i data-feather="plus" class=" vertical-align-bottom padding-right-2"></i> <span>Add Update</span>
                    </button>
                </div>
            </div>

            <div class="row margin-top-5 fill-container">
                <div class="col-12 col-large-7 fill-container ">
                </div>
            </div>
        </div>

    </div>
</main>
<script>
function myfunc() {
  
}

</script>
<?php

$footer = new HTMLFooter();

?>