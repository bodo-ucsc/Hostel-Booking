<?php

class SideBarNav
{

    public function __construct($active = null, $type = null)
    {
        $openNav = 'toggleNav("sidebar-open","sidebar-collapse")';
        $closeNav = 'toggleNav("sidebar-collapse","sidebar-open")';

        $base = BASEURL;
        echo " 
        <div id='sidebar-open' class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar large left bg-white'>
        
        <div class='display-block display-medium-none padding-vertical-1 '> 
            <button onclick=$closeNav  class='  left fill-container  padding-horizontal-3'>
                <i data-feather='menu' class='grey vertical-align-middle'></i>
                <span class='grey header-nb vertical-align-middle'>Menu</span>
            </button>   
        </div>     
        ";

        if ($active == 'user') {
            echo "    
            <div class='row padding-bottom-1 padding-top-2 padding-horizontal-4'> 
                <div class='col-12 flex left fill-container  padding-horizontal-3'>
                    <i data-feather='settings' class='grey'></i>
                    <span class=' fill-container  margin-left-2 header-nb'>Users Management</span>
                    <i data-feather='chevron-down' class='grey'></i>
                </div>   
            </div>     ";
        } else {
            echo "     
            <div class='row padding-bottom-1 padding-top-2 padding-horizontal-4'> 
                <div class='col-12 flex left fill-container  padding-horizontal-3'>
                    <i data-feather='settings' class='grey'></i>
                    <span class=' fill-container margin-left-2 header-nb grey'>Users Management</span>
                    <i data-feather='chevron-down' class='grey'></i>
                </div>   
            </div>     ";
        }

        if ($active == 'user' && $type == 'admin') {
            echo "   
            <a href='$base/adminhome' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Admin</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Admin</span> 
            </div></a> 
                ";
        }
        if ($active == 'user' && $type == 'verification') {
            echo "   
            <a href='$base/adminhome/#' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Verification Team</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome/#' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Verification Team</span> 
            </div></a> 
                ";
        }
        if ($active == 'user' && $type == 'student') {
            echo "   
            <a href='$base/adminhome/#' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Student</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome/#' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Student</span> 
            </div></a> 
                ";
        }
        if ($active == 'user' && $type == 'professional') {
            echo "   
            <a href='$base/adminhome/#' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Professional</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome/#' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Professional</span> 
            </div></a> 
                ";
        }
        if ($active == 'user' && $type == 'boardingOwner') {
            echo "   
            <a href='$base/adminhome/viewboardingOwner' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Boarding Owner</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome/viewboardingOwner' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Boarding Owner</span> 
            </div></a> 
                ";
        }
        if ($active == "properties") {
            echo "
            <a href='$base/#' class=''>  
            <div class='row padding-top-3 padding-bottom-1 padding-horizontal-4 '> 
            <div class='col-12 flex left fill-container padding-horizontal-3  bg-blue border-rounded padding-vertical-2'>
                <i data-feather='grid' class='white'></i>
                <span class=' fill-container margin-left-2 header-nb white'>Properties</span> 
            </div>   
            </div><a/>  
        ";
        } else {
            echo "  
            <a href='$base/#' class=''>
            <div class='row padding-top-3 padding-bottom-1  padding-horizontal-4'> 
            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='grid' class='grey'></i>
                <span class=' fill-container  margin-left-2 header-nb'>Properties</span> 
            </div>   
            </div><a/>     
        ";
        }
        if ($active == "Advertisements") {
            echo "  
            <a href='$base/adminhome/feed' class=''>
            <div class='row padding-top-3 padding-bottom-1 padding-horizontal-4 '> 
            <div class='col-12 flex left fill-container padding-horizontal-3  bg-blue border-rounded padding-vertical-2'>
                <i data-feather='shopping-bag' class='white'></i>
                <span class=' fill-container margin-left-2 header-nb white'>Advertisements</span> 
            </div>   
            </div><a/>     
        ";
        } else {
            echo "  
            <a href='$base/adminhome/feed' class=''>
            <div class='row padding-top-3 padding-bottom-1  padding-horizontal-4'> 
            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='shopping-bag' class='grey'></i>
                <span class=' fill-container  margin-left-2 header-nb'>Advertisements</span> 
            </div>   
            </div><a/>     
        ";
        }

        echo "</div>  ";

        echo " 
        <div id='sidebar-collapse' class='display-block display-medium-none navbar-offset shadow border-rounded-more full-height position-fixed sidebar collapse  left bg-white'>
        
        <div class=' padding-vertical-1 '> 
            <button onclick=$openNav  class='  center fill-container  padding-horizontal-3'>
                <i data-feather='menu' class='grey'></i>
            </button>   
        </div>     
    ";

        if ($active == 'user') {
            echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-blue center fill-container  padding-horizontal-3'>
                    <i data-feather='settings' class='white'></i>
                </button>   
            </div>   
        ";
        } else {
            echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover'>
                    <i data-feather='settings' class=''></i>
                </button>   
            </div>   
        ";
        }

        if ($active == 'properties') {
            echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-blue center fill-container  padding-horizontal-3'>
                    <i data-feather='grid' class='white'></i>
                </button>   
            </div>   
        ";
        } else {
            echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover'>
                    <i data-feather='grid' class=''></i>
                </button>   
            </div>   
        ";
        }
 

        echo "</div>  ";




    }

}