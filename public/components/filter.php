<?php
class Filter
{

    public function __construct()
    {
        echo " 
            <div class=' padding-top-5 shadow border-rounded-more full-height position-fixed sidebar large right bg-white'>
                <div class='row padding-top-5 '>
                    <span class='header-2 col-5 '>Filters</span>
                    <div class='col-4'></div>
                    <i data-feather='x-circle' class='col-3 red-hover '></i>
                </div>
                <div class='row padding-2'>
                    <div class='col-1'></div>
                    <div class='col-10 fill-container'>
                        <input type='text' class='fill-container ' placeholder='Search Filters'>
                    </div>
                </div>
                

            </div> 
        ";
    }
}
?>
