<?php
$header = new HTMLHeader("My Boarding");
$nav = new Navigation('My Boarding');

$basePage = BASEURL . '/boarding';


?>
<main class=" full-width ">
    <?php

    echo "<div id='sidebar-open'
        class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar small left bg-white'>

        <div class='row padding-bottom-2 padding-top-2 padding-horizontal-4 '>
            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Currently Boarded</span>
            </div>
        </div>";



    if (isset($data['result'])) {

        $rows = array();

        while ($row = $data['result']->fetch_assoc()) {

            $price = $row['Price'];
            $rows[] = $row;

            if ($row['BoarderStatus'] == 'boarded') {
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];

                if ($row['UserType'] == 'Student') {
                    $borderType = $row['StudentUniversity'];
                    //$rows['StudentUniversity'] = $row['StudentUniversity'];
                   
                } else if ($row['UserType'] == 'Professional') {
                    $borderType = $row['UserType'];
                }

                echo "<div class='row no-gap vertical-align-middle'>
            <div class=' padding-2'>
                <img class='dp1 '
                    src='https://ui-avatars.com/api/?background=288684&amp;color=fff&amp;name=$FirstName+$LastName' alt='user'>
            </div>
            <div class='col-11 fill-container left margin-left-2'>
                <div class='row no-gap padding-horizontal-3'>
                    
                    <div class='col-5 vertical-align-middle fill-container bold'>$FirstName $LastName</div>
                    <div class='col-2 fill-container'></div>
                    <div class='col-3 fill-container border-rounded-more  padding-1 margin-left-5 vertical-align-middle'>
                    <i data-feather='phone-call' class='grey right'></i>
                            
                    </div>
    
                    
                    <div class='col-12 fill-container left'>
                    $borderType
                    </div>
                </div>
                </div>
          </div> ";


            }



        }


        echo "<br>";
        echo "<div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
            <div class='col-12 fill-container  padding-horizontal-3 '>
            <span class=' fill-container margin-left-0 header-2'>Boarding Requests</span>
            </div>
            </div>";

        foreach ($rows as $row) {

            if ($row['BoarderStatus'] == 'pending') {
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];

                if ($row['UserType'] == 'Student') {
                    $borderType = $row['StudentUniversity'];

                } else if ($row['UserType'] == 'Professional') {
                    $borderType = $row['UserType'];
                }

                echo "<div class=' margin-left-2 row no-gap vertical-align-middle'>
                    <div class=' padding-2'>
                        <img class='dp1 '
                            src='https://ui-avatars.com/api/?background=288684&amp;color=fff&amp;name=$FirstName+$LastName' alt='user'>
                    </div>
                    <div class='col-11 fill-container left margin-left-2'>
                        <div class=' row padding-horizontal-3 no-gap'>
                            
                            <div class=' col-5 bold fill-container'>$FirstName $LastName</div>
                            <div class='col-2 fill-container'></div>
                            <div class=' col-3  fill-container
                             border-rounded-more  padding-1 margin-left-5'>
                            <i data-feather='phone-call' class='grey right'></i>
                                    
                            </div>
            
                            
                            <div class=' col-12 fill-container left'>
                            $borderType
                            </div>
                        </div>
                        </div>
                    </div> ";

            }
        }

        echo "<br>";
        echo "<div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
        <div class='col-12 fill-container  padding-horizontal-3 '>
            <span class=' fill-container margin-left-0 header-2'>Invite Friends</span>
        </div>
        </div>";



    }

    echo "</div>";
    ?>

    <div class="row sidebar-offset navbar-offset">
        <div class="col-12 col-small-12 width-90">

            <!-- <div class="col-12  fill-container">
                <h1 class="header-1 ">
                    Dashboard
                </h1>
            </div> -->



            <div class="row margin-top-3 fill-container">
                <div
                    class="shadow-small padding-3 border-rounded-more  fill-container col-9  display-medium-block">
                    <span class=' fill-container margin-left-0 header-2'>Payments Due</span>
                    <div class="row margin-top-2 fill-container">
                        <div class='col-4 fill-container padding-3 margin-2'>
                            <div class="shadow-small border-rounded-more accent padding-4 bg-white-hover">
                                <div class='header-2'>Rent Payable</div>
                                <div class='header-1'>
                                    <?php echo "Rs. " . $price . "/=" ?>
                                </div>
                            </div>
                        </div>

                        <div class='col-4 fill-container padding-3 margin-2'>
                            <div class="shadow border-rounded-more bg-white-hover blue padding-4">
                                <div class='header-2'>Water Bill</div>
                                <div class='header-1'>Rs.5000</div>
                            </div>
                        </div>
                        <div class='col-4 fill-container padding-3 margin-2 '>
                            <div class="shadow border-rounded-more red padding-4 bg-white-hover">
                                <div class='header-2'>Electicity Bill</div>
                                <div class='header-1'>Rs.10000</div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class=" margin-left-5 shadow border-rounded-more padding-3  fill-container col-3 bg-blue-hover ">
                    key money<br>
                    Rs 330,oooo/=
                </div>
            </div>

            <div class="row margin-top-3 fill-container">
                <div class="shadow-small border-rounded-more padding-3 fill-container col-9">
                    reminders
                    <div class="row margin-top-5 fill-container">

                        <div class="shadow-small border-rounded-more padding-2 margin-left-3 fill-container col-3">
                            hello<br>
                            Rs 10,oooo/=
                        </div>
                        <div
                            class="shadow border-rounded-more padding-2 margin-left-3 fill-container col-3 bg-grey-hover">
                            hello<br>
                            Rs 10,oooo/=
                        </div>
                        <div
                            class="shadow border-rounded-more padding-2 margin-left-3 fill-container col-3 bg-red-hover ">
                            hello<br>
                            Rs 10,oooo/=
                        </div>

                    </div>


                </div>
                <div class=" margin-left-5 shadow border-rounded-more padding-2 fill-container col-3 ">
                    Bed allowcation<br>
                    Rs 330,oooo/=
                </div>
            </div>

            <div class="row margin-top-3 fill-container">

                <div class=" shadow-small border-rounded-more  padding-2 fill-container col-6 ">
                    Invited via <br>
                    Rs 10,oooo/=
                </div>


                <div class=" shadow-small border-rounded-more  padding-2 fill-container col-6 ">
                    Previw<br>
                    Rs 10,oooo/=
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