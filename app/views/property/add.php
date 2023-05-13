<?php
$header = new HTMLHeader("Add | Property");
$nav = new Navigation('management');
$sidebar = new SidebarNav("properties");
$base = BASEURL;

$result = restAPI('property/getBoardingOwner/' . $data['id']);

$ownerDP = $result[0]->ProfilePicture;
$OwnerName = $result[0]->Name;

?>

<main class=" full-width ">
    <form action="<?= $base ?>/property/addProperty" method="POST">
        <div class="row sidebar-offset navbar-offset less-gap  ">
            <div class="col-12 col-medium-12 fill-container width-90">

                <div class="row fill-container">
                    <div class="col-8 fill-container left" onclick=" location.href='<?= $base ?>/property'">
                        <h1 class="header-1 black-hover cursor-pointer">
                            <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                            <span class="vertical-align-middle">Add Boarding</span>
                        </h1>
                    </div>
                    <div class="col-4 fill-container right">
                        <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i> <span>Save</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 fill-container width-90">
                <div class="row  fill-container top">



                    <!-- main form -->
                    <div class='col-12 col-large-7 fill-container '>
                        <div class="row">

                            <input type="hidden" name='owner' value='<?= $data['id'] ?>' />

                            <h2 class="header-2 col-12 left fill-container">Location Details</h2>
                            <div class="col-6 fill-container">
                                <label class="bold black" for="City">Province</label><br>
                                <select id="province" name="province" onchange="selectDistrict()" required>
                                    <option value="" disabled selected>Select Province</option>
                                    <?php
                                    $provinces = restAPI("property/provinceRest/");
                                    foreach ($provinces as $key => $val) {
                                        echo "<option value='$val'>$val</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-6 fill-container">
                                <label class="bold black" for="district">District</label><br>
                                <select id="district" name="district" onchange="selectCity()" required>
                                    <option value="" disabled selected>Select District</option>
                                </select>
                            </div>

                            <div class="col-3 fill-container">
                                <label class="bold black" for="houseNo">House No</label><br>
                                <input placeholder="House No." type="text" id="houseNo" name="houseNo"
                                    onkeyup="preview(this,'houseno-prev')" required>
                            </div>
                            <div class="col-5 fill-container">
                                <label class="bold black" for="street">Street</label><br>
                                <input placeholder="Enter Street Name" type="text" id="street" name="street"
                                    onkeyup="preview(this,'street-prev')" required>
                            </div>
                            <div class="col-4 fill-container">
                                <label class="bold black" for="city">City</label><br>
                                <select onchange="preview(this,'city-prev')" id="city" name="city" required>
                                    <option value="" disabled selected>Select City</option>
                                </select>
                            </div>

                            <span class="header-2 col-12 left fill-container">Listing Details</span>
                            <div class="col-12   fill-container">
                                <label for="title" class="bold black">Listing Title</label><br>
                                <input type="text" onkeyup="preview(this,'title-prev')" class="fill-container"
                                    id="title" name="title" placeholder="Enter Listing Title" required><br>
                            </div>

                            <div class="col-3   fill-container">
                                <label for="price" class="bold black">Price</label><br>
                                <input type="text" onkeyup="preview(this,'price-prev')" class="fill-container"
                                    id="price" name="price" placeholder="Enter Price" required><br>
                            </div>

                            <div class="col-3 fill-container">

                                <label for="priceType" class="bold black">Price Type</label><br>
                                <select name="priceType" onchange="preview(this,'price-type-prev')" id="priceType"
                                    required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="per month">Per Month</option>
                                    <option value="per boarder">Per Boarder</option>
                                </select>
                            </div>

                            <div class="col-6 fill-container">
                                <label class="big" for="utilityupload">Utiliy Bill Receipt</label>
                                <input title='For verification' id="utilityupload" name='utilityupload' credits='false'
                                    accept="image/png, image/jpeg, image/gif" type="file" data-max-file-size="3MB"
                                    required>
                            </div>
                            <div class="col-12 fill-container">
                                <input type="hidden" id="utilityuploadlink" name="utilityuploadlink" required>
                            </div>

                            <div class="col-12 fill-container">
                                <label class="big" for="listingImages">Images</label>
                                <input id="listingImages" name='listingImages' credits='false'
                                    accept="image/png, image/jpeg, image/gif" type="file" multiple
                                    data-allow-reorder="true" data-max-file-size="3MB" data-max-files="10">
                            </div>
                            <div class="col-12 fill-container">
                                <input type="hidden" id="imagePaths" name="imagePaths" required>
                            </div>


                            <div class="col-12 col-medium-3 fill-container">

                                <label for="noofmembers" class="bold black">No. of Members</label><br>
                                <input type="number" min="0" onkeyup="preview(this,'members-prev')"
                                    onchange="preview(this,'members-prev')" class="fill-container" id="noofmembers"
                                    name="noofmembers" placeholder="Members" required><br>
                            </div>

                            <div class="col-12 col-medium-3 fill-container">

                                <label for="propertytype" class="bold black">Property Type</label><br>
                                <select name="propertytype" onchange="preview(this,'prop-type-prev')" id="propertytype"
                                    required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="House">House</option>
                                    <option value="Hostel">Hostel</option>
                                </select>
                            </div>

                            <div class="col-12 col-medium-3 fill-container">

                                <label for="noofrooms" class="bold black">No. of Rooms</label><br>
                                <input type="number" min="0" onkeyup="preview(this,'rooms-prev')"
                                    onchange="preview(this,'rooms-prev')" class="fill-container" id="noofrooms"
                                    name="noofrooms" placeholder="Rooms" required><br>
                            </div>

                            <div class="col-12 col-medium-3 fill-container">

                                <label for="noofwashrooms" class="bold black">No. of Washrooms</label><br>
                                <input type="number" min="0" onkeyup="preview(this,'washrooms-prev')"
                                    onchange="preview(this,'washrooms-prev')" class="fill-container" id="noofwashrooms"
                                    name="noofwashrooms" placeholder="Washrooms" required><br>
                            </div>

                            <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                                <div class="bold black padding-bottom-2 ">Gender</div>
                                <input type="radio" name="gender" onclick="preview(this,'gender-prev')" value="A"
                                    id="any" checked>

                                <label for="any" class="">Any</label>
                                <input type="radio" name="gender" onclick="preview(this,'gender-prev')" value="M"
                                    id="male">
                                <label for="male" class="">M</label>

                                <input type="radio" name="gender" onclick="preview(this,'gender-prev')" value="F"
                                    id="female">
                                <label for="female" class="">F</label>
                            </div>

                            <div class="col-12 col-medium-3 fill-container">

                                <label for="boardertype" class="bold black">Boarder Type</label><br>
                                <select name="boardertype" onchange="preview(this,'boardertype-prev')" id="boardertype"
                                    required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="Any">Any</option>
                                    <option value="Student">Student</option>
                                    <option value="Professional">Professional</option>
                                </select>
                            </div>

                            <div class="col-12 col-medium-3 fill-container">

                                <label for="squarefeet" class="bold black">Square Feet</label><br>
                                <input type="number" min="0" onkeyup="preview(this,'squarefeet-prev')"
                                    onchange="preview(this,'squarefeet-prev')" class="fill-container" id="squarefeet"
                                    name="squarefeet" placeholder="Square Ft" required><br>
                            </div>


                            <div class="col-12 col-medium-3 fill-container padding-bottom-4">
                                <div class="bold black padding-bottom-2 ">Parking</div>
                                <input type="radio" name="parking" onclick="preview(this,'parking-prev')" value="y"
                                    id="available" checked>
                                <label for="available" class="">Available</label>

                                <input type="radio" name="parking" onclick="preview(this,'parking-prev')" value="n"
                                    id="not-available" checked>
                                <label for="not-available" class="">N/A</label>
                            </div>

                            <div class="col-12 col-medium-4  fill-container">
                                <label for="sml1" class="bold black">Summary Line 1</label><br>
                                <input type="text" onkeyup="preview(this,'sml1-prev')" class="fill-container" id="sml1"
                                    name="sml1" placeholder="Enter Summary Line 1" required><br>
                            </div>

                            <div class="col-12 col-medium-4  fill-container">
                                <label for="sml1" class="bold black">Summary Line 2</label><br>
                                <input type="text" onkeyup="preview(this,'sml2-prev')" class="fill-container" id="sml2"
                                    name="sml2" placeholder="Enter Summary Line 2" required><br>
                            </div>

                            <div class="col-12 col-medium-4  fill-container">
                                <label for="sml1" class="bold black">Summary Line 3</label><br>
                                <input type="text" onkeyup="preview(this,'sml3-prev')" class="fill-container" id="sml3"
                                    name="sml3" placeholder="Enter Summary Line 3" required><br>
                            </div>


                            <div class="col-12  fill-container">
                                <label for="sml1" class="bold black">Description</label><br>
                                <textarea class="fill-container" onkeyup="preview(this,'description-prev')"
                                    id="description" name="description" placeholder="Enter Description"
                                    required></textarea><br>
                            </div>

                        </div>
                    </div>

                    <!-- preview -->
                    <div class='col-12 col-large-5 fill-container     '>
                        <h2 class='header-2'>Preview</h2>
                        <div class="col-12 padding-4  shadow fill-vertical border-rounded-more ">

                            <div class="row less-gap ">
                                <div class="col-6  dropdown fill-container">
                                    <button
                                        class=' button bold fill-container left bg-white black-hover border-rounded-more  '>
                                        <i data-feather='share-2' class='vertical-align-middle'></i>
                                    </button>

                                    <div class='dropdown-content'>
                                        <a>
                                            <button class='fill-container border-rounded bg-white-hover left'><i
                                                    class='vertical-align-middle padding-horizontal-2'
                                                    data-feather='facebook'></i><span
                                                    class=' vertical-align-middle'>Facebook</span></button>
                                        </a>
                                        <a>
                                            <button class='fill-container border-rounded bg-white-hover left'><i
                                                    class='vertical-align-middle padding-horizontal-2'
                                                    data-feather='message-circle'></i><span
                                                    class=' vertical-align-middle'>WhatsApp</span></button>
                                        </a>
                                        <a>
                                            <button class='fill-container border-rounded bg-white-hover left'><i
                                                    class='vertical-align-middle padding-horizontal-2'
                                                    data-feather='send'></i><span
                                                    class=' vertical-align-middle'>Telegram</span></button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 header-2 right fill-container">
                                    <i data-feather="star" class=" vertical-align-middle"></i>
                                    <span class="vertical-align-middle">N/A</span>
                                </div>
                                <div class="col-12 fill-container left">
                                    <span id='title-prev' class='header-1 margin-0'>
                                        Listing Title
                                    </span>
                                </div>
                                <div class="col-12 fill-container left">
                                    <span class=' margin-0'>
                                        <span id='houseno-prev'>House No.</span>, <span id='street-prev'>Street</span>,
                                        <span id='city-prev'>City</span>
                                    </span>
                                </div>
                                <div class='col-12 fill-container left margin-vertical-3'>
                                    <div class='display-inline-block header-2 vertical-align-middle'>
                                        Rs. <span id='price-prev'>0</span>.00
                                    </div>
                                    <div class='display-inline-block  vertical-align-middle'>
                                        (<span id='price-type-prev'>per month</span>)
                                    </div>
                                </div>
                                <div class="col-6 fill-container margin-vertical-4 ">
                                    <?php

                                    if (isset($ownerDP) && $ownerDP != "") {
                                        echo "
                            <img src='$base/$ownerDP' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
                                    } else {
                                        echo "
                            <img src='https://ui-avatars.com/api/?background=288684&color=fff&name=$OwnerName' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
                                    }
                                    ?>
                                    <span class='big vertical-align-middle padding-2'>
                                        <?= $OwnerName ?>
                                    </span>
                                </div>
                                <div class="col-6 header-2 right fill-container margin-top-4">
                                    <button class='bg-white-hover border-1 border-rounded-more'>
                                        <i data-feather="phone-call" class=" vertical-align-middle"></i>
                                        <span class="vertical-align-middle padding-2">Contact</span>
                                    </button>
                                </div>
                            </div>
                            <img id='MainPic' src='<?= $base ?>/images/defboarding.png'
                                class='shadow border-rounded-more fill-container'>
                            <div id='imageset-prev' class=' row less-gap padding-4 shadow margin-vertical-4
                            border-rounded-more '>
                                <div class=' col-3 h-100px'>
                                    <img onclick=changeImg() src='<?= $base ?>/images/defboarding.png'
                                        class='shadow border-rounded-more fill-container cursor-pointer'>
                                </div>
                            </div>

                            <div class='row less-gap margin-vertical-4 shadow padding-vertical-4 border-rounded-more '>
                                <div title='No. of Members' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='users' class='accent'></i></span>
                                    <span class=' display-block center'>
                                        <span id='members-prev'>0</span> Members
                                    </span>
                                </div>
                                <div title='PropertyType' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='shopping-bag' class='accent'></i></span>
                                    <span id='prop-type-prev' class=' display-block center'>
                                        House
                                    </span>
                                </div>
                                <div title='No. of Rooms' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='archive' class='accent'></i></span>
                                    <span id='rooms-prev' class=' display-block center'>
                                        0 Rooms
                                    </span>
                                </div>
                                <div title='No. of Washrooms' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='grid' class='accent'></i></span>
                                    <span id='washrooms-prev' class=' display-block center'>
                                        0 Washrooms
                                    </span>
                                </div>
                                <div title='Gender' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='user' class='accent'></i></span>
                                    <span id='gender-prev' class=' display-block center'>
                                        Any
                                    </span>
                                </div>
                                <div title='Type of Tenant' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='briefcase' class='accent'></i></span>
                                    <span id='boardertype-prev' class=' display-block center'>
                                        Any Boarder
                                    </span>
                                </div>
                                <div title='Square Feet' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='shuffle' class='accent'></i></span>
                                    <span id='squarefeet-prev' class=' display-block center'>
                                        0 Sq.Ft
                                    </span>
                                </div>
                                <div title='Parking availability' class='col-3 center fill-container small grey'>
                                    <span class='display-block center'>
                                        <i data-feather='navigation' class='accent'></i></span>
                                    <span id='parking-prev' class=' display-block center'>
                                        Parking N/A
                                    </span>
                                </div>
                            </div>

                            <div class='row less-gap padding-4 shadow margin-vertical-4 border-rounded-more  '>
                                <div class="col-12 fill-container">
                                    <span class='header-2'>Vacancies</span>
                                </div>
                                <div class="col-6 fill-container">
                                    <button class='bg-white-hover border-1 border-rounded-more fill-container'>
                                        <i data-feather="phone-call" class=" vertical-align-middle"></i>
                                        <span class="vertical-align-middle padding-2">Book Appointment</span>
                                    </button>
                                </div>
                                <div class="col-6 right fill-container">
                                    <button class=' white border-1 border-rounded-more fill-container bg-black-hover'>
                                        <i data-feather="shield" class=" vertical-align-middle"></i>
                                        <span class="vertical-align-middle padding-2">Request Boarding</span>
                                    </button>
                                </div>
                            </div>

                            <div class="row margin-vertical-3">
                                <div
                                    class="col-12 col-small-6 fill-container shadow border-rounded-more fill-vertical ">
                                    <div class="fill-container grey padding-4   ">
                                        <span class="black header-2">Summary</span>
                                        <ul class=' margin-horizontal-3 padding-3'>
                                            <li id="sml1-prev">
                                                Summary Line 1
                                            </li>
                                            <li id="sml2-prev">
                                                Summary Line 2
                                            </li>
                                            <li id="sml3-prev">
                                                Summary Line 3
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-small-6 fill-container shadow border-rounded-more fill-vertical">
                                    <div class="fill-container grey padding-4    ">
                                        <span class="black header-2">Currently Boarded</span>
                                        <ul class=' margin-horizontal-3'>
                                            <li>
                                                No Boarders
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 fill-container">
                                    <span class='header-2'>Description</span>
                                    <p id='description-prev'>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa consequuntur
                                        beatae,
                                        qui minus consequatur quaerat tempora, itaque iure ipsum voluptatem accusamus
                                        quidem
                                        natus laboriosam eos deleniti nihil quisquam laudantium rem!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

</main>



<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    function changeImg(img) {
        document.getElementById('MainPic').src = '<?= BASEURL ?>/' + img;
    }

    function preview(e, id) {
        let elem = document.getElementById(id); 
        if (id === 'description-prev') {
            elem.innerHTML = e.value.replace(/\n/g, '<br/>');
        }
        else {
            elem.innerHTML = e.value;
        }
    }

    let imageArray = [];
    let originalImageArray = [];

    function imagePrev() {
        // map the imageArray to imageset-prev
        let imageSet = document.getElementById('imageset-prev');
        imageSet.innerHTML = "";
        changeImg(imageArray[0]);
        imageArray.forEach(element => {
            // console.log(element);
            let div = document.createElement('div');
            div.classList.add('col-3', 'h-100px');
            let img = document.createElement('img');
            img.src = '<?= BASEURL ?>/' + element;
            img.classList.add('shadow', 'border-rounded-more', 'fill-container', 'cursor-pointer');
            img.onclick = function () {
                changeImg(element);
            }
            div.appendChild(img);
            imageSet.appendChild(div);
        });
    }



    function selectDistrict() {
        let province = document.getElementById("province").value;
        fetch("<?= $base ?>/property/districtRest/" + province)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById("district");
                select.innerHTML = "";
                let option = document.createElement("option");
                option.value = "";
                option.text = "Select District";
                option.disabled = true;
                option.selected = true;

                select.add(option);
                data.forEach(element => {
                    let option = document.createElement("option");
                    option.value = element;
                    option.text = element;
                    select.add(option);
                });
            })
    }
    function selectCity() {
        let district = document.getElementById("district").value;
        fetch("<?= $base ?>/property/cityRest/" + district)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById("city");
                select.innerHTML = "";
                let option = document.createElement("option");
                option.value = "";
                option.text = "Select City";
                option.disabled = true;
                option.selected = true;
                select.add(option);
                data.forEach(element => {
                    let option = document.createElement("option");
                    option.value = element;
                    option.text = element;
                    select.add(option);
                });
            })
    }

    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginFileValidateSize);
    FilePond.create(document.getElementById('listingImages'), {
        server: '<?php echo BASEURL ?>/imageUpload/listingImages',
    });

    document.getElementById('listingImages').addEventListener('FilePond:processfile', function (e) {
        originalImageArray.push(e.detail.file.file.name);
        console.log(originalImageArray);
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        imageArray.push(filepath);
        console.log(imageArray);
        if (filepath != null) {
            document.getElementById('imagePaths').value = imageArray;
            imagePrev();
        }
    });

    // delete file from array when clicking filepond close button
    document.getElementById('listingImages').addEventListener('FilePond:removefile', function (e) {
        //get the file name
        const removedFile = e.detail.file.file.name;
        console.log(removedFile);

        //find the index of the file name in the array
        const index = originalImageArray.indexOf(removedFile);
        console.log(index);
        //remove the file name from the array
        imageArray.splice(index, 1);
        originalImageArray.splice(index, 1);


        console.log(imageArray);
        console.log(originalImageArray);
        document.getElementById('imagePaths').value = imageArray;
        imagePrev();
    });

    FilePond.create(document.getElementById('utilityupload'), {
        server: '<?php echo BASEURL ?>/imageUpload/utilityupload',
        allowImagePreview: false
    });

    // console log file path after submit
    document.getElementById('utilityupload').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('utilityuploadlink').value = filepath;
        }
    });


</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>