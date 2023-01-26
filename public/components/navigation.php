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
            if ($role == 'VerificationTeam' || $role == 'Admin' || $role == 'BoardingOwner') {
                if ($active == 'management') {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue white-hover border-rounded-more ' href='$base/admin'>Management</a>";
                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-grey-hover white-hover border-rounded-more ' href='$base/admin'>Management</a>";
                }
            } elseif ($role == 'Student' || $role == 'Professional') {
                if ($active == 'friends') {
                    echo "          <a class='padding-3 active' href='$base/friends'>Friends</a>";
                    //echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue-hover white-hover border-rounded-more active' href='$base/boarding'>My Boarding</a>";
                } else if ($active == 'boarding') {
                    //echo "          <a class='padding-3' href='$base/friends'>Friends</a>";
                    //echo "              <a class='padding-3 active' href='$base/boarding'>My Boarding</a>";
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue white-hover border-rounded-more ' href='$base/boarding'>My Boarding</a>";
                } else {
                    echo "          <a class='padding-3' href='$base/friends'>Friends</a>";
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue-hover white-hover border-rounded-more ' href='$base/boarding'>My Boarding</a>";
                    //echo "              <a class='padding-3' href='$base/boarding'>My Boarding</a>"; 
                    
                }
            }
        }



        echo "              </nav>";

        if (isset($uname)) {

            echo " 
                <div class='col-3 flex fill-container '>
                    <div class='padding-horizontal-4'><i data-feather='bell'></i></div>
                    <div class=' dropdown padding-2 '>
                        <div class=' dropdown-button  right-flex'>
                            <span class='header-2 padding-horizontal-2 text-overflow'>$fname $lname</span>
                            <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='user'>
                        </div>
                        <div class='dropdown-content'>
                                <a href='$base/profile'><button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='edit'></i><span class=' vertical-align-middle'>Profile</span></button></a>
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
            <div class='padding-horizontal-4'><i data-feather='bell'></i></div>
            <div class=' dropdown padding-2 '>
                <div class=' dropdown-button  right-flex'>
                    <span class='header-2 padding-horizontal-2 text-overflow'>$fname</span>
                    <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$fname+$lname' alt='user'>
                </div>
                <div class='dropdown-content'>
                        <a href='$base/profile'><button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='edit'></i><span class=' vertical-align-middle'>Profile</span></button></a>
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
            if ($role == 'VerificationTeam' || $role == 'Admin' || $role == 'BoardingOwner') {
                if ($active == 'management') {
                    echo "          <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more'  title='Management'  href='$base/admin'><i data-feather='tool'></i><span class='display-medium-none display-small-block  display-none'>Management</span></a>";

                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more'  title='Management'  href='$base/admin'><i data-feather='tool'></i><span class='display-medium-none display-small-block display-none'></span></a>";

                }
            } elseif ($role == 'Student') {
                if ($active == 'friends') {
                    echo "          <a class='padding-vertical-2 margin-1 bg-blue white padding-horizontal-3 border-rounded-more'  title='Friends'  href='$base/friends'><i data-feather='users'></i><span class='display-medium-none display-small-block display-none'>Friends</span></a>";

                } else {
                    echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 border-rounded-more'  title='Friends'  href='$base/friends'><i data-feather='users'></i><span class='display-medium-none display-small-block display-none'></span></a>";

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