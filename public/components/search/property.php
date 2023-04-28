<?php
class Search
{
    public function __construct($filter=null)
    { 
        $base = BASEURL;

        if($filter==null){
            echo " 
            <form action='$base/searchProperty/Search' method='POST'>
                <div class='row border-rounded-more searchbar '>
                    <div class='display-small-block  display-none  col-1 '>
                        <i data-feather='search'></i>
                    </div>
            
                    <div id='search-bar' class='col-small-8 col-10 fill-container'>
                        <input id='searchText'  class=' header-nb border-none fill-container' required name='searchText' type='text'
                            placeholder='Search Boarding places, Hostels...'>
                    </div>
                    <div class='display-none display-small-block  col-3 fill-container'>
                        <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                    </div>
                    <div class='display-small-none display-block col-1 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
                </div>
                <input type='hidden' id='filters' name='filters' value='no'>
                </div> 
            </from>  
            ";
        }else{
          if($filter=='true'){

            $closeFilter = 'closeFilter("FilterSidebar")';
            $toglFilter= 'toggleFilter("FilterSidebar")';
            $price='showPrice("priceRange","priceOutput")';
            $toglCheckbox = 'toggleBox("parkingYes","parkingNo")';

        echo " 
        <form action='$base/searchProperty/Search' method='POST'>
        
            <div class='row border-rounded-more searchbar '>
                <div class='display-small-block  display-none  col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div id='search-bar' class='col-small-7 col-10 fill-container'>
                    <input id='searchText'  class=' header-nb border-none fill-container' required name='searchText' type='text'
                        placeholder='Search Boarding places, Hostels...'>
                </div>
                <div class='display-none display-small-block col-2'>
                    <button id='filter-button' onclick=$toglFilter class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i>
                        <span class=' margin-left-2 header-nb'>Filters</span>
                    </button>
                </div>
                <div class='display-block  display-small-none col-1 '>
                    <button id='filter-button' onclick=$toglFilter class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i> 
                    </button>
                </div>
                <div class='display-none display-small-block  col-2 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                </div>
                <div class='display-small-none display-block col-1 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
                </div>
                <input type='hidden' id='filters' name='filters' value='no'>
            </div>
        </form>
        ";

        echo "
            <div id='FilterSidebar' class=' display-none padding-top-5 shadow border-rounded-more full-height position-fixed sidebar large right bg-white'>
                <div class='row padding-top-5 margin-top-5 '>
                    <span class='header-2 col-5 '>Filters</span>
                    <div class='col-4'></div>
                    <button id='filter-close-button' onclick=$closeFilter  class='right fill-container padding-top-4 bg-transparent position-absolute'>
                        <i data-feather='x-circle' class='col-3 red-hover '></i>
                    </button> 
                </div>
                
                <form id='Filter-Form' action='$base/searchProperty/Search' method='POST'>
                    <input type='hidden' id='filters' name='filters' value='yes'>
                    <div class='row padding-2  margin-top-3'>
                        <div class='col-3 fill-container'>
                        <label for='Sort'>Sort By</label>
                        </div>
                        <div class='col-7 fill-container'>
                            <select class='' id='sortSearch'>
                                <option value='bestmatch'>Best Match</option>
                                <option value='new'>Newest</option>
                                <option value='low2high'>Price low to high</option>
                                <option value='high2low'>Price high to low</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 fill-container'>
                            <label for='price'>Price</label>
                        </div>
                        <div class='col-7 fill-container'>
                            <input type='range' onchange=$price id='priceRange' min='0' max='70000' value='0' step='1000' name='priceRange'>
                            <div  class='header-nb'>Rs: <span id='priceOutput' class='header-nb' name='priceOutput' ></span></div>
                            <input type='hidden' id='price' name='price' >
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='priceType'>Price Type</label>
                        </div>
                        <div class='col-6 fill-container'>
                            <select id='priceType' name='priceType'>
                                <option value=''></option>
                                <option value='month'>Monthly</option>
                                <option value='week'>Weekly</option>
                                <option value='dail'>Daily</option>
                                <option value='member'>Per Member</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='propertyType'>Property Type</label>
                        </div>
                        <div class='col-6 fill-container'>
                            <select id='propertyType' name='propertyType'>
                                <option value=''></option>
                                <option value='house'>House</option>
                                <option value='hostel'>Hostel</option>
                                <option value='apartment'>Apartment</option>
                                <option value='room'>Room</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 fill-container'>
                            <label for='street'>Street</label>
                        </div>
                        <div class='col-8 fill-container'>
                            <input type='text' id='street' name='street'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 fill-container'>
                            <label for='city'>City</label>
                        </div>
                        <div class='col-8 fill-container'>
                            <input type='text' id='city' name='city'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='NoOfRooms'>No. of Rooms</label>
                        </div>
                            <div class='col-4 fill-container'>
                                <input type='number' id='NoOfRooms' name='NoOfRooms' min=1>
                            </div>
                        </div>

                        <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='NoOfMembers'>No. of Members</label>
                        </div>
                            <div class='col-4 fill-container'>
                                <input type='number' id='NoOfMembers' name='NoOfMembers' min='1'>
                            </div>
                        </div>

                    <div class='row padding-2'>
                        <div class='col-6 fill-container'>
                            <label for='NoOfWashrooms'>No of Washrooms</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input type='number' id='NoOfWashrooms' name='NoOfWashrooms' min='1'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='gender'>Gender</label>
                        </div>
                        <div class='col-6 fill-container'>
                            <select id='gender' name='gender'>
                                <option value=''></option>
                                <option value='m'>Male</option>
                                <option value='f'>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='boarderType'>Boarder Type</label>
                        </div>
                        <div class='col-5 fill-container'>
                            <select id='boarderType' name='boarderType'>
                                <option value=''>Any</option>
                                <option value='single'>Single</option>
                                <option value='family'>Family</option>
                                <option value='couple'>Couple</option>
                        </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='squareFeet'>Square Feet</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input type='number' id='squareFeet' name='squareFeet' min='0'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='parking'>Parking</label>
                        </div>
                    </div>
                    <div class='row padding-2 '>
                        <div class='col-4 fill-container'> 
                            <label for='parking'>Yes</label>
                            <input type='checkbox' onchange=$toglCheckbox id='parkingYes' name='parking' value='y'>
                        </div>
                        <div class='col-4 fill-container'> 
                            <label for='parking'>No</label>
                            <input type='checkbox' onchange=$toglCheckbox id='parkingNo' name='parking' value='n'>
                        </div>
                    </div>
                   
                    <div class='row padding-2 margin-bottom-5'>
                        <div class='col-5 fill-container'>
                            <input type='reset'  id='reset' class=' padding-3 header-nb fill-container border-1 bg-blue-hover white-hover border-rounded-more'></button>
                        </div>
                        <div class='col-5 fill-container'>
                            <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Apply</button>
                        </div>
                        
                    </div>
            
                    </div>  
                </form>
            
            </div> ";

        }
   }
//    <div class='row padding-5 margin-bottom-5'>
//    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Apply</button>
// </div>
// <div class='col-5 fill-container'>
// <input type='reset' class='header-nb fill-container border-1 bg-blue-hover white-hover border-rounded-more'>Reset</button>
       
        // echo " 
        // <form action='$base/searchProperty' method='POST'>
        //     <div class='row border-rounded-more searchbar '>
        //         <div class='display-small-block  display-none  col-1 '>
        //             <i data-feather='search'></i>
        //         </div>
        
        //         <div id='search-bar' class='col-small-8 col-10 fill-container'>
        //             <input id='searchText'  class=' header-nb border-none fill-container' required name='searchText' type='text'
        //                 placeholder='Search Boarding places, Hostels...'>
        //         </div>

        //         <div class='display-none display-small-block  col-3 fill-container'>
        //             <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
        //         </div>
        //         <div class='display-small-none display-block col-1 fill-container'>
        //         <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
        //     </div>
                
        //     </div> 
        //  </from>  
        // ";

    }}
