<?php
$header = new HTMLHeader("My Boarding");
$nav = new Navigation('My Boarding');

$basePage = BASEURL . '/boarding';


?>
<main class=" full-width ">

    <div id='sidebar-open'
        class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar small left bg-white'>

        <div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Currently Boarded</span>
            </div>
        </div>

<?php

if (isset($data['result'])) {

    // $data = array();

    while ($row = $data['result']->fetch_assoc()) {
        // $data[] = $row;
        $price = $row['Price'];

        if ($row['BoarderStatus'] == 'boarded') {
            $FirstName = $row['FirstName'];
            $LastName = $row['LastName'];

            if ($row['UserType'] == 'Student') {
                $borderType = $row['StudentUniversity'];

            } else if ($row['UserType'] == 'Professional') {
                $borderType = $row['UserType'];
            }

            echo "<div class='row no-gap vertical-align-middle'>
            <div class=' padding-2'>
                <img class='dp1 '
                    src='https://ui-avatars.com/api/?background=288684&amp;color=fff&amp;name=$FirstName+$LastName' alt='user'>
            </div>
            <div class='col-11 fill-container left margin-left-2'>
                <div class='row no-gap'>
                    <div class='col-12 fill-container left  '>
                    <div class='display-inline-block bold vertical-align-middle'>$FirstName $LastName</div>
                    <div class='display-inline-block border-rounded-more  padding-1 margin-left-5 vertical-align-middle'>
                    <i data-feather='phone-call' class='grey right'></i>
                            
                    </div>
    
                    </div>
                    <div class='col-12 fill-container left'>
                    $borderType
                    </div>
                </div>
                </div>
            </div> ";

        }



    }






}
?>


        <div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Boarding Requests</span>
            </div>
        </div>


        <?php


        


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























