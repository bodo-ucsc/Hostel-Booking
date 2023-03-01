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
                <i data-feather='menu' class='grey-hover vertical-align-middle'></i>
                <span class='grey-hover header-nb vertical-align-middle'>Menu</span>
            </button>   
        </div>     
        ";

        if ($_SESSION['role'] == 'VerificationTeam' || $_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Admin') {


            if ($active == 'user') {
                echo "    
            <div class='row padding-bottom-1 padding-top-2 padding-horizontal-4 cursor-pointer' onclick='location.href=\"$base/userManagement/student\"'> 
                <div class='col-12 flex left fill-container  padding-horizontal-3'>
                    <i data-feather='settings' class='black'></i>
                    <span class=' fill-container  margin-left-2 header-nb'>Users Management</span>
                    
                </div>   
            </div>     ";
            } else {
                echo "     
            <div class='row padding-bottom-1 padding-top-2 padding-horizontal-4 cursor-pointer' onclick='location.href=\"$base/userManagement/student\"'> 
                <div class='col-12 flex left fill-container padding-horizontal-3'>
                    <i data-feather='settings' class='grey-hover'></i>
                    <span class=' fill-container margin-left-2 header-nb grey-hover '>Users Management</span>
                   
                </div>   
            </div>     ";
            }
            if ($_SESSION['role'] == 'Admin') {

                if ($active == 'user' && $type == 'admin') {
                    echo "   
            <a href='$base/admin' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Admin</span> 
            </div></a> 
                ";
                } else {
                    echo "    
            <a href='$base/admin' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Admin</span> 
            </div></a> 
                ";
                }
            }
            if ($_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Admin') {

                if ($active == 'user' && $type == 'manager') {
                    echo "   
            <a href='$base/userManagement/manager' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Manager</span> 
            </div></a> 
                ";
                } else {
                    echo "    
            <a href='$base/userManagement/manager' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Manager</span> 
            </div></a> 
                ";
                }
            }
            if ($active == 'user' && $type == 'verification') {
                echo "   
            <a href='$base/userManagement/verificationTeam' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Verification Team</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/userManagement/verificationTeam' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Verification Team</span> 
            </div></a> 
                ";
            }
            if ($active == 'user' && $type == 'student') {
                echo "   
            <a href='$base/userManagement/student' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Student</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/userManagement/student' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Student</span> 
            </div></a> 
                ";
            }
            if ($active == 'user' && $type == 'professional') {
                echo "   
            <a href='$base/userManagement/professional' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Professional</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/userManagement/professional' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Professional</span> 
            </div></a> 
                ";
            }
            if ($active == 'user' && $type == 'boardingOwner') {
                echo "   
            <a href='$base/userManagement/boardingOwner' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Boarding Owner</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/userManagement/boardingOwner' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Boarding Owner</span> 
            </div></a> 
                ";
            }
        }
        if ($active == "properties") {
            echo "  
            <a href='$base/property' class=''>
            <div class='row padding-top-3 padding-bottom-1 padding-horizontal-4 '> 
            <div class='col-12 flex left fill-container padding-horizontal-3  bg-blue border-rounded padding-vertical-2'>
                <i data-feather='grid' class='white'></i>
                <span class=' fill-container margin-left-2 header-nb white'>Properties</span> 
            </div>   
            </div></a>  
        ";
        } else {
            echo "  
            <a href='$base/property' class=''>
            <div class='row padding-top-3 padding-bottom-1  padding-horizontal-4'> 
            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='grid' class='grey-hover'></i>
                <span class=' fill-container  margin-left-2 header-nb grey-hover'>Properties</span> 
            </div>   
            </div></a>   
        ";
        }

        if ($_SESSION['role'] == 'Manager') {
            if ($active == "Advertisement") {
                echo "  
            <a href='$base/advertisement' class=''>
            <div class='row padding-top-3 padding-bottom-1 padding-horizontal-4 '> 
            <div class='col-12 flex left fill-container padding-horizontal-3  bg-blue border-rounded padding-vertical-2'>
                <i data-feather='shopping-bag' class='white'></i>
                <span class=' fill-container margin-left-2 header-nb white'>Advertisements</span> 
            </div>   
            </div></a>     
        ";
            } else {
                echo "  
            <a href='$base/advertisement' class=''>
            <div class='row padding-top-3 padding-bottom-1  padding-horizontal-4'> 
            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='shopping-bag' class='grey-hover'></i>
                <span class=' fill-container  margin-left-2 header-nb grey-hover'>Advertisements</span> 
            </div>   
            </div></a>     
        ";
            }
        }

        if ($_SESSION['role'] == 'Admin') {
            if ($active == "support") {
                echo "              
            <a href='$base/admin/support/issue' class='cursor-pointer' >
            <div class='row padding-top-3 padding-bottom-1 padding-horizontal-4 '> 

            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='headphones' class='black'></i>
                <span class='black fill-container  margin-left-2 header-nb'>Support</span>
                
            </div>     
 
            </div></a>     
        ";
            } else {
                echo "              
            <a href='$base/admin/support/issue' class='cursor-pointer' >
            <div class='row padding-top-3 padding-bottom-1  padding-horizontal-4'> 
            <div class='col-12 flex left fill-container  padding-horizontal-3'>
                <i data-feather='headphones' class='grey-hover'></i>
                <span class='grey-hover fill-container  margin-left-2 header-nb'>Support</span>
               
            </div>    
            </div></a>     
        ";
            }
            if ($active == 'support' && $type == 'Issue') {
                echo "   
            <a href='$base/admin/support/issue' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Issue</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/admin/support/issue' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Issue</span> 
            </div></a> 
                ";
            }
            if ($active == 'support' && $type == 'Suggestion') {
                echo "   
            <a href='$base/admin/support/suggestion' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Suggestion</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/admin/support/suggestion' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Suggestion</span> 
            </div></a> 
                ";
            }
        }
        if ($_SESSION['role'] == 'VerificationTeam') {
            if ($active == 'verification') {
                echo "    
            <div class='row padding-bottom-1 padding-top-3 padding-horizontal-4 cursor-pointer' onclick='location.href=\"$base/verification/\"'> 
                <div class='col-12 flex left fill-container  padding-horizontal-3'>
                    <i data-feather='user-check' class='black'></i>
                    <span class=' fill-container  margin-left-2 header-nb'>Verification</span>
                    
                </div>   
            </div>     ";
            } else {
                echo "     
            <div class='row padding-bottom-1 padding-top-3 padding-horizontal-4 cursor-pointer' onclick='location.href=\"$base/verification/\"'> 
                <div class='col-12 flex left fill-container  padding-horizontal-3'>
                    <i data-feather='user-check' class='grey-hover'></i>
                    <span class=' fill-container margin-left-2 header-nb grey-hover'>Verification</span>
                   
                </div>   
            </div>     ";
            }

            if ($active == 'verification' && $type == 'student') {
                echo "   
            <a href='$base/verification/' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2  fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Student</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/verification/' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Student</span> 
            </div></a> 
                ";
            }
            if ($active == 'verification' && $type == 'professional') {
                echo "   
            <a href='$base/verification/professional' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Professional</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/verification/professional' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Professional</span> 
            </div></a> 
                ";
            }
            if ($active == 'verification' && $type == 'boardingOwner') {
                echo "   
            <a href='$base/verification/boardingOwner' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Boarding Owner</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/verification/boardingOwner' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Boarding Owner</span> 
            </div></a> 
                ";
            }
            if ($active == 'verification' && $type == 'boardingPlace') {
                echo "   
            <a href='$base/verification/boardingPlace' class=''><div class='row padding-vertical-1 fill-container'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 border-rounded padding-vertical-2 bg-blue white '>Boarding Place</span> 
            </div></a> 
                ";
            } else {
                echo "    
            <a href='$base/verification/boardingPlace' class=''><div class='row padding-vertical-1'>   
                <div class='col-1'></div>
                <span class='col-10 margin-left-2 fill-container padding-left-4 grey-hover '>Boarding Place</span> 
            </div></a> 
                ";
            }
        }
        echo "</div>  ";

        echo " 
        <div id='sidebar-collapse' class='display-block display-medium-none navbar-offset shadow border-rounded-more full-height position-fixed sidebar collapse  left bg-white'>
        
        <div class=' padding-vertical-1 '> 
            <button onclick=$openNav  class='  center fill-container  padding-horizontal-3'>
                <i data-feather='menu' class='grey-hover'></i>
            </button>   
        </div>     
    ";

        if ($active == 'user') {
            echo "    
            <div class=' padding-bottom-1 padding-top-2 ' onclick='location.href=\"$base/admin\"'> 
                <button class=' bg-blue center fill-container  padding-horizontal-3'>
                    <i data-feather='settings' class='white'></i>
                </button>   
            </div>   
        ";
        } else {
            echo "    
            <div class=' padding-bottom-1 padding-top-2 ' onclick='location.href=\"$base/admin\"'> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover'>
                    <i data-feather='settings' class=''></i>
                </button>   
            </div>   
        ";
        }

        if ($active == 'properties') {
            echo "    
            <div class=' padding-bottom-1 padding-top-2' onclick='location.href=\"$base/admin/property\"'> 
                <button class=' bg-blue center fill-container  padding-horizontal-3'>
                    <i data-feather='grid' class='white'></i>
                </button>   
            </div>   
        ";
        } else {
            echo "    
            <div class=' padding-bottom-1 padding-top-2' onclick='location.href=\"$base/admin/property\"'> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover'>
                    <i data-feather='grid' class=''></i>
                </button>   
            </div>   
        ";
        }

        if ($_SESSION['role'] == 'Manager') {

            if ($active == 'Advertisement') {
                echo "    
            <div class=' padding-bottom-1 padding-top-2' onclick='location.href=\"$base/advertisement\"'> 
                <button class=' bg-blue center fill-container  padding-horizontal-3'>
                    <i data-feather='shopping-bag' class='white'></i>
                </button>   
            </div>   
        ";
            } else {
                echo "    
            <div class=' padding-bottom-1 padding-top-2' onclick='location.href=\"$base/advertisement\"'> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover'>
                    <i data-feather='shopping-bag' class=''></i>
                </button>   
            </div>   
        ";
            }
        }

        if ($_SESSION['role'] == 'Admin') {

            if ($active == 'support') {
                echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-blue center fill-container  padding-horizontal-3' onclick='location.href=\"$base/admin/support/issue\"'> 
                    <i data-feather='headphones' class='white'></i>
                </button>   
            </div>   
        ";
            } else {
                echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover' onclick='location.href=\"$base/admin/support/issue\"'> 
                    <i data-feather='headphones' class=''></i>
                </button>   
            </div>   
        ";
            }
        }
        if ($_SESSION['role'] == 'VerificationTeam') {

            if ($active == 'verification') {
                echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-blue center fill-container  padding-horizontal-3' onclick='location.href=\"$base/verification\"'> 
                    <i data-feather='user-check' class='white'></i>
                </button>   
            </div>   
        ";
            } else {
                echo "    
            <div class=' padding-bottom-1 padding-top-2 '> 
                <button class=' bg-white-hover center fill-container  padding-horizontal-3 grey-hover' onclick='location.href=\"$base/verification\"'> 
                    <i data-feather='user-check' class=''></i>
                </button>   
            </div>   
        ";
            }
        }

        echo "</div>  ";




    }

}