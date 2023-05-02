<?php
$type = ucfirst($data['type']);

$header = new HTMLHeader("Add | Update");
$nav = new Navigation("management");
$sidebar = new SidebarNav("support", "$type");
$base = BASEURL;
?>
<main class=" full-width ">
    <form action="<?php echo BASEURL ?>/support/addSupportForm" method="post">
        <div class="row sidebar-offset navbar-offset ">
            <div class="col-12 col-medium-12 width-90">
                <div class="row ">
                    <div class="col-12 col-medium-8 fill-container left"
                        onclick=" location.href='<?= $base ?>/support'">
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
                                    <option disabled selected>Select User Type</option> 
                                    <option value="Manager">Manager</option>
                                    <option value="VerificationTeam">Verification Team</option>
                                    <option value="BoardingOwner">Boarding Owner</option>
                                    <option value="Student">Student</option>
                                    <option value="Professional">Professional</option>
                                </select>
                            </div>
                            <input type="hidden" id="type" name="type" value="<?php echo $type ?>">

                            <div class="col-12 col-medium-4 fill-container">
                                <label for="userId" class="bold black">Name</label><br>
                                <select name="userId" id="userId" required>
                                    <option disabled selected>Select Name</option>
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
                            <div class="col-12 col-medium-6 fill-container">
                                <label for="support" class="bold black">
                                    <?php echo $type ?> Description
                                </label><br>
                                <textarea class="fill-container" id="description" name="description"
                                    placeholder="Enter Issue Description" required></textarea>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="requestTo" class="bold black">Request To</label><br>
                                <select name="requestTo" id="requestTo" required>
                                    <option disabled selected>Select User Type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                    <option value="VerificationTeam">Verification Team</option>
                                </select>
                            </div>
                            <div class="col-12 col-medium-3 fill-container">
                                <label for="supportimage" class="bold black">
                                    <?php echo $type ?> Image
                                </label><br>
                                <input id="supportimage" name='supportimage' credits='false'
                                    accept="image/png, image/jpeg, image/gif" type="file">
                            </div>
                            <input type="hidden" id="images" name="images" required>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
</main>

<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.create(document.getElementById('supportimage'), {
        server: '<?php echo BASEURL ?>/imageUpload/support',
        allowImagePreview: false
    });

    // console log file path after submit
    document.getElementById('supportimage').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('images').value = filepath;
        }
    });

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