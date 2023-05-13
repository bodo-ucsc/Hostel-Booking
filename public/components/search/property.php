<?php
class Search
{
    public function __construct($filter = null, $query = null)
    {
        $provinces = array(
            "Western" => array("Colombo", "Gampaha", "Kaluthara"),
            "Southern" => array("Galle", "Matara", "Hambantota"),
            "Eastern" => array("Ampara", "Batticaloa", "Trincomalee"),
            "Northern" => array("Jaffna", "Kilinochchi", "Vavuniya", "Mullaitivu", "Mannar"),
            "North Western" => array("Kurunegala", "Puttalam"),
            "North Central" => array(" Polonnaruwa", "Anuradhapure"),
            "Uva" => array("Badulla", "Moneragala"),
            "Sabaragamuwa" => array("Kegalle", "Ratnapura"),
            "Central" => array("Kandy", "Matale", "Nuwara Eliya")
        );
        $base = BASEURL;

        if ($filter == null) {

            echo " 
            <form action='$base/searchProperty' method='POST' autocomplete='off'>
                <div class='row border-rounded-more searchbar '>
                    <div class='display-small-block  display-none  col-1 '>
                        <i data-feather='search'></i>
                    </div>
            
                    <div id='searchBar' class='suggest col-small-8 col-10 fill-container'>
                        <input id='searchText' class=' header-nb border-none fill-container' required name='searchText' type='text' value='$query'
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

                echo " 
        <form action='$base/searchProperty' method='POST' autocomplete='off'>
        
            <div class='row border-rounded-more searchbar '>
                <div class='display-small-block  display-none  col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div id='searchBar' class='suggest col-small-7 col-10 fill-container'>
                    <input id='searchText'  class=' header-nb border-none fill-container' name='searchText' type='text' oninput='updateFilterSearch();updateFilterArray(\"searchQuery\")' value='$query'
                        placeholder='Search Boarding places, Hostels...'>
                </div>
                <div class='display-none display-small-block col-2'>
                <button id='filterButton' type='button' onclick=toggleFilter() class='flex grey  bg-transparent'>
                    <i data-feather='filter'></i>
                    <span class=' margin-left-2 header-nb'>Filters</span>
                </button>
                </div>
                <div class='display-block  display-small-none col-1 '>
                    <button id='filterButton' type='button' onclick=toggleFilter() class='flex grey  bg-transparent'>
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
               
            <div id='FilterSidebar' class='display-none overflow-y-auto padding-horizontal-3  shadow   fill-vertical position-fixed sidebar large right bg-white'>
                <div class='row navbar-offset '> 
                    <span class='header-2 col-5 fill-container left'>Filters</span>
                        <div class='col-7 fill-container'> 
                        <button id='clear-button' type='reset' onclick='clearfilters()' class='right  bg-transparent'>
                            <i data-feather='rotate-ccw' class='black-hover '></i>
                        </button>
                        <button id='submit-button' type='submit' name='submit'  class='right  bg-transparent'>
                            <i data-feather='check-circle' class=' blue-hover '></i>
                        </button>
                        <button id='filter-close-button' type='button' onclick=closeFilter()  class='right bg-transparent '>
                                <i data-feather='x-circle' class=' red-hover '></i>
                        </button>
                    </div>
                </div>
                          
                    <input type='hidden' id='filters' name='filters' value='yes'>
                    <input type='hidden' id='searchQuery' name='searchQuery' value='' >
                     
                    <div class='row padding-2  margin-top-3'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-4'>
                            <label for='sortSearch'>Sort By</label>
                        </div>
                        <div class='col-9 fill-container vertical-align-middle'>
                            <select id='sortSearch' name='sortSearch' oninput='updateFilterArray(\"sortSearch\")'>
                                <option value='bestmatch'>Best Match</option>
                                <option value='lowTohigh'>Price low to high</option>
                                <option value='highTolow'>Price high to low</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                        <label for='priceRange'>Price Limit</label>
                        </div>
                        <div class='col-5 fill-container'>
                            <input type='range' onchange=showPrice() id='priceRange' min='0' max='70000' value='0' step='1000' name='priceRange'  oninput='updatePrice();updateFilterArray(\"price\")'>
                            <div  class='col-4 fill-container left header-nb'>
                            Rs: <span id='priceOutput' class='header-nb' name='priceOutput' ></span>
                            </div>
                            <input type='hidden' id='price' name='price' >
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='priceType'>Price Type</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='priceType' name='priceType' oninput='updateFilterArray(\"priceType\")>
                                <option value=''></option>
                                <option value='per month'>Per Month</option>
                                <option value='per member'>Per Boarder</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='propertyType'>Property Type</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='propertyType' name='propertyType' oninput='updateFilterArray(\"propertyType\")>
                                <option value=''></option>
                                <option value='house'>House</option>
                                <option value='hostel'>Hostel</option>
                                <option value='apartment'>Apartment</option>
                                <option value='room'>Room</option>
                            </select>
                        </div>
                    </div>";
// echo"
//                     <div class='row padding-2'>
//                         <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
//                             <label for='province'>Province</label>
//                         </div>
//                         <div class='col-9 fill-container'>
//                             <select id='province' name='province' onchange='updateDistricts()' oninput='updateFilterArray(\"provice\")'>
//                                 <option value=''></option>";
//                                 foreach($provinces as $province => $districts) {
//                                     echo "<option value='$province'>$province</option>";
//                                 }
//             echo"
//                             </select>
//                         </div>
//                     </div>";
// echo"
//                     <div class='row padding-2'>
//                         <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
//                             <label for='district'>District</label>
//                         </div>
//                         <div class='col-9 fill-container'>
//                             <select id='district' name='district' oninput='updateFilterArray(\"disrict\")'></select>
//                             </select>
//                         </div>
//                     </div>";
echo "
                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='street'>Street</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <input type='text' id='street' name='street' oninput='updateFilterArray(\"street\")'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='city'>City</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <input type='text' id='city' name='city' oninput='updateFilterArray(\"city\")'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='NoOfRooms'>Rooms</label>
                        </div>
                        <div class='col-3 fill-container'>
                            <input type='number' id='NoOfRooms' name='NoOfRooms' min=1 oninput='updateFilterArray(\"NoOfRooms\")'>
                        </div>
                    
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='NoOfMembers'>Members</label>
                        </div>
                        <div class='col-3 fill-container'>
                            <input type='number' id='NoOfMembers' name='NoOfMembers' min='1' oninput='updateFilterArray(\"NoOfMembers\")'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='NoOfWashrooms'>Washrooms</label>
                        </div>
                        <div class='col-3 fill-container'>
                            <input type='number' id='NoOfWashrooms' name='NoOfWashrooms' min='1' oninput='updateFilterArray(\"NoOfWashrooms\")'>
                        </div>

                        <div class='col-1 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='squareFeet'>Sq Ft.</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input type='number' id='squareFeet' name='squareFeet' min='300' oninput='updateFilterArray(\"squareFeet\")'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='gender'>Gender</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='gender' name='gender' oninput='updateFilterArray(\"gender\")'>
                                <option value=''></option>
                                <option value='m'>Male</option>
                                <option value='f'>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left margin-bottom-3'>
                            <label for='boarderType'>Boarder Type</label>
                        </div>
                        <div class='col-9 fill-container'>
                            <select id='boarderType' name='boarderType' oninput='updateFilterArray(\"boarderType\")'>
                                <option value=''>Any</option>
                                <option value='student'>Student</option>
                                <option value='professional'>Professional</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 big fill-container vertical-align-middle left '>
                            <label for='parkingYes'>Parking</label>
                        </div>
                        <div class='col-9 fill-container left'>
                            <label for='parkingYes' class='vertical-align-middle' >Yes</label>
                            <input class='vertical-align-middle' type='checkbox' onchange=toggleBox() id='parkingYes' name='parking' value='y' oninput='updateFilterArrayRadio(\"parking\")'>
                            <div class='padding-horizontal-3 display-inline-block'></div>
                            <label for='parkingNo' class='vertical-align-middle'>No</label>
                            <input class='vertical-align-middle' type='checkbox' onchange=toggleBox() id='parkingNo' name='parking' value='n' oninput='updateFilterArrayRadio(\"parking\")'>
                        </div>
                    </div>
                    <div class='row padding-2'>
                    </div>
                    </div>
                </form>
          
             ";
            }
        }
    }
}
