<?php
$header = new HTMLHeader("Edit Property");
$nav = new Navigation("home");
$sidebar = new SidebarNavBO($active="properties");

$placeid = $data['placeid'];
$_boardingOwner = new property;

$userid = $_SESSION['UserId'];

$boardingPlace = $_boardingOwner->viewBoardingPlace($placeid);

if (isset($boardingPlace)) {
    $result = $boardingPlace->fetch_assoc();

    $title = $result['Title'];
    $houseNo = $result['HouseNo'];
    $street = $result['Street'];
    $bpcity = $result['CityName'];
    $propertyType = $result['PropertyType'];
    $summaryLine1 = $result['SummaryLine1'];
    $summaryLine2 = $result['SummaryLine2'];
    $summaryLine3 = $result['SummaryLine3'];
    $description = $result['Description'];
    $price = $result['Price'];
    $noofmembers = $result['NoOfMembers'];
    $noofrooms = $result['NoOfRooms'];
    $noofwashrooms = $result['NoOfWashRooms'];
    $gender = $result['Gender'];
    $boardertype = $result['BoarderType'];
    $squarefeet = $result['SquareFeet'];
    $parking = $result['Parking'];

    $ownerid = $result['OwnerId'];

    // if (isset($_SESSION['username'])) {
    //     $fname = $_SESSION['firstname'];
    //     $lname = $_SESSION['lastname'];
    // }   
}

?>

<main class=" navbar-offset sidebar-offset margin-top-5">

    
<!-- action="<?php //echo BASEURL ?>/boardingOwner/editDeleteBoardingPlace" -->
    <div class="row margin-right-5">
        <div class=" margin-left-4 col-4 header-2 fill-container vertical-align-middle left-flex">&nbsp;Edit Property<i data-feather="arrow-left" onclick="history.back()"></i></div>
        <div class="col-8 flex fill-container right-flex">
            <button class=" bg-white-hover red-hover red border-1 border-red padding-2 border-rounded flex justify-content center margin-right-4"  id="deleteButton" name="delete_button" ><i data-feather="trash-2"></i>&nbsp;&nbsp;Delete Listing</button>   
            <button class=" bg-blue-hover white-hover padding-2 border-rounded flex justify-content center margin-right-4" id="editButton"  ><i data-feather="save" name="update_button" ></i>&nbsp;&nbsp;Save Changes</button>                             
        </div>
    </div><br>
    <form id="editdeleteform" class=" padding-3 margin-horizontal-5 " method="post">
    <?php echo "<input type='hidden' id='placeid' name='placeid' value=
     $placeid
    >"?>
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-7 fill-container">
                        <label for="propertytitle">Property Listing Title</label><br>
                        <input class=" margin-top-1" type="text" id="propertytitle" name="propertytitle" value="<?php echo $title; ?>">
                    </div>
                    <div class="col-3 fill-container">
                        <label for="location">Property Type</label><br>
                        <input class=" margin-top-1" type="text" id="propertytype" name="propertytype" value="<?php echo $propertyType; ?>">
                    </div>
                    <div class="col-2 fill-container">
                        <label for="price">Price</label><br>
                        <input class=" margin-top-1" type="number" id="price" name="price" value="<?php echo $price; ?>">
                    </div>
                </div>
                <div class="header-nb">Address</div>
                <div class="row">
                    <div class="col-2 fill-container">
                        <label for="houseNo">House No</label><br>
                        <input class=" margin-top-1" type="text" id="houseNo" name="houseNo" value="<?php echo $houseNo; ?>">
                    </div>
                    <div class="col-5 fill-container">
                        <label for="houseNo">Street</label><br>
                        <input class=" margin-top-1" type="text" id="street" name="street" value="<?php echo $street; ?>">
                    </div>
                    <div class="col-5 fill-container">
                    <label for="City">City</label><br>
                        <select class=" margin-top-1" id="city" name="city">
                        <?php
                        $cities = $_boardingOwner->getAllCities();
                            while($city = $cities->fetch_assoc()){
                                $cityname = $city['CityName'];
                            if ($cityname == $bpcity) {
                                echo "
                                <option value=$cityname selected>$cityname</option>
                                ";
                            } else {
                                echo "
                                <option value=$cityname>$cityname</option>
                                ";
                            }     
                        }
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
                <input class=" margin-top-1" type="number" name="noofmembers" id="noofmembers" value="<?php echo $noofmembers; ?>" >
            </div>
            <div class="col-2 flex-column">                
                <i class=" icon-green" data-feather="archive"></i><br>
                <input class=" margin-top-1" type="number" name="noofrooms" id="noofrooms" value="<?php echo $noofrooms; ?>">
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="grid"></i><br>
                <input class=" margin-top-1" type="number" name="noofwashrooms" id="noofwashrooms" value="<?php echo $noofwashrooms; ?>">
            </div>
            <div class="col-1 flex-column">
                <i class=" icon-green" data-feather="user"></i><br>
                <select class=" margin-top-1" name="gender" id="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="m" <?php if ($gender == 'm'){echo "selected";}?>>Male</option>
                    <option value="f" <?php if ($boardertype == 'f'){echo "selected";}?>>Female</option>
                </select>
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="smile"></i><br>
                <select class=" margin-top-1" id="boardertype" name="boardertype">
                    <option value="Student" <?php if ($boardertype == 'Student'){echo "selected";}?> >Student</option>
                    <option value="Professional" <?php if ($boardertype == 'Professional'){echo "selected";}?>>Professional</option>
                    <option value="Other" <?php if ($boardertype == 'Other'){echo "selected";}?>>Other</option>
                </select>
            </div>
            <div class="col-1 flex-column">
                <i class=" icon-green" data-feather="shuffle"></i><br>
                <input class=" margin-top-1" type="text" name="sqfeet" id="sqfeet" placeholder="Sq. ft." value="<?php echo $squarefeet; ?>">
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="map-pin"></i>
                <label>Parking Avalible?</label><br>
                <div class=" margin-top-1 padding-bottom-3">
                    <input  type="radio" name="parking" value="y" <?php if ($parking == 'y'){echo "checked = 'checked'";}?>>
                    <lable for="y">Yes</lable>  
                    <input  type="radio" name="parking" value="n" <?php if ($parking == 'n'){echo "checked = 'checked'";}?>>
                    <lable for="n">No</lable>                      
                </div>     
            </div>
         </div>
         <div class="row">
            <div class="col-4 fill-container">
                <label>Summary</label><br>
                <input class=" margin-top-1" type="text" id="summary1" name="summary1" value="<?php echo $summaryLine1; ?>">
            </div>
            <div class="col-4 fill-container">
                <input class=" margin-top-1" type="text" id="summary2" name="summary2" value="<?php echo $summaryLine2; ?>">
            </div>
            <div class="col-4 fill-container">
                <input class=" margin-top-1" type="text" id="summary3" name="summary3" value="<?php echo $summaryLine3; ?>">
            </div>
         </div>
         <div class="row">
            <div class="col-12 fill-container">
                <label for="descripton">Description</label><br>
                <textarea class="  margin-top-1 fill-container" rows="4" id="description" name="description" <?php echo $description; ?>> <?php echo $description; ?></textarea>
            </div>
         </div>
    </form>

</main>


<?php
if (isset($data['alert'])) { 
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>

<script type="text/javascript">

    function submitForm(action) {
        var form = document.getElementById('editdeleteform');
        form.action = action;
        form.submit();
        console.log(action);
    }

    document.getElementById('editButton').addEventListener("click",function(){
        submitForm('<?php echo BASEURL ?>/property/editBoardingPlace');
        console.log("excutededit");
    });

    document.getElementById('deleteButton').addEventListener("click",function(){
        submitForm('<?php echo BASEURL ?>/property/deleteBoardingPlace');
        console.log("excuteddelete");
    });  

</script>



