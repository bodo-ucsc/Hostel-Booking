<?php
$type = ucfirst($data['type']);

$header = new HTMLHeader("Add | Update");
$nav = new Navigation("management");
$sidebar = new SidebarNav("support", "$type");
$base = BASEURL;
?>
<main class=" full-width ">
    <form action="<?php echo BASEURL ?>/support/addSupport" method="post">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left"
                        onclick=" location.href='<?= $base ?>/admin/support'">
                        <h1 class="header-1 black-hover cursor-pointer">

                            <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                            <span class="vertical-align-middle">Add
                                <?php echo $type ?>
                            </span>
                        </h1>
                    </div>
                    <div class="col-12 col-medium-4 fill-container right">
                        <button type="submit" class="bg-blue white border-rounded header-nb padding-3 right">
                            <i data-feather="save" class=" vertical-align-bottom padding-right-2"></i> <span>Save</span>
                        </button>
                    </div>
                </div>
                <div class="row margin-top-5 fill-container">
                    <div class="col-12  fill-container ">
                        <div class="row">
                            <div class="col-12 col-medium-4 fill-container">
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
                            <input type="hidden" id="type" name="type" value="<?php echo $type ?>">

                            <div class="col-12 col-medium-4 fill-container">
                                <label for="userId" class="bold black">Name</label><br>
                                <select name="userId" id="userId" required>
                                    <option value="0" selected>Select Name</option>
                                </select>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="support" class="bold black">
                                    <?php echo $type ?> Title
                                </label><br>
                                <input type="text" class="fill-container" id="support" name="support"
                                    placeholder="Enter Issue Title" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-medium-8 fill-container">
                                <label for="support" class="bold black">
                                    <?php echo $type ?> Description
                                </label><br>
                                <input type="text" class="fill-container" id="description" name="description"
                                    placeholder="Enter Issue Description" required>
                            </div>
                            <div class="col-12 col-medium-4 fill-container">
                                <label for="support" class="bold black">
                                    <?php echo $type ?> Images
                                </label><br>
                                <input type="text" class="fill-container" id="images" name="images"
                                    placeholder="Insert Image" >
                            </div>
                        </div> 
                    </div>

                </div>

            </div>
        </div>
    </form>
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
</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>