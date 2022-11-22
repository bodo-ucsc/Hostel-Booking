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
                <header class='bg-white'>
                        <div class='row'>
                            <div class=' col-3 nav-logo'>
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
                echo "          <a class='padding-vertical-2 margin-1 padding-horizontal-3 bg-blue-hover white-hover border-rounded-more ' href='$base/management'>Management</a>";
            }
            elseif ($role == 'Student') {
                echo "          <a class='padding-3 active' href='$base/friends'>Friends</a>";
            }
        }



        echo "              </nav>";

        if (isset($uname)) {

            echo " 
                <div class='col-3 flex fill-container '>
                    <div class='padding-horizontal-4'><i data-feather='bell'></i></div>
                    <div class=' dropdown padding-2 '>
                        <div class=' dropdown-button  right-flex'>
                            <span class='header-2 padding-horizontal-2'>$fname $lname</span>
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
                    <a href='signup'><button
                            class='header-2 border-black margin-2 bg-white-hover black-hover border-1 border-rounded'>Sign
                            Up</button></a>
                    <a href='signin'><button
                            class='header-2 border-black margin-2 bg-black-hover white-hover border-1 border-rounded'>Sign
                            In</button></a>
                </div>";
        }



        echo "                            
                        </div>
                </header>          
            ";





    }

}

?>