<?php

class SideBarNav
{

    public function __construct($active = null, $type = null)
    {

        $base = BASEURL;
        echo " 
        <div class=' padding-top-5 shadow border-rounded-more full-height position-fixed sidebar large left bg-white'>";
        if ($active == 'user') {
            echo "    
            <div class='row padding-top-5 padding-bottom-1  padding-horizontal-4'> 
                <div class='col-12 flex left fill-container  padding-horizontal-3'>
                    <i data-feather='settings' class='grey'></i>
                    <span class=' fill-container  margin-left-2 header-nb'>Users Management</span>
                    <i data-feather='chevron-down' class='grey'></i>
                </div>   
            </div>     ";
        } else {
            echo "     
            <div class='row padding-top-5 padding-bottom-1  padding-horizontal-4'> 
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
            <a href='$base/file1' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Verification Team</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/file1' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Verification Team</span> 
            </div></a> 
                ";
        }
        if ($active == 'user' && $type == 'student') {
            echo "   
            <a href='$base/adminhome/managestudent' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Student</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome/managestudent' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey '>Student</span> 
            </div></a> 
                ";
        }
        if ($active == 'user' && $type == 'professional') {
            echo "   
            <a href='$base/adminhome/manageprofessional' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Professional</span> 
            </div></a> 
                ";
        } else {
            echo "    
            <a href='$base/adminhome/manageprofessional' class=''><div class='row padding-vertical-1'>   
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
            <div class='row padding-top-3 padding-bottom-1 padding-horizontal-4 '> 
            <div class='col-12 flex left fill-container padding-horizontal-3  bg-blue border-rounded padding-vertical-2'>
                <i data-feather='grid' class='white'></i>
                <span class=' fill-container margin-left-2 header-nb white'>Properties</span> 
            </div>   
            </div>   
        ";
        } else {
            echo "  
            <div class='row padding-top-3 padding-bottom-1  padding-horizontal-4'> 
            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='grid' class='grey'></i>
                <span class=' fill-container  margin-left-2 header-nb'>Properties</span> 
            </div>   
            </div>   
        ";
        }

        echo "</div>  ";




    }

}