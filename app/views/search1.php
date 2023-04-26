<?php

new HTMLHeader("Search | Place");
new Navigation();
$base = BASEURL;

?>

<div class='navbar-offset full-width'>
    <div class='row full-width margin-bottom-4'>
        <div class='col-12'>
            <?php
            
            echo"

            <form action='$base/searchProperty' method='POST'>
                <div class='row border-rounded-more searchbar '>
                    <div class='display-small-block  display-none  col-1 '>
                        <i data-feather='search'></i>
                    </div>

                    <div id='search-bar' class='col-small-7 col-10 fill-container'>
                        <input id='search-key' class=' header-nb border-none fill-container' required name='searchText' type='text' placeholder='Search Boarding places, Hostels...'>
                    </div>

                    <div id='filter-button' class='display-none display-small-block col-2'>
                        <button onclick=openFilter() class='flex grey  bg-transparent'>
                            <i data-feather='filter'></i>
                            <span class=' margin-left-2 header-nb'>Filters</span>
                        </button>
                    </div>
                    <div class='display-block  display-small-none col-1 '>
                        <button onclick=openFilter() class='flex grey  bg-transparent'>
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
        </div>

    </div>";
    
    if ($data) {
        $resultCount = $data['resultCount'];
        $searchText = $data['searchText'];
    }
    echo "
            <div class='row full-width'>
                <span class='col-12 grey'>
                    Search result for '" . $searchText . "'<br>
                    There are " . $resultCount . " results found!!!
                </span>
            </div>";

    if ($resultCount > 0) {

        echo "<div class='center'>";
        while ($row = $data['result']->fetch_assoc()) {

            $PlaceId = $row['PlaceId'];
            //echo $PlaceId;
            $place = new PropertyCard($PlaceId);

            // echo "place id= ".$row['PlaceId']."<br>";
            // echo $row['Title']."<br>";
            // echo $row['Description']."<br>";
            // echo $row['Price']."<br>";
            // echo $row['PriceType']."<br>";
            // echo $row['Street']."<br>";
            // echo $row['CityName']."<br>";
            // echo $row['NoOfMembers']."<br>";
            // echo $row['NoOfRooms']."<br>";
        }
    }

    ?>
</div>


<?php

echo "
            <div id='FilterSidebar' class=' display-none padding-top-5 shadow border-rounded-more full-height position-fixed sidebar large right bg-white'>
                <div class='row padding-top-5 margin-top-5 '>
                    <span class='header-2 col-5 '>Filters</span>
                    <div class='col-4'></div>
                    <button id='filter-close-button' onclick=openFilter()  class='right fill-container padding-top-4 bg-transparent position-absolute'>
                        <i data-feather='x-circle' class='col-3 red-hover '></i>
                    </button> 
                </div>
                
                <form id='Filter-Form' action='$base/searchProperty/FilterProperty' method='POST'>
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
                            <input type='range' id='price-range' min='0' max='70000' step='1000' value='2000'>
                            <div  class='header-nb'>Rs: <span id='price-output' class='header-nb' ></span></div>
                        </div>
                    </div>

                    <div class='row padding-2'>
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
                            <label for='no-of-rooms'>No. of Rooms</label>
                        </div>
                            <div class='col-4 fill-container'>
                                <input type='number' id='no-of-rooms' name='no-of-rooms' min='0' value='1'>
                            </div>
                        </div>

                        <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='no-of-members'>No. of Members</label>
                        </div>
                            <div class='col-4 fill-container'>
                                <input type='number' id='no-of-members' name='no-of-members' min='0' value='1'>
                            </div>
                        </div>

                    <div class='row padding-2'>
                        <div class='col-6 fill-container'>
                            <label for='no-of-wash-rooms'>No of Washrooms</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input type='number' id='no-of-wash-rooms' name='no-of-wash-rooms' min='0' value='1'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='gender'>Gender</label>
                        </div>
                        <div class='col-6 fill-container'>
                            <select id='gender' name='Gender'>
                                <option value=''></option>
                                <option value='m'>Male</option>
                                <option value='f'>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='boarder-type'>Boarder Type</label>
                        </div>
                        <div class='col-5 fill-container'>
                            <select id='boarder-type' name='boarder-type'>
                                <option value=''>Any</option>
                                <option value='single'>Single</option>
                                <option value='family'>Family</option>
                                <option value='couple'>Couple</option>
                        </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='square-feet'>Square Feet</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input type='number' id='square-feet' name='square-feet' min='0'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='parking'>Parking</label>
                        </div>
                        <div class='col-2 fill-container'>
                            <input type='checkbox' id='parking' name='Parking'>
                        </div>
                    </div>
                    <input type='hidden' id='searchText' value='$searchText' name='searchText'>
                    <div class='row padding-5 margin-bottom-5'>
                        <div class='col-5 fill-container'>
                            <button onclick=resetFilter() id='reset' class='header-nb fill-container border-1 bg-blue-hover white-hover border-rounded-more'>Reset</button>
                        </div>
                        <div class='col-5 fill-container'>
                            <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Apply</button>
                        </div>
                    </div>  
                </form>
                
            </div> ";

new HTMLFooter();
?>

<script>
    var displayed = false;

    function openFilter() {
        var sidebar = document.getElementById('FilterSidebar');
        if (displayed) {
            sidebar.style.display = 'block';
            displayed = false;
        } else {
            sidebar.style.display = 'none';
            displayed = true;
        }
    }

    function resetFilter() {

        document.getElementById('price-range').value = 0;
        document.getElementById('price-output').innerHTML = 0;
        document.getElementById('price-type').value = 'monthly';
        document.getElementById('street').value = '';
        document.getElementById('city').value = '';
        document.getElementById('no-of-rooms').value = 0;
        document.getElementById('no-of-members').value = 0;
        document.getElementById('no-of-wash-rooms').value = 0;
        document.getElementById('gender').value = '';
        document.getElementById('boarder-type').value = '';
        document.getElementById('square-feet').value = 0;
        document.getElementById('parking').checked = '';

    }

    var priceRange = document.getElementById("price-range");
    var priceOutput = document.getElementById("price-output");
    priceOutput.innerHTML = priceRange.value;
    
    priceRange.addEventListener("input", () => {
        priceOutput.innerHTML = priceRange.value;
    });
</script>