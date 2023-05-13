<?php
session_start();


class Navigation
{

    public function __construct($active = null)
    {

        if (isset($_SESSION['username'])) {
            $uname = $_SESSION['username'];
            $fname = $_SESSION['firstname'];
            $lname = $_SESSION['lastname'];
            $role = $_SESSION['role'];
        }

        $base = BASEURL;
         // notification popup
         echo "
         <div id='notification' class='position-fixed zindex  bg-light notification border-rounded-more shadow margin-horizontal-4 border-box overflow-hidden padding-bottom-3 max-width-300  top-0 right-0 display-none'>
            <div class=' margin-top-5 padding-bottom-3 border-box shadow-small bg-white padding-horizontal-4 border-box border-rounded-more '>
                <div class=' margin-5 display-block ' > <br/><br/> </div>  
                <div class=' margin-5 display-block display-medium-none ' > <br/> </div>
                 <div class='row less-gap '>
                     <div class='col-10 fill-container'>
                         <h3 class=' header-2'>Notifications</h3>
                     </div>
                     <div class='col-2 fill-container right'>
                         <button class='bg-white border-0' onclick='toggleNotification()'><i data-feather='x'></i></button>
                     </div>
                 </div> 
                 <div class='row less-gap border-1 border-blue border-rounded-more  '>
                     <div class='col-6 fill-container center'>
                         <button id='readButton' class='bg-white  fill-container border-rounded-more' onclick='openReadNotif()'>Read</button>
                     </div>
                     <div class='col-6 fill-container  center'>
                         <button id='unreadButton' class='bg-blue white  fill-container border-rounded-more' onclick='openUnreadNotif()'>Unread</button>
                     </div>
                 </div>
            </div>
            <div id='readNotif' class='border-box margin-top-3  border-box fill-vertical max-height-270 overflow-y-auto padding-vertical-2  display-none '>
                  
            </div>

            <div id='unreadNotif' class='border-box margin-top-3  border-box fill-vertical max-height-270 overflow-y-auto padding-vertical-2  '>
               
            </div>
           
                 
                 
         </div>";

        echo "
                <header class='bg-white display-medium-block display-none'>
                        <div class='row'>
                            <div class='cursor-pointer col-3 nav-logo' onclick='location.href=\"$base\"'> 
                                <img src='$base/public/images/logo.svg' alt='logo'>
                            </div>
                            <nav class='col-6  nav-link  fill-container header-nb'>";
        if ($active == 'home') {
            echo "              <a class='padding-3 active' href='$base'>Home</a>";
        } else {
            echo "              <a class='padding-3' href='$base'>Home</a>";
        }
        if ($active == 'feed') {
            echo "              <a class='padding-3 active' href='$base/feed'>Feed</a>";
        } else {
            echo "              <a class='padding-3' href='$base/feed'>Feed</a>";
        }
        if ($active == 'listing') {
            echo "              <a class='padding-3 active' href='$base/listing'>Listing</a>";
        } else {
            echo "              <a class='padding-3' href='$base/listing'>Listing</a>";
        }

        if (isset($uname)) {
            if ($role == 'VerificationTeam' || $role == 'Admin' || $role == 'Manager') {
                if ($active == 'management') {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue white-hover border-rounded-more ' href='$base/userManagement'>Management</a>";
                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-grey-hover white-hover border-rounded-more ' href='$base/userManagement'>Management</a>";
                }
            } else if ($role == 'BoardingOwner') {
                if ($active == 'management') {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue white-hover border-rounded-more ' href='$base/property'>Management</a>";
                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-grey-hover white-hover border-rounded-more ' href='$base/property'>Management</a>";
                }
            } elseif ($role == 'Student' || $role == 'Professional') {
                if ($active == 'friends') {
                    echo "          <a class='padding-3 active' href='$base/friends'>Friends</a>";
                } else {
                    echo "          <a class='padding-3' href='$base/friends'>Friends</a>";
                }
                if (isset($_SESSION['Place'])) {
                    if ($active == 'boarding') {
                        echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue white-hover border-rounded-more ' href='$base/boarding'>Boarding</a>";
                    } else {
                        echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-grey-hover white-hover border-rounded-more ' href='$base/boarding'>Boarding</a>";
                    }
                }
            }
        }



        echo "              </nav>";

        if (isset($uname)) {

            echo " 
                <div class='col-3 flex fill-container '>
                    <div class='padding-2 bell-container cursor-pointer border-rounded-more' onclick='toggleNotification()'>
                    <i class='vertical-align-middle display-block feather-small' data-feather='bell'></i>
                    <span class='notifCount vertical-align-middle  small display-block'>0</span>
                    </div>
                    <div class=' dropdown padding-2 '>
                        <div class=' dropdown-button  right-flex'>
                            <span class='header-2 padding-horizontal-2 text-overflow'>$fname $lname</span>";

            if (isset($_SESSION['profilepic'])) {
                echo "<img class=' dp border-blue border-1 border-circle' src='$base/public/" . $_SESSION['profilepic'] . "' alt='user'>";
            } else {
                echo "<img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='user'>";
            }

            echo "
                           </div>
                        <div class='dropdown-content'>
                                <a href='$base/profile'><button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='user'></i><span class=' vertical-align-middle'>Profile</span></button></a>
                                <a href='$base/home/signout'><button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='log-out'></i><span class=' vertical-align-middle'>Sign Out</span></button></a>
                        </div>
                        
                    </div>
                </div>";
        } else {
            echo "     
                <div class='col-3 nav-signup flex '>                 
                    <a href='$base/register'><button
                            class='header-2 border-black margin-2 bg-white-hover black-hover border-1 border-rounded'>Sign
                            Up</button></a>
                    <a href='$base/signin'><button
                            class='header-2 border-black margin-2 bg-black-hover white-hover border-1 border-rounded'>Sign
                            In</button></a>
                </div>";
        }



        echo "                            
                        </div>
                </header>          
            ";



        echo "
            <header class='full-width display-block display-medium-none bg-white'>
                <div class='row no-gap fill-container padding-vertical-2 shadow'>
                    <div class=' col-4 nav-logo left fill-container'>
                        <img src='$base/public/images/logo.svg' alt='logo'>
                    </div>
                    <div class='col-8 fill-container'>";

        if (isset($uname)) {

            echo "
            <div class='col-3 right-flex fill-container '>
            <div class='padding-3 bell-container cursor-pointer border-rounded-more' onclick='toggleNotification()'>
                <i class='vertical-align-middle feather-small' data-feather='bell'></i> 
                <span class='notifCount vertical-align-middle'>0</span>
            </div>
            <div class=' dropdown padding-2 '>
                <div class=' dropdown-button  right-flex'>
                    <span class='header-2 padding-horizontal-2 text-overflow'>$fname</span>
                    ";

            if (isset($_SESSION['profilepic'])) {
                echo "<img class=' dp border-blue border-1 border-circle' src='$base/public/" . $_SESSION['profilepic'] . "' alt='user'>";
            } else {
                echo "<img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='user'>";
            }

            echo "
                    </div>
                <div class='dropdown-content'>
                        <a href='$base/profile'><button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='user'></i><span class=' vertical-align-middle'>Profile</span></button></a>
                        <a href='$base/home/signout'><button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='log-out'></i><span class=' vertical-align-middle'>Sign Out</span></button></a>
                </div>
                
            </div>
        </div>";
        } else {
            echo "     
                            <div class='nav-signup flex margin-right-1 '>                 
                                <a href='$base/register'><button
                                        class='header-2 border-black margin-1 bg-white-hover black-hover border-1 border-rounded'>Sign
                                        Up</button></a>
                                <a href='$base/signin'><button
                                        class='header-2 border-black margin-1 bg-black-hover white-hover border-1 border-rounded'>Sign
                                        In</button></a>
                            </div>";
        }

        echo "
                    </div>
                    </div>
                    <div class='row autofit'>";

        if ($active == 'home') {
            echo "              <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more' title='Home' href='$base'><i data-feather='home'></i><span class='display-medium-none display-small-block display-none'>Home</span></a>";
        } else {
            echo "              <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more' title='Home' href='$base'><i data-feather='home'></i><span class='display-medium-none display-small-block display-none'></span></a>";
        }
        if ($active == 'feed') {
            echo "              <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more' title='Feed' href='$base/feed'><i data-feather='trello'></i><span class='display-medium-none display-small-block display-none'>Feed</span></a>";
        } else {
            echo "              <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more' title='Feed' href='$base/feed'><i data-feather='trello'></i><span class='display-medium-none display-small-block display-none'></span></a>";
        }
        if ($active == 'listing') {
            echo "              <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more' title='Listing'  href='$base/listing'><i data-feather='book-open'></i><span class='display-medium-none display-small-block display-none'>Listing</span></a>";
        } else {
            echo "              <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more' title='Listing' href='$base/listing'><i data-feather='book-open'></i><span class='display-medium-none display-small-block display-none'></span></a>";
        }


        if (isset($uname)) {
            if ($role == 'VerificationTeam' || $role == 'Admin' || $role == 'Manager') {
                if ($active == 'management') {
                    echo "          <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more'  title='Management'  href='$base/userManagement'><i data-feather='tool'></i><span class='display-medium-none display-small-block  display-none'>Management</span></a>";

                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more'  title='Management'  href='$base/userManagement'><i data-feather='tool'></i><span class='display-medium-none display-small-block display-none'></span></a>";

                }
            } else if ($role == 'BoardingOwner') {
                if ($active == 'management') {
                    echo "          <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more'  title='Management'  href='$base/property'><i data-feather='tool'></i><span class='display-medium-none display-small-block  display-none'>Management</span></a>";

                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more'  title='Management'  href='$base/property'><i data-feather='tool'></i><span class='display-medium-none display-small-block display-none'></span></a>";

                }
            } elseif ($role == 'Student' || $role == 'Professional') {
                if ($active == 'friends') {
                    echo "          <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more'  title='Friends'  href='$base/friends'><i data-feather='users'></i><span class='display-medium-none display-small-block display-none'>Friends</span></a>";

                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more'  title='Friends'  href='$base/friends'><i data-feather='users'></i><span class='display-medium-none display-small-block display-none'></span></a>";

                }
                if (isset($_SESSION['Place'])) {
                    if ($active == 'boarding') {
                        echo "          <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more'  title='Boarding'  href='$base/boarding'><i data-feather='tool'></i><span class='display-medium-none display-small-block  display-none'>Boarding</span></a>";

                    } else {
                        echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more'  title='Boarding'  href='$base/boarding'><i data-feather='tool'></i><span class='display-medium-none display-small-block display-none'></span></a>";

                    }
                }

            }
        }

        echo "
                </div>
                </div>
            </header>";

           
            
    }

}

?>