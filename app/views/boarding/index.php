<?php
$header = new HTMLHeader("My Boarding");
$nav = new Navigation('My Boarding');

$basePage = BASEURL . '/boarding';
$uname = $_SESSION['username'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];
?>
<main class=" full-width ">

<?php
    $palceID = $this->model('viewModel')->getPlaceId($uname);
   // boarding/viewBoarders($uname);
?> 
    <div id='sidebar-open'
        class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar large left bg-white'>

        <div class='display-block display-medium-none padding-vertical-1 '>
            <button onclick=$closeNav class='  left fill-container  padding-horizontal-3'>
                <i data-feather='menu' class='grey vertical-align-middle'></i>
                <span class='grey header-nb vertical-align-middle'>Menu</span>
            </button>
        </div>


        //$Bsection = new borarderSection($uname, $fname, $lname,$palceID);
        <div class='row padding-bottom-1 padding-top-2 padding-horizontal-4 '>
            <div class='col-12 flex left fill-container  padding-horizontal-3'>

                <span class=' fill-container  margin-left-2 header-2'>Currently Boarded</span>

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