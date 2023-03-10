<style>

.filter-container {
  padding: 20px;
  border-radius: 5px;
  margin-bottom: 20px;
  overflow-y: auto;
  
}

.filter-item {
  margin-bottom: 10px;

}
</style>

<?php
class Filter
{

    public function __construct()
    {
        echo " 
            <div class='display-none display-medium-block navbar-offset shadow border-rounded-more full-height position-fixed sidebar right bg-white'>
                <div class='row '>
                    <span class='header-2 col-5'>Filters</span>
                    <div class='col-4'></div>
                    <i id='icon' data-feather='x-circle' class='col-3 red-hover '></i>
                </div>
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
        ";
    }
}


?>
<script>

const icon = document.getElementById("icon");

// add a click event listener to the icon
icon.addEventListener("click", function() {
  // handle the click event
  console.log("Icon clicked!");
});

</script>