<?php
class Search
{
    public function __construct()
    {
        $base = BASEURL;

        echo " 
        <form action='$base/searchProperty' method='POST' onsubmit='return checkforBlanck()'>
            <div class='row border-rounded-more searchbar '>
                <div class='display-small-block  display-none  col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div id='search-bar' class='col-small-7 col-10 fill-container'>
                    <input id='search-key'  class=' header-nb border-none fill-container' name='searchText' type='text'
                        placeholder='Search Boarding places, Hostels...'>
                </div>

                <div id='filter-button' onclick=openFilter() class='display-none display-small-block col-2'>
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
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                </div>
                <div class='display-small-none display-block col-1 fill-container'>
                <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
            </div>
                
            </div> 
           
        ";
        echo " 
            <div id='mySidebar' class='sidebarfilter'>

                    <div class='row padding-top-5 margin-top-5'>
                        <button onclick=closeNav()  class=' right fill-container  padding-top-4 bg-transparent position-absolute'>
                            <i id='icon' data-feather='x-circle' class='col-3 red-hover vertical-align-middle '></i>
                        </button>   
                    </div>
                
                    <div class='col-10 fill-container'>
                        <form id='filter-form'>
                            <div class='filter-container'>

                                <div class='row filter-item'>
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
                                <div class='row filter-item'>
                                    <div class='col-3 fill-container'>
                                        <label for='price'>Price</label>
                                    </div>
                                    <div class='col-8 fill-container'>
                                    <input type='range' id='price-range' min='0' max='50000' step='1000' value='2000'>
                                    <div>Selected Range: <span id='price-output'></span></div>
                                    </div>
                                </div>
                        
                                <div class='row filter-item'>
                                    <div class='col-4 fill-container'>
                                        <label for='price-type'>Price Type</label>
                                    </div>
                                    <div class='col-6 fill-container'>
                                        <select id='price-type' name='price-type'>
                                            <option value='monthly'>Monthly</option>
                                            <option value='weekly'>Weekly</option>
                                            <option value='daily'>Daily</option>
                                        </select>
                                    </div>
                                </div>

                            <div class='row filter-item'>
                                <div class='col-2 fill-container'>
                                    <label for='street'>Street</label>
                                </div>
                                <div class='col-8 fill-container'>
                                    <input type='text' id='street' name='street'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-2 fill-container'>
                                    <label for='city-name'>City</label>
                                </div>
                                <div class='col-8 fill-container'>
                                    <input type='text' id='city-name' name='city-name'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-5 fill-container'>
                                    <label for='no-of-rooms'>No. of Rooms</label>
                                </div>
                                <div class='col-4 fill-container'>
                                    <select id='no-of-members' name='PriceType'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-5 fill-container'>
                                    <label for='no-of-members'>No of Members</label>
                                </div>
                                <div class='col-4 fill-container'>
                                    <input type='number' id='no-of-members' name='NoOfMembers' min='1' max='15' value='1'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-5 fill-container'>
                                    <label for='no-of-wash-rooms'>No of Washrooms</label>
                                </div>
                                <div class='col-4 fill-container'>
                                    <select id='no-of-wash-rooms' name='NoOfWashRooms'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option> 
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-4 fill-container'>
                                    <label for='gender'>Gender</label>
                                </div>
                                <div class='col-6 fill-container'>
                                    <select id='gender' name='Gender'>
                                        <option value='m'>Male</option>
                                        <option value='f'>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-5 fill-container'>
                                    <label for='boarder-type'>Boarder Type</label>
                                </div>
                                <div class='col-5 fill-container'>
                                    <select id='boarder-type' name='boarder-type'>
                                        <option value='family'>Family</option>
                                        <option value='single'>Single</option>
                                        <option value='couple'>Couple</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-5 fill-container'>
                                    <label for='square-feet'>Square Feet</label>
                                </div>
                                <div class='col-4 fill-container'>
                                    <input type='number' id='square-feet' name='sqft'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-4 fill-container'>
                                    <label for='parking'>Parking</label>
                                </div>
                                <div class='col-2 fill-container'>
                                <input type='checkbox' id='parking' name='Parking'>
                                </div>
                            </div>

                            <div class='row filter-item padding-top-3'>
                                <div class='col-5 fill-container'>
                                    <button id='reset' class='header-nb fill-container border-1 bg-blue-hover white-hover border-rounded-more'>Reset</button>
                                </div>
                                <div class='col-5 fill-container'>
                                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                                </div>
                               
                            </div>
                        </form>
                    </div>
            </div>
        ";
    }
}
?>

<script>
    
    function checkforBlanck(){

        if(document.getElementById("search-key").value == ""){
            alert("Please enter search text");
            document.getElementById("search-key").focus();
            return false;
        }
    }
    function openFilter() {
        document.getElementById("mySidebar").style.width = "330px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    
    }
    const priceRange = document.getElementById("price-range");
    const priceOutput = document.getElementById("price-output");
    priceOutput.innerHTML = priceRange.value;

    priceRange.oninput=function() {
        priceOutput.innerHTML = this.value;
    };

    
    function resetFilter(){

        document.getElementById("price-range").value = 0;
        document.getElementById("no-of-wash-rooms").value = 1;
        document.getElementById("no-of-members").value = 1;
        document.getElementById("no-of-rooms").value = 1;
        document.getElementById("city-name").value = "";
        document.getElementById("street").value = "";
        document.getElementById("price-output").innerHTML = 0;
        document.getElementById("price-range").value = 0;
        document.getElementById("gender").value = "m";
        document.getElementById("boarder-type").value = "family";
        document.getElementById("square-feet").value = "";
        document.getElementById("parking").checked = false;

    }
    /*
    var displayed = false;
    function openFilter() {
        var searchbar = document.getElementById("search-bar");
        var div = document.getElementById("filter-open");
        var filterbutton = document.getElementById("filter-button");
        if (displayed) {
            div.style.display = "none";
            filterbutton.style.display = "block";
            displayed = false;
        } else {
            div.style.display = "block";
            filterbutton.style.display = "none";
            displayed = true;
        }
    }
    */
</script>