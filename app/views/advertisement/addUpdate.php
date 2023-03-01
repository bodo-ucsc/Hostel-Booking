<?php
$header = new HTMLHeader("Advertisements | Add");
$nav = new Navigation("management");
$sidebar = new SidebarNav("Advertisement");
$base = BASEURL;
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <div class="row ">
                <div class="col-12 col-medium-8 fill-container left"
                    onclick=" location.href='<?= $base ?>/advertisement'">
                    <h1 class="header-1 black-hover cursor-pointer">

                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <span class="vertical-align-middle">Add Advertisements</span>
                    </h1>
                </div>

                <div class="col-12 col-medium-4 fill-container right ">
                    <button onclick="postAd()" class="bg-blue white border-rounded header-nb padding-3 right"
                        value="Save Changes">
                        <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i>
                        <span>Save Changes</span></button>
                </div>
            </div>

            <div class="row margin-top-5 fill-container">
                <div class="col-12 col-large-6 fill-container ">

                    <div class="row">
                        <div class="col-12 fill-container">
                            <label for="userType" class="bold black">User Type</label><br>
                            <select name="userType" id="userType" onchange="selectName()" required>
                                <option value="0">Select User Type</option>
                                <?php
                                $result = restAPI("userManagement/boardingUserRest");
                                $userTypeArray = array();
                                foreach ($result as $key => $value) {
                                    array_push($userTypeArray, $value->UserType);
                                }
                                $userTypeArray = array_unique($userTypeArray);

                                foreach ($userTypeArray as $key => $value) {
                                    echo "<option value='$value'>$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 fill-container">
                            <label for="userId" class="bold black">Name</label><br>
                            <select name="userId" id="userId" onchange="selectPlace()" required>
                                <option value="0" selected>Select Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 fill-container">
                            <label for="place" class="bold black">Name</label><br>
                            <select name="place" id="place" onchange="previewPost()" required>
                                <option value="0" selected>Select Property</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 fill-container">
                            <label for="caption" class="bold black">Caption</label><br>
                            <input type="text" class="fill-container" id="caption" name="caption"
                                onkeyup="previewCaption()" placeholder="Enter Caption" required><br>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-large-6 ">
                    <span class="header-2">Preview</span>
                    <div class=" width-90">

                        <?php
                        new ViewCard('preview');
                        ?>
                    </div>
                </div>







            </div>

        </div>
    </div>
</main>

<script>
    function selectName() {
        let userType = document.getElementById("userType").value;
        let url = "<?php echo BASEURL ?>/userManagement/boardingUserRest/" + userType;
        if (userType === "BoardingOwner") {
            document.getElementById('user-type-preview').innerHTML = "Owner";
        } else {
            document.getElementById('user-type-preview').innerHTML = userType;
        }
        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                let select = document.getElementById("userId");
                select.innerHTML = "<option value='0' selected>Select Name</option>";
                let nameArray = new Set();
                for (let i = 0; i < json.length; i++) {
                    nameArray.add([json[i].FirstName + " " + json[i].LastName, json[i].Id].toString());
                }
                nameArray.forEach((value) => {
                    let name = value.split(",");
                    select.innerHTML += "<option value='" + name[1] + "'>" + name[0] + "</option>";
                });
            });

    }

    //function to 

    function selectPlace() {
        let userType = document.getElementById("userType").value;
        let user = document.getElementById("userId");
        let userId = user.value;
        document.getElementById('name-preview').innerHTML = user.options[user.selectedIndex].text;

        let url = "<?php echo BASEURL ?>/userManagement/boardingUserRest/" + userType + "/" + userId;
        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                if (json[0].ProfilePicture === null || json[0].ProfilePicture === '') {
                    document.getElementById('dp-preview').src = "https://ui-avatars.com/api/?background=288684&color=fff&name=" + json[0].FirstName + "+" + json[0].LastName;
                } else {
                    document.getElementById('dp-preview').src = "<?= $base; ?>/" + json[0].ProfilePicture;
                }


                let select = document.getElementById("place");
                select.innerHTML = "<option value='0' selected>Select Property</option>";
                for (let i = 0; i < json.length; i++) {
                    select.innerHTML += "<option value='" + json[i].Place + "'>" + json[i].Title + "</option>";

                }

            });
    }

    function previewCaption() {
        let caption = document.getElementById("caption").value;
        document.getElementById('caption-preview').innerHTML = caption;
    }

    function previewPost() {
        let place = document.getElementById("place").value;
        let url = "<?php echo BASEURL ?>/listing/placeRest/" + place;
        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                console.log(json);
                document.getElementById('city-preview').innerHTML = json.CityName;
                document.getElementById('address-preview').innerHTML = json.Street + ", " + json.CityName;
                document.getElementById('price-preview').innerHTML = "Rs. " + json.Price;
                document.getElementById('vacancy-preview').innerHTML = json.NoOfMembers - json.Boarded;
                document.getElementById('priceType-preview').innerHTML = json.PriceType;
                document.getElementById('summary1-preview').innerHTML = json.SummaryLine1;
                document.getElementById('summary2-preview').innerHTML = json.SummaryLine2;
                document.getElementById('summary3-preview').innerHTML = json.SummaryLine3;
                document.getElementById('members-preview').innerHTML = json.NoOfMembers;
                document.getElementById('rooms-preview').innerHTML = json.NoOfRooms;
                document.getElementById('washrooms-preview').innerHTML = json.NoOfWashRooms;
                document.getElementById('squarefeet-preview').innerHTML = json.SquareFeet;
                document.getElementById('parking-preview').innerHTML = json.Parking;
                document.getElementById('boardertype-preview').innerHTML = json.BoarderType;
                if (json.gender === "M") {
                    document.getElementById('gender-preview').innerHTML = 'Male';
                } else {
                    document.getElementById('gender-preview').innerHTML = 'Female';
                }
            });
        let url2 = "<?php echo $base; ?>/listing/imageRest/" + place;
        fetch(url2)
            .then((response) => response.json())
            .then((json) => {
                console.log(json);
                //check if json array is empty
                if (json.length != 0) {
                    document.getElementById('image-preview').src = "<?php echo $base; ?>/" + json[0].Image;
                }
            });

    }


    function postAd() {
        let user = document.getElementById("userId").value;
        if (user === "0") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please select a user'
            })
            return;
        }
        let place = document.getElementById("place").value;
        if (place === "0") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please select a property'
            })
            return;
        }
        let caption = document.getElementById("caption").value;
        if (caption === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please enter a caption'
            })
            return;
        }

        const data = {
            "userId": user,
            "place": place,
            "caption": caption
        };

        console.log(data);


        fetch("<?php echo BASEURL ?>/advertisement/postUpdate", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(response => response.json())
            .then(json => {
                if (json.Status === 'Success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Posted Successfully'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo BASEURL ?>/advertisement";
                        }
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            }).catch(function (error) {                        
                console.log('Request failed', error);
            });
    }; 
</script>
<?php

$footer = new HTMLFooter();

?>