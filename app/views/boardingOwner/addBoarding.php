<?php
$header = new HTMLHeader("Add Property");
$nav = new Navigation("home");
$sidebar = new SidebarNav($active="user");
?>

<main class=" navbar-offset sidebar-offset">
    <form class=" padding-5 margin-left-2 " action="" method="post">
        <div class="row">
            <div class="col-8 header-2 fill-container vertical-align-middle left-flex">&nbsp;Add Property<i data-feather="arrow-left"></i></div>
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
                        <label for="location">Property Listing Title</label><br>
                        <input class=" margin-top-1" type="text" id="location" name="location">
                    </div>
                    <div class="col-2 fill-container">
                        <label for="price">Price</label><br>
                        <input class=" margin-top-1" type="text" id="price" name="price">
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 fill-container">
                        <label for="address">Address</label><br>
                        <input class=" margin-top-1" type="text" id="address" name="address">
                    </div>
                    <div class="col-4 fill-container">
                        <label for="propertytype">Property Listing Title</label><br>
                        <input class=" margin-top-1" type="text" id="propertytype" name="propertytype">
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
                <input class=" margin-top-1" type="text" name="noofmembers" id="noofmembers" placeholder="No of Members">
            </div>
            <div class="col-2 flex-column">                
                <i class=" icon-green" data-feather="archive"></i><br>
                <input class=" margin-top-1" type="text" name="noofrooms" id="noofrooms" placeholder="No of Rooms">
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="grid"></i><br>
                <input class=" margin-top-1" type="text" name="noofwashrooms" id="noofwashrooms" placeholder="No of Washrooms">
            </div>
            <div class="col-1 flex-column">
                <i class=" icon-green" data-feather="user"></i><br>
                <input class=" margin-top-1" type="text" name="gender" id="gender" placeholder="Sex">
            </div>
            <div class="col-2 flex-column">
                <i class=" icon-green" data-feather="smile"></i><br>
                <select class=" margin-top-1" id="bordertype" name="bordertype">
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
                <input class=" margin-top-1" type="text" id="summary2" name="summary2">
            </div>
            <div class="col-4 fill-container">
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

<script>
    var placeholderText = 'ft';
    var suptext = document.getElementById(sqfeet);
    suptext.setAttribute("placeholder", placeholderText);
//    $("#sqfeet").attr('placeholder', placeholderText);
</script> 

<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>