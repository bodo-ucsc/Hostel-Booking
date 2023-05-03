<?php
$base = BASEURL;
echo "
            <div class=' margin-top-5 margin-bottom-5'>
                <div id='filter-bar'>
                    <div id='filter-label'>Applied Filters:</div>
                    <div id='filter-tags'></div>
                    <button id='filter-clear-btn'>Clear All</button>
                </div>
            </div> ";
echo "<form id='Filter-Form' action='$base/searchProperty/hello' method='POST'>
                    <input type='hidden' id='filters' name='filters' value='yes'>
                    <div class='row padding-2  margin-top-3'>
                        <div class='col-3 fill-container'>
                            <label for='sortSearch'>Sort By</label>
                        </div>
                        <div class='col-8 fill-container'>
                            <select id='sortSearch' name='sortSearch'>
                                <option value='bestmatch'>Best Match</option>
                                <option value='lowTohigh'>Price low to high</option>
                                <option value='highTolow'>Price high to low</option>
                            </select>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 fill-container'>
                            <label for='price'>Price</label>
                        </div>
                        <div class='col-7 fill-container'>
                            <input type='range' id='priceRange' min='0' max='70000' value='0' step='1000' name='priceRange'>
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

                    <div class='row padding-2 margin-left-5 col-11 position-fixed'>
                    
                        <div class='col-4 fill-container'>
                            <input type='reset'  id='reset' class=' padding-3 header-nb fill-container border-1 bg-blue-hover white-hover border-rounded-more'></button>
                        </div>
                       
                        <div class='col-4 fill-container'>
                            <button class=' header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Apply</button>
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
                            <input type='checkbox'  id='parkingYes' name='parking' value='y'>
                        </div>
                        <div class='col-4 fill-container'> 
                            <label for='parking'>No</label>
                            <input type='checkbox' id='parkingNo' name='parking' value='n'>
                        </div>
                    </div>
                    <div>
                        <label for='showFields'>Show Fields:</label>
                        <select id='showFields' name='showFields' multiple>
                        <option value='name'>Name</option>
                        <option value='email'>Email</option>
                        <option value='phone'>Phone</option>
                        <option value='message'>Message</option>
                        </select>
                    </div>

                   
                </form>";

echo "
    <div id='filterTags'></div>
 ";

?>
<script>
    const form = document.querySelector('#Filter-Form');
    const filterTagsContainer = document.querySelector('#filterTags');


    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(form);

        // Get the names of the form elements that have a value
        const selectedFields = Array.from(formData.entries())
            .filter(([name, value]) => value !== '' && value !== null)
            .map(([name, value]) => ({
                name,
                value
            }));

        // Create filter tags for each selected field
        for (const [name, value] of selectedFields) {
            const tag = document.createElement('span');
            tag.textContent = `${name}: ${value}`;
            tag.classList.add('filterTag');
            filterTagsContainer.appendChild(tag);
        }




        // Log the selected field names
        console.log(selectedFields);
    });
</script>