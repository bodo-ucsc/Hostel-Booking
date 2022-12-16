<?php
$header = new HTMLHeader("Advertisements | Add");
$nav = new Navigation("management");
$sidebar = new SidebarNav("Advertisement");
$base = BASEURL;
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <form action="<?php echo BASEURL ?>/feed/postUpdate" method="POST">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left"
                        onclick=" location.href='<?= $base ?>/admin/advertisement'">
                        <h1 class="header-1 black-hover cursor-pointer">

                            <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                            <span class="vertical-align-middle">Add Advertisements</span>
                        </h1>
                    </div>

                    <div class="col-12 col-medium-4 fill-container right ">
                        <button type="submit" value="submit"
                            class="bg-blue white border-rounded header-nb padding-3 right" value="Save Changes">
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
                                    $url = "$base/userManagement/userRest";
                                    $client = curl_init($url);
                                    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                                    $response = curl_exec($client);
                                    $result = json_decode($response);
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
                                    placeholder="Enter Caption" required><br>
                            </div>
                        </div>
                    </div>
            </form>

            <div class="col-12 col-large-6 ">
                <span class="header-2">Preview</span>
                <div class="shadow border-rounded padding-4 width-90">
                    <div class="row fill-container">
                        <div class="col-12 col-medium-4 col-large-12 fill-container">
                            <label for="username" class="bold black">Name</label><br>

                        </div>
                        <div class="col-12 col-medium-4 col-large-12 fill-container">
                            <label for="" class="bold black">Date</label><br>

                        </div>
                        <div class="col-12 col-medium-4 col-large-12 fill-container">
                            <label for="" class="bold black">Message</label><br>

                        </div>
                    </div>
                </div>
            </div>







        </div>

    </div>
    </div>
</main>

<script>
    function selectName() {
        var userType = document.getElementById("userType").value;
        var url = "<?php echo BASEURL ?>/userManagement/userRest/" + userType;
        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                var select = document.getElementById("userId");
                select.innerHTML = "<option value='0' selected>Select Name</option>";
                var nameArray = new Set();
                for (var i = 0; i < json.length; i++) {
                    nameArray.add([json[i].FirstName + " " + json[i].LastName, json[i].Id].toString());
                }
                nameArray.forEach((value) => {
                    var name = value.split(",");
                    select.innerHTML += "<option value='" + name[1] + "'>" + name[0] + "</option>";
                });
            });

    }

    function selectPlace() {
        var userType = document.getElementById("userType").value;
        var url = "<?php echo BASEURL ?>/userManagement/userRest/" + userType;
        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                var select = document.getElementById("place");
                select.innerHTML = "<option value='0' selected>Select Property</option>";
                for (var i = 0; i < json.length; i++) {
                    select.innerHTML += "<option value='" + json[i].Place + "'>" + json[i].Title + "</option>";

                }

            });
    }

    // function previewPost() {
    //     var userType = document.getElementById("userType").value;

    //     var url = "<?php echo BASEURL ?>/feed/postPreview/" + userType;
    //     fetch(url)
    //         .then((response) => response.json())
    //         .then((json) => {
    //             var select = document.getElementById("place"); 
    //             select.innerHTML = "<option value='0' selected>Select Place</option>";
    //             for (var i = 0; i < json.length; i++) {
    //                 select.innerHTML += "<option value='" + json[i].Place + "'>" + json[i].Title + "</option>";

    //             }

    //         });
    // }

    function alertUser() {
        var userId = document.getElementById("userId").value;
        alert(userId);
    }
</script>
<?php

$footer = new HTMLFooter();

?>