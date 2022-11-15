<?php
session_start();

class Navigation
{

    public function __construct($active = null)
    {

        $base = BASEURL;
        echo "
                <header class='bg-white'>
                        <div class='row'>
                            <div class='  col-3 nav-logo'>
                                <img src='$base/public/images/logo.svg' alt='logo'>
                            </div>
                            <nav class='col-6  nav-link flex fill-container header-nb'>";
        if ($active == 'home') {
            echo "          
                                <a class='padding-3 active' href='$base'>Home</a>
                                <a class='padding-3' href='feed.html'>Feed</a>
                                <a class='padding-3' href='listing.html'>Listing</a>";
        } else if ($active == 'feed') {
            echo "          
                                <a class='padding-3' href='$base'>Home</a>
                                <a class='padding-3 active' href='feed.html'>Feed</a>
                                <a class='padding-3' href='listing.html'>Listing</a>";
        } else if ($active == 'listing') {
            echo "          
                                <a class='padding-3' href='$base'>Home</a>
                                <a class='padding-3' href='feed.html'>Feed</a>
                                <a class='padding-3 active' href='listing.html'>Listing</a>";
        } else {
            echo "          
                                <a class='padding-3' href='$base'>Home</a>
                                <a class='padding-3' href='feed.html'>Feed</a>
                                <a class='padding-3' href='listing.html'>Listing</a>";
        }
        echo "              </nav>";

        if (isset($_SESSION['username'])) {
            $name = $_SESSION['username'];
            $base = BASEURL;
            echo " 
                <div class='col-3 flex fill-container '>
                    <div class='padding-horizontal-4'><i data-feather='bell'></i></div>
                    <div class=' dropdown padding-2 '>
                        <div class=' dropdown-button  right-flex'>
                            <span class='header-2 padding-horizontal-2'>$name</span>
                            <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$name' alt='user'>
                        </div>
                        <div class='dropdown-content'>
                                <a href='$base/profile'><button class='fill-container border-rounded bg-white-hover left flex'><i class='padding-right-2' data-feather='edit'></i>Profile</button></a>
                                <a href='$base/home/signout'><button class='fill-container border-rounded bg-white-hover left flex'><i class='padding-right-2' data-feather='log-out'></i>Sign Out</button></a>
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