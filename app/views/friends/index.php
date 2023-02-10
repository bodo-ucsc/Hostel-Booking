<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("Friends");
$base = BASEURL;

?>

<!-- <main class="navbar-offset full-width full-height">
    <div class="row">
        <div class="col-12">
        <?php
        //$search = new Searchfriends();
        ?>
            

        </div>
        <div class="col-10">
        <?php
        //$search = new SearchPeopleYouMayKnow();
        ?>

        </div>
    </div>
</main> -->

<main class=" full-width">
    <?php

    echo "<div id='sidebar-open' class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar small left bg-white'>

        <div class='row padding-bottom-2 padding-top-2 padding-horizontal-4 '>
            <div class='col-12 fill-container  padding-horizontal-3 '>
                <span class=' fill-container margin-left-0 header-2'>Friend Requests</span>
            </div>
        </div>";


        if (isset($data['result'])) {

            $info['res'] = $data['result'];
            $rows = array();

        while ($row = $data['result']->fetch_assoc()) {

            $rows[] = $row;

            if ($row['status'] == 'requested') {
                $sid = $row['StudentFriendId'];
                $rid = $row['FriendId'];
                $status = $row['status'];
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
                 
             <div class=' col-7  fill-container'>
                 <div class='col-12 bold'>$FirstName $LastName</div>
                 <div class='col-12'>$borderType</div>
             </div>
                 <div class='col-2 fill-container'></div>
                 <div class='col-3 fill-container border-rounded-more  padding-1 margin-left-5 vertical-align-middle'>
                 <i data-feather='user-check' class='grey right'></i>
                         
                 </div>
                    
                </div>
                </div>
            </div> ";
            }
        }

                echo "<div class='row padding-bottom-2 padding-top-2 padding-horizontal-4'>
            <div class='col-12 fill-container  padding-horizontal-3 '>
            <span class=' fill-container margin-left-0 header-2'>Your Friends</span>
            </div>
            </div>";

                foreach ($rows as $row) {

                    if ($row['status'] == 'accepted') {
                        $FirstName = $row['FirstName'];
                        $LastName = $row['LastName'];

                        $profilepic = $row['ProfilePicture'];
                        if ($row['UserType'] == 'Student') {
                            $borderType = $row['StudentUniversity'];
                        } else if ($row['UserType'] == 'Professional') {
                            $borderType = $row['UserType'];
                        }

                        echo "<div class='row no-gap vertical-align-middle'>
                    <div class=' padding-2'>";
                    if (isset($profilepic)) {
                        echo "
                    <img class='dp border-circle border-1 border-blue' src='$base/$profilepic' alt='user'>";
                    } else {
                        echo "
                        <img class='dp border-circle border-1 border-blue'
                        src='https://ui-avatars.com/api/?background=288684&amp;color=fff&amp;name=$FirstName+$LastName' alt='user'>";
                    }
                    echo "
                    </div>
                    <div class='col-11 fill-container left margin-left-2'>
                    <div class=' row padding-horizontal-3 no-gap'>
                            
                    <div class=' col-7 fill-container'>
                        <div class='col-12 bold'>$FirstName $LastName</div>
                        <div class='col-12'>$borderType</div>
                    </div>
                    <div class='col-2 fill-container'></div>
                    <div class=' col-3  fill-container
                     border-rounded-more  padding-1 margin-left-5'>
                    <i data-feather='phone-call' class='grey right'></i>
                            
                    </div>
                            
                        </div>
                        </div>
                    </div> ";

                    }
                }

        
    }



    echo "</div>";
    ?>

   
    <div class="row sidebar-offset navbar-offset">
        
        <div class="col-12 col-small-12 width-90">
        <span class=' fill-container margin-left-0 header-2'>People you may know</span>
        <br>
        <br>
            <div class="row">
                <div class="col-3 margin-1 fill-container">
                    <div class=" border-rounded shadow-small padding-4 center ">
                    <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=Tharindu+Sampath' alt='user'> 
                    <h2> Tharusha Silva </h2>
                    <button class=' bg-white border-1 border-black margin-top-3 border-rounded-more bg-white-hover'>Add Friend</button>
                    </div>
                </div>
                <div class="col-3 margin-1 fill-container">
                <div class=" border-rounded shadow-small padding-4 center">
                    <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=Kate+Guiness' alt='user'> 
                    <h2> Kate Guiness </h2>
                    <button class=' bg-white border-1 border-black margin-top-3 border-rounded-more bg-white-hover'>Add Friend</button>
                    </div>
                </div>
                <div class="col-3 margin-1 fill-container">
                <div class=" border-rounded shadow-small padding-4 center ">
                    <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=Stuart+Pitt' alt='user'> 
                    <h2> Stuart Pitt  </h2>
                    <button class=' bg-white border-1 border-black margin-top-3 border-rounded-more bg-white-hover'>Add Friend</button>
                    </div>
                </div>
                <div class="col-3 margin-1 fill-container">
                <div class=" border-rounded shadow-small padding-4 center">
                    <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=Case+Boss' alt='user'> 
                    <h2> Case Boss </h2>
                    <button class=' bg-white border-1 border-black margin-top-3 border-rounded-more bg-white-hover'>Add Friend</button>
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