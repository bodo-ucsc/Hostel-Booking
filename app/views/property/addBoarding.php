<?php
$header = new HTMLHeader("Add Property");
$nav = new Navigation("home");
$sidebar = new SidebarNavBO($active="properties");
// $_location = new location;
$_boardingOwner = new boardingOwner;

?>

<main class=" navbar-offset sidebar-offset">
    <?php
    //  $provinces = $_boardingOwner->provinceRest();
    //  $result = json_decode($provinces);
    //  var_dump($result);

    //  foreach ($result as $res) {
    //     // $comment = new comment($value->FirstName, $value->LastName, $value->DateTime, $value->Comment);
    //     // $provinceName = $value;
    //     print_r($res);
    //     echo "<br>";
    //     foreach ($res as $key => $val) {
    //         echo $val;
    //     }
    //     echo "<br>";
    // }
    ?>
    <form class=" padding-5 margin-left-2 " action="<?php echo BASEURL ?>/boardingOwner/addBoardingPlace" method="post">
    
        <div class="row">
            <div class="col-8 header-2 fill-container vertical-align-middle left-flex">&nbsp;Add Property<i onclick="history.back()" data-feather="arrow-left"></i></div>
            <div class="col-4 flex fill-container right-flex">
                <button class=" bg-blue-hover white-hover padding-2 border-rounded flex justify-content center margin-right-4" type="submit" action="addBoardingPlace"><i data-feather="save"></i>&nbsp;&nbsp;Save Changes</button>                
            </div>
        </div><br>
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-7 fill-container">
                        <label for="propertytitle">Property Listing Title</label><br>
                        <input class=" margin-top-1" type="text" id="propertytitle" name="propertytitle">
                    </div>
                    <div class="col-3 fill-container">
                        <label for="propertytype">Property Type</label><br>
                        <input class=" margin-top-1" type="text" id="propertytype" name="propertytype">
                    </div>
                    <div class="col-2 fill-container">
                        <label for="price">Price</label><br>
                        <input class=" margin-top-1" type="number" id="price" name="price">
                    </div>
                </div>
                <div class="header-nb">Address</div>
                <div class="row">
                    <div class="col-4 fill-container">
                        <label for="houseNo">House No</label><br>
                        <input class=" margin-top-1" type="text" id="houseNo" name="houseNo">
                    </div>
                    <div class="col-8 fill-container">
                        <label for="Street">Street</label><br>
                        <input class=" margin-top-1" type="text" id="street" name="street">
                    </div>
                    <!-- <div class="col-5 fill-container">
                        <label for="City">City</label><br>
                        <select class=" margin-top-1" id="city" name="city">
                        <option value="" disabled selected>-Select City-</option>
                        <?php
                        // $cities = $_boardingOwner->getAllCities();
                        // print_r($cities);
                        //     while($city = $cities->fetch_assoc()){
                        //         $cityname = $city['CityName'];
                        //         echo "
                        //         <option value=$cityname>$cityname</option>
                        //         ";
                        // }
                        ?>   
                        </select>
                    </div> -->
                    
                </div>
                <div class="row">
                    <div class="col-4 fill-container">
                        <label for="City">Province</label><br>
                            <select class=" margin-top-1" id="province" name="province">
                                <option value="" disabled selected>-Select Province-</option>
                                <?php

                                // // $url = "$base/location/provinceRest";
                                // // $client = curl_init($url);
                                // // curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                                // // $response = curl_exec($client);
                                // // $result = json_decode($response);
                                
                                // $provinces = $_boardingOwner->provinceRest();
                                // $result = json_decode($provinces);
                                // var_dump($result);

                                // foreach ($result as $res) {
                                //     foreach ($res as $key => $val) {
                                //         echo"
                                //         <option value=$val>$val</option>
                                //         ";
                                //     }
                                // }
                    
                                ?>
                            </select>


                    </div>
                    <div class="col-4 fill-container">
                        <label for="City">Distric</label><br>
                            <select class=" margin-top-1" id="distric" name="distric">
                                <option value="" disabled selected>-Select Distric-</option>
                                <?php
                                ?>
                            </select>
                    </div>
                    <div class="col-4 fill-container">
                    <label for="City">City</label><br>
                        <select class=" margin-top-1" id="city" name="city">
                            <option value="" disabled selected>-Select City-</option>
                            <?php
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class=" flex-column margin-left-5 border-dashed-1 border-black col-3 padding-vertical-2 padding-horizontal-4 border-black border-rounded">
                <i data-feather="upload-cloud"></i><br>
                <p class=" center">Drag and Drop <br> or</p>
                <button class=" bg-blue-hover white-hover border-rounded padding-2 margin-top-2">Select Files</button>
            </div>
         </div>
         <div class="row margin-top-3">
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="users"></i>
                <input class=" margin-top-1" type="number" name="noofmembers" id="noofmembers" placeholder="No of Members">
            </div>
            <div class="col-2 flex-column">                
                <i class=" icon-green" data-feather="archive"></i><br>
                <input class=" margin-top-1" type="number" name="noofrooms" id="noofrooms" placeholder="No of Rooms">
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="grid"></i><br>
                <input class=" margin-top-1" type="number" name="noofwashrooms" id="noofwashrooms" placeholder="No of Washrooms">
            </div>
            <div class="col-1 flex-column">
                <i class=" icon-green" data-feather="user"></i><br>
                <select class=" margin-top-1" name="gender" id="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="smile"></i><br>
                <select class=" margin-top-1" id="boardertype" name="boardertype">
                    <option value="" disabled selected>Border Type</option>
                    <option value="Student">Student</option>
                    <option value="Professional">Professional</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="col-1 flex-column">
                <i class=" icon-green" data-feather="shuffle"></i><br>
                <input class=" margin-top-1" type="text" name="sqfeet" id="sqfeet" placeholder="Sq. ft.">
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="map-pin"></i>
                <label>Parking Avalible?</label><br>
                <div class=" margin-top-1 padding-bottom-3">
                    <input  type="radio" name="parking" value="y">
                    <lable for="y">Yes</lable>  
                    <input  type="radio" name="parking" value="n">
                    <lable for="n">No</lable>                      
                </div>     
            </div>
         </div>
         <div class="row">
            <div class="col-4 fill-container">
                <label>Summary</label><br>
                <input class=" margin-top-1" type="text" id="summary1" name="summary1">
            </div>
            <div class="col-4 fill-container">
            <label>&nbsp;</label><br>
                <input class=" margin-top-1" type="text" id="summary2" name="summary2">
            </div>
            <div class="col-4 fill-container">
            <label>&nbsp;</label><br>
                <input class=" margin-top-1" type="text" id="summary3" name="summary3">
            </div>
         </div>
         <div class="row">
            <div class="col-12 fill-container">
                <label for="descripton">Description</label><br>
                <textarea class=" margin-top-1 fill-container" rows="4" id="description" name="description"></textarea>
            </div>
         </div>
    </form>


</main>


<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>