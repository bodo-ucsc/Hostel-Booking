<?php

new HTMLHeader("Search | Place");
new Navigation();
$base = BASEURL;
?>

<div class='navbar-offset full-width'>
    <div class='row full-width margin-bottom-4'>
        <div class='col-12'>
            <?php
            //$search = new Filter(); 
            ?>
        </div>
    </div>
    <?php
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

        $dataArray = array();
        echo "<div class='center'>";
        while ($row = $data['result']->fetch_assoc()) {

            $PlaceId = $row['PlaceId'];
            //echo $PlaceId;
            //$place =new PropertyCard($PlaceId);

            // echo "place id= ".$row['PlaceId']."<br>";
            // echo $row['Title']."<br>";
            // echo $row['Description']."<br>";
            // echo $row['Price']."<br>";
            // echo $row['PriceType']."<br>";
            // echo $row['Street']."<br>";
            // echo $row['CityName']."<br>";
            // echo $row['NoOfMembers']."<br>";
            // echo $row['NoOfRooms']."<br>";
            // echo $row['NoOfWashRooms']."<br>";
            // echo $row['BoarderType']."<br>";
            // echo $row['SquareFeet']."<br>";
            // echo $row['Parking']."<br>";

            $dataArray[$PlaceId] = array(
                'PlaceId' => $row['PlaceId'],
                'Title' => $row['Title'],
                'Description' => $row['Description'],
                'Price' => $row['Price'],
                'PriceType' => $row['PriceType'],
                'Street' => $row['Street'],
                'CityName' => $row['CityName'],
                'NoOfMembers' => $row['NoOfMembers'],
                'NoOfRooms' => $row['NoOfRooms'],
                'NoOfWashRooms' => $row['NoOfWashRooms'],
                'BoarderType' => $row['BoarderType'],
                'SquareFeet' => $row['SquareFeet'],
                'Parking' => $row['Parking']
            );
        }
        $jsonData = json_encode($dataArray);
        //print_r($dataArray);
    ?>




        <table id="dataTable">
            <thead>
                <tr>
                    <th>Place ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Price Type</th>
                    <th>Street</th>
                    <th>City Name</th>
                    <th>No of Members</th>
                    <th>No of Rooms</th>
                    <th>No of Washrooms</th>
                    <th>Boarder Type</th>
                    <th>Square Feet</th>
                    <th>Parking</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataArray as $row) : ?>
                    <tr>
                        <td><?= $row['PlaceId'] ?></td>
                        <td><?= $row['Title'] ?></td>
                        <td><?= $row['Description'] ?></td>
                        <td><?= $row['Price'] ?></td>
                        <td><?= $row['PriceType'] ?></td>
                        <td><?= $row['Street'] ?></td>
                        <td><?= $row['CityName'] ?></td>
                        <td><?= $row['NoOfMembers'] ?></td>
                        <td><?= $row['NoOfRooms'] ?></td>
                        <td><?= $row['NoOfWashRooms'] ?></td>
                        <td><?= $row['BoarderType'] ?></td>
                        <td><?= $row['SquareFeet'] ?></td>
                        <td><?= $row['Parking'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php
        echo "
        <div id='FilterSidebar' class=' display-block padding-top-5 shadow border-rounded-more full-height position-fixed sidebar large right bg-white'>
                <div class='row padding-top-5 margin-top-5 '>
                    <span class='header-2 col-5 '>Filters</span>
                    <div class='col-4'></div>
                    <button id='filter-close-button' class='right fill-container padding-top-4 bg-transparent position-absolute'>
                        <i data-feather='x-circle' class='col-3 red-hover '></i>
                    </button> 
                </div>
                
                
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
                            <input type='range'  id='price-range' min='0' max='70000' step='1000' value='2000'>
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
                            <input onkeyup='filterFields()' type='text' id='street' name='street'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-3 fill-container'>
                            <label for='city'>City</label>
                        </div>
                        <div class='col-8 fill-container'>
                            <input onkeyup='filterFields()' type='text' id='city' name='city'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='no-of-rooms'>No. of Rooms</label>
                        </div>
                            <div class='col-4 fill-container'>
                                <input onkeyup='filterFields()' type='number' id='no-of-rooms' name='no-of-rooms' min='0' value='1'>
                            </div>
                        </div>

                        <div class='row padding-2'>
                        <div class='col-5 fill-container'>
                            <label for='no-of-members'>No. of Members</label>
                        </div>
                            <div class='col-4 fill-container'>
                                <input onkeyup='filterFields()' type='number' id='no-of-members' name='no-of-members' min='0' value='1'>
                            </div>
                        </div>

                    <div class='row padding-2'>
                        <div class='col-6 fill-container'>
                            <label for='no-of-wash-rooms'>No of Washrooms</label>
                        </div>
                        <div class='col-4 fill-container'>
                            <input onkeyup='filterFields()' type='number' id='no-of-wash-rooms' name='no-of-wash-rooms' min='0' value='1'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='gender'>Gender</label>
                        </div>
                        <div class='col-6 fill-container'>
                            <select onchange='filterFields()' id='gender' name='Gender'>
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
                            <select onchange='filterFields()' id='boarder-type' name='boarder-type'>
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
                            <input onkeyup='filterFields()' type='number' id='square-feet' name='square-feet' min='0'>
                        </div>
                    </div>

                    <div class='row padding-2'>
                        <div class='col-4 fill-container'>
                            <label for='parking'>Parking</label>
                        </div>
                        <div class='col-2 fill-container'>
                            <input onkeyup='filterFields()' type='checkbox' id='parking' name='Parking'>
                        </div>
                    </div>
                    
                    <div class='row padding-5 margin-bottom-5'>
                        <div class='col-5 fill-container'>
                            <button class='header-nb fill-container border-1 bg-blue-hover white-hover border-rounded-more'>Reset</button>
                        </div>
                        <div class='col-5 fill-container'>
                            <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Apply</button>
                        </div>
                        
                    </div>  
                
            </div> ";
    }

    echo "</div>";
    echo "
</div>";
    new HTMLFooter();
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function filterFields() {

            var filter, table, tr, td, i, txtValue1,txtValue1;
            
            var street = document.getElementById("street").value.toUpperCase();
            var city = document.getElementById("city").value.toUpperCase();
            // var noOfRooms = parseInt(document.getElementById("no-of-rooms").value);
            // var noOfMembers = parseInt(document.getElementById("no-of-members").value);
            // var NoOfWashRooms = parseInt(document.getElementById("no-of-washrooms").value);
            // var gender = document.getElementById("gender").value.toUpperCase();
            // var boarderType = document.getElementById("boarder-type").value.toUpperCase();
            // var sqrtFt = parseInt(document.getElementById("square-feet").value);
            // var parking = document.getElementById("parking").value.toUpperCase();

            table = document.getElementById("dataTable");

            
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[0];
            if (td1) {
                txtValue1 = td1.textContent || td1.innerText;
                if (txtValue1.toUpperCase().indexOf(street) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        }
    </script>

<script>
    $(document).ready(function() {
        
        //console.log('<?php echo $jsonData; ?>');

        // Call the function with the JSON data as a parameter
        sendArrayToController('<?php echo $jsonData; ?>');
    });
   function sendArrayToController(jsonData) {
        // Send the JSON data to the controller using AJAX
        $.ajax({
            type: 'POST',
            url: '/searchProperty/FilterProperty',
            data: { 'jsonData': jsonData },
            dataType: 'json',
            success: function(data) {
                // Handle the response from the controller
            }
        });
    }

    
</script>