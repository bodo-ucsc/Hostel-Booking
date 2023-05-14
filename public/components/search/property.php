<?php
class Search
{
    public function __construct($filter = null, $query = null)
    {
        $base = BASEURL;

        if ($filter == null) {

            echo " 
            <form action='$base/listing/search' method='POST' autocomplete='off'>
                <div class='row border-rounded-more searchbar '>
                    <div class='display-small-block  display-none  col-1 '>
                        <i data-feather='search'></i>
                    </div>
            
                    <div id='searchBar' class='suggest col-small-8 col-11 fill-container'>
                        <input id='searchText' class=' header-nb border-none fill-container'  name='searchText' type='text' value='$query'
                            placeholder='Search Boarding places, Hostels...'>
                    </div>
                    <div class='display-none display-small-block  col-3 fill-container'>
                        <button id='submitBtn' class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                    </div>
                    <div class='display-small-none display-block col-1 fill-container'>
                    <button id='submitBtn' class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
                </div>
                <input type='hidden' id='filters' name='filters' value='no'>
                </div> 
            </form> 
            ";
        } else {
            if ($filter == 'true') {


                $closeFilter = 'closeFilter("FilterSidebar")';
                $toglFilter = 'toggleFilter("FilterSidebar")';
                $price = 'showPrice();updateFilterArray("price")';
                $toglCheckbox = 'toggleBox("parkingYes","parkingNo")';

                echo " 
        
                <form id='Filter-Form' action='$base/listing/search' method='POST' autocomplete='off'>
            <div class='row border-rounded-more searchbar '>
                <div class='display-small-block  display-none  col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div id='searchBar' class='suggest col-small-7 col-10 fill-container'>
                    <input id='searchText'  class=' header-nb border-none fill-container' oninput='updateFilterSearch();updateFilterArray(\"searchQuery\")'  name='searchText' type='text' value='$query'
                        placeholder='Search Boarding places, Hostels...'>
                </div>
                <div class='display-none display-small-block col-2'>
                    <button type='button' id='filterButton' onclick=$toglFilter class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i>
                        <span class=' margin-left-2 header-nb'>Filters</span>
                    </button>
                </div>
                <div class='display-block  display-small-none col-1 '>
                    <button type='button' id='filterButton' onclick=$toglFilter class='flex grey  bg-transparent'>
                        <i data-feather='filter'></i> 
                    </button>
                </div>
                <div class='display-none display-small-block  col-2 fill-container'>
                    <button id='submitBtn' class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                </div>
                <div class='display-small-none display-block col-1 fill-container'>
                    <button id='submitBtn' class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
                </div>
                <input type='hidden' id='filters' name='filters' value='no'>
            </div>
        ";

                echo "
            <div class=' margin-top-3 margin-bottom-3'>
                <div id='filter-bar' class='center'>
                    <div id='filter-tags'  ></div>
                    <button type='reset' class=' display-none border-rounded bg-white border-red red border-1' id='filter-clear-btn' onclick='clearfilters()'>Clear All</button>

                </div>
            </div> ";

                echo "
            <div id='FilterSidebar' class=' display-none overflow-y-auto padding-horizontal-3  shadow   fill-vertical position-fixed sidebar large right bg-white'>
            
                
                    <div class='row navbar-offset '>
                        <span class='header-2 col-5 fill-container left'>Filters</span>
                            <div class='col-7 fill-container'> 
                            <button id='clear-button' type='reset' onclick='clearfilters()' class='right  bg-transparent'>
                                <i data-feather='rotate-ccw' class='black-hover '></i>
                            </button> 
                            <button id='submit-button' type='submit' name='submit'  class='right  bg-transparent'>
                                <i data-feather='check-circle' class=' blue-hover '></i>
                            </button> 
                            <button id='filter-close-button' type='button' onclick=$closeFilter  class='right bg-transparent '>
                                <i data-feather='x-circle' class=' red-hover '></i>
                            </button> 
                        </div>
                    </div>
                    
                    <input type='hidden' id='filters' name='filters' value='yes'>
                    <div class='row padding-2  margin-top-3'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-4'>
                            <label for='sortSearch'>Sort By</label>
                        </div>
                        <div class='col-9 fill-container vertical-align-middle'>
                            <select id='sortSearch' oninput='updateFilterArray(\"sortSearch\")' name='sortSearch'>
                                <option value='bestmatch'>Best Match</option>
                                <option value='lowTohigh'>Price low to high</option>
                                <option value='highTolow'>Price high to low</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                    <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='price'>Price Limit</label>
                        </div>
                        <div class='col-5 fill-container'>
                            <input type='range' oninput=$price id='priceRange' min='0' max='170000' value='0' step='1000' name='priceRange'>
                            
                        </div>
                        <div  class='col-4 fill-container left'> <input type='number' min='0' max='170000' value='0'  id='price' name='price' oninput='updatePrice();updateFilterArray(\"price\")' /></div>
                    </div>

                    <div class='row padding-2'>
                    <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='priceType'>Price Type</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='priceType' name='priceType' oninput='updateFilterArray(\"priceType\")'>
                                <option value=''></option>
                                <option value='per month'>Per Month</option>
                                <option value='per boarder'>Per Boarder</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                    <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='propertyType'>Property Type</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='propertyType' name='propertyType' oninput='updateFilterArray(\"propertyType\")'>
                                <option value=''></option>
                                <option value='house'>House</option>
                                <option value='hostel'>Hostel</option> 
                            </select>
                        </div>
                    </div>
                   
                  
                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='city'>City</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='city' name='city' oninput='updateFilterArray(\"city\")' >
                                <option value=''></option>";

                $districts = restAPI("property/cityRest/");
                sort($districts);
                foreach ($districts as $key => $val) {
                    echo "<option value='$val'>$val</option>";
                }
                echo "
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                    <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='street'>Street</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <input type='text' id='street' placeholder='Street Name' name='street' oninput='updateFilterArray(\"street\")'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='NoOfRooms'>Rooms</label>
                        </div>
                        <div class='col-3 fill-container'>
                                <input type='number' id='NoOfRooms' name='NoOfRooms' placeholder='1' min=1 oninput='updateFilterArray(\"NoOfRooms\")'>
                        </div> 

                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='NoOfMembers'>Members</label>
                        </div>
                        <div class='col-3 fill-container'>
                            <input type='number' id='NoOfMembers' placeholder='1' name='NoOfMembers' min='1' oninput='updateFilterArray(\"NoOfMembers\")'>
                        </div> 
                    </div>
                    
                    <div class='row padding-2'>

                        <div class='col-4 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='NoOfWashrooms'>Washrooms</label>
                        </div>
                        <div class='col-3 fill-container'>
                            <input type='number' id='NoOfWashrooms' placeholder='1' name='NoOfWashrooms' min='1' oninput='updateFilterArray(\"NoOfWashrooms\")'>
                        </div> 

                        <div class='col-1 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='squareFeet'>Sq Ft.</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input type='number' id='squareFeet' name='squareFeet' placeholder='300' min='300' oninput='updateFilterArray(\"squareFeet\")'>
                        </div>
                    
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='gender'>Gender</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='gender' name='gender' oninput='updateFilterArray(\"gender\")'>
                                <option value=''></option>
                                <option value='A'>Any</option>
                                <option value='M'>Male</option>
                                <option value='F'>Female</option>
                            </select>
                        </div>
                    </div>
                            
                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='boarderType'>Boarder Type</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='boarderType' name='boarderType' oninput='updateFilterArray(\"boarderType\")'>
                                <option value=''></option>
                                <option value='Any'>Any</option>
                                <option value='Student'>Student Only</option>
                                <option value='Professional'>Professional Only</option>
                            </select>
                        </div>
                    </div>
 


                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left '>
                            <label for='parking'>Parking</label>
                        </div> 
                        <div class='col-9 fill-container left'> 
                            <input class=' vertical-align-middle' type='checkbox' onchange=$toglCheckbox id='parkingYes' name='parking' value='y' oninput='updateFilterArrayRadio(\"parking\")'>
                            <label class=' vertical-align-middle' for='parking'>Yes</label>
                            <div class='padding-horizontal-3 display-inline-block'></div>
                            <input class=' vertical-align-middle' type='checkbox' onchange=$toglCheckbox id='parkingNo' name='parking' value='n' oninput='updateFilterArrayRadio(\"parking\")'>
                            <label class=' vertical-align-middle' for='parking'>No</label>
                        </div>
                    </div>
                    <input type='text' class='opacity-0 bg-transparent border-0 padding-0 margin-0' id='searchQuery' name='searchQuery' value=''>
                    <div class='row padding-2'>
                    </div>

                   
               
            
            </div>
            
            </form>";
            }
        }

    }
}