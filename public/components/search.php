<?php
class Search
{

    public function __construct()
    {
        echo " 
            <div class='row border-rounded-more searchbar '>
                <div class='col-small-1 col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div class='col-small-7 col-9 fill-container'>
                    <input class=' header-nb border-none fill-container' type='text'
                        placeholder='Search Boarding places, Hostels...'>
                </div>
                <div class=' col-small-2 col-1'>
                    <button class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i>
                        <span class=' margin-left-2 header-nb'>Filters</span>
                    </button>
                </div>
                <div class='col-small-2 col-1 fill-container'>
                    <button
                        class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more'>Search</button>
                </div>
            </div> 
        ";
    }
}
?>