<?php
class Search
{

    public function __construct()
    {
        echo " 
            <div class='row border-rounded-more searchbar '>
                <div class='display-small-block  display-none  col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div class='col-small-7 col-10 fill-container'>
                    <input class=' header-nb border-none fill-container' type='text'
                        placeholder='Search Boarding places, Hostels...'>
                </div>

                <div class='display-none display-small-block col-2'>
                    <button class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i>
                        <span class=' margin-left-2 header-nb'>Filters</span>
                    </button>
                </div>
                <div class='display-block  display-small-none col-1 '>
                    <button class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i> 
                    </button>
                </div>

                <div class='display-none display-small-block  col-2 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more'>Search</button>
                </div>
                <div class='display-small-none display-block col-1 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more'> <i data-feather='search'></i></button>
                </div>
            </div> 
        ";
    }
}
?>