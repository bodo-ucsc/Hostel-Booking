<style>
    .filter-container {
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .filter-item {
        margin-bottom: 10px;

    }
</style>

<?php
class FilterProperty
{
    public function __construct()
    {

        echo "  
        <div class='row margin-top-5 '>
        <div id='filter-button' class='display-block margin-top-5 padding-top-5 position-fixed sidebar large right bg-transparent'>
            <button id='filter-button' onclick=openFilter() class='flex bg-white-hover padding-top-5 fill-container'>
                <i data-feather='filter'></i>
                <span class=' margin-left-2 header-nb'>Filters</span>
            </button>
        </div>
        </div>
       ";

        echo " 
            <div id='filter-open' class=' display-none padding-top-5 shadow border-rounded-more full-height position-fixed sidebar large right bg-white'>

                    <div class='row padding-top-5'>
                        <div class='col-10 flex-wrap'>
                            <i class='padding-vertical-2 ' data-feather='filter'></i>
                            <span class='header-2 col-6 padding-top-4'>Filters</span>
                       </div> 
                        <button onclick=openFilter()  class=' right fill-container  padding-top-4 bg-transparent position-absolute'>
                            <i id='icon' data-feather='x-circle' class='col-3 red-hover vertical-align-middle '></i>
                        </button>
                        
                    </div>
                <div class='padding-2'>
                    <div class='col-1'></div>
                    <div class='col-10 fill-container'>
                        <form id='filter-form'>
                            <div class='filter-container'>
                                <div class='row padding-2'>
                                    <div class='col-1'></div>
                                </div>
                            
                            <div class='row filter-item'>
                                <label for='Price'>Price</label>
                                <div class='col-10 fill-container'>
                                    <input type='range' id='price' class='fill-container' name='price' min='0' max='60000' step='10'>
                                    <span id='price-output'></span>
                                </div>
                            </div>
                        
                            <div class='row filter-item'>
                                <label for='price-type'>Price Type</label>
                                <div class='col-7 fill-container'>
                                    <select id='price-type' name='price-type'>
                                        <option value='monthly'>Monthly</option>
                                        <option value='weekly'>Weekly</option>
                                        <option value='daily'>Daily</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='street'>Street</label>
                                <div class='col-10 fill-container'>
                                <input type='text' id='street' name='street'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='city-name'>City Name</label>
                                <div class='col-10 fill-container'>
                                <input type='text' id='city-name' name='city-name'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='no-of-rooms'>No. of Rooms</label>
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
                                <label for='no-of-members'>No of Members</label>
                                <div class='col-4 fill-container'>
                                    <input type='number' id='no-of-members' name='NoOfMembers'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='no-of-wash-rooms'>No of Washrooms</label>
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
                                <label for='gender'>Gender</label>
                                <div class='col-7 fill-container'>
                                    <select id='gender' name='Gender'>
                                        <option value='m'>Male</option>
                                        <option value='f'>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='boarder-type'>Boarder Type</label>
                                <div class='col-7 fill-container'>
                                    <select id='boarder-type' name='boarder-type'>
                                        <option value='family'>Family</option>
                                        <option value='single'>Single</option>
                                        <option value='couple'>Couple</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='square-feet'>Square Feet</label>
                                <div class='col-10 fill-container'>
                                    <input type='number' id='square-feet' name='sqft'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <label for='parking'>Parking</label>
                                <div class='col-2 fill-container'>
                                <input type='checkbox' id='parking' name='Parking'>
                                </div>
                            </div>

                            <div class='row filter-item'>
                                <div class='col-5 fill-container'>
                                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }
}
?>


?>
<script>
    var displayed = false;

    function openFilter() {
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
    const priceRange = document.getElementById('price');
    const priceOutput = document.getElementById('price-output');
    priceRange.addEventListener('input', function() {
       
        const priceValue = priceRange.value;
        priceOutput.innerHTML = '$' + priceValue;
    });
</script>