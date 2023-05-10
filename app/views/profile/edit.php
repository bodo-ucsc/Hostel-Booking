<?php
$header = new HTMLHeader("Advertisement Management");
$nav = new Navigation("");
$base = BASEURL;

$id = $_SESSION['UserId'];

$result = restAPI("userManagement/userIdRest/$id");
if (isset($result['0'])) {
    $value = $result['0'];
}

$FirstName = $value->FirstName;
$LastName = $value->LastName;
$role = $value->UserType;
$profilepic = $value->ProfilePicture;
$Username = $value->Username;
$Email = $value->Email;
$ContactNumber = $value->ContactNumber;

$_SESSION['username'] = $Username;
$_SESSION['firstname'] = $FirstName;
$_SESSION['lastname'] = $LastName;
$_SESSION['profilepic'] = $profilepic;

$Address = restAPI("userManagement/getAddress/$role/$id");
$Address = $Address[0]->Address;

?>

<main class=" full-width ">
    <div class="row navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <div class="row margin-top-3 fill-container">

                <div class="col-12   fill-container left" onclick=" location.href='<?= $base ?>/profile'">
                    <h1 class="header-1 black-hover cursor-pointer">
                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <span class="vertical-align-middle">Edit Profile</span>
                    </h1>
                </div>
                <div class="col-3 display-small-none display-block fill-container"></div>
                <div class="col-6 col-small-4  col-medium-2 fill-container padding-0 ">
                    <input type="file" id="profilepic" credits='false' name="profilepic"
                        accept="image/png, image/jpeg, image/gif" />
                    <input type="hidden" id="pplink" name="pplink" value='<?= $profilepic ?>'>
                    <div class="col-2 fill-container right ">
                        <button onclick="update('User','UserId','<?= $id ?>','ProfilePicture','pplink')"
                            class="bg-accent-hover white-hover border-rounded-more ">
                            <i data-feather="check" class=" vertical-align-middle"></i>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-small-8 col-medium-10 fill-container ">
                    <h2 class="header-2">Personal Details</h2>
                    <div class="row">
                        <div class="col-12 col-medium-6 fill-container">
                            <label for="firstname" class="bold black">First Name</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="firstname" name="firstname"
                                        placeholder="Enter First Name" value='<?= $FirstName ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','FirstName','firstname')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-6 fill-container">
                            <label for="lastname" class="bold black">Last Name</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="lastname" name="lastname"
                                        placeholder="Enter Last Name" value='<?= $LastName ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','LastName','lastname')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-medium-6 fill-container">
                            <label for="mobile" class="bold black">Mobile</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="mobile" name="mobile"
                                        placeholder="Enter Mobile" value='<?= $ContactNumber ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','ContactNumber','mobile')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-6 fill-container">
                            <label for="email" class="bold black">Email</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="email" class=" fill-container margin-0 " id="email" name="email"
                                        placeholder="Enter Email" value='<?= $Email ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','Email','email')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <?php
                        if ($role != "Admin") {
                            $roleId = $role . "Id";
                            echo "
                        <div class='col-12 col-medium-12 fill-container'>
                            <label for='address' class='bold black'>Address</label><br>
                            <div class='searchbar row fill-container border-rounded-more'>
                                <div class='col-10 fill-container '>
                                    <input type='text' class=' fill-container margin-0 ' id='address' name='address'
                                        placeholder='Enter Address' value='$Address'>
                                </div>
                                <div class='col-2 fill-container right '>
                                    <button
                                        onclick='update(\"$role\",\"$roleId\",\" $id \",\"Address\",\"address\")'
                                        class='bg-accent-hover white-hover border-rounded-more '>
                                        <i data-feather='check' class=' vertical-align-middle'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        ";
                        }
                        ?>

                    </div>
                </div>


                <div class="col-12   fill-container ">
                    <h2 class="header-2">Login Credentials</h2>
                    <div class="row">


                        <div class="col-12 col-medium-6 fill-container">
                            <label for="username" class="bold black">Username</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="username" name="username"
                                        placeholder="Enter Username" value='<?= $Username ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','Username','username')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-6 fill-container">
                            <label for="password" class="bold black">Password</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="password" class=" fill-container margin-0 " id="password"
                                        name="password" placeholder="Enter Password" value=''>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','Password','password')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 fill-container"></div>

                    </div>
                </div>
            </div>


        </div>
    </div>

</main>


<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>


    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImageExifOrientation, FilePondPluginImagePreview, FilePondPluginImageCrop, FilePondPluginImageResize, FilePondPluginImageTransform);

    FilePond.create(document.getElementById('profilepic'), {
        server: '<?php echo BASEURL ?>/imageUpload/profilepic',
        labelIdle: `<img  src='<?php echo "$base/$profilepic" ?>'/>`,
        allowImagePreview: true,
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleButtonRemoveItemPosition: 'center bottom',
    });

    // console log file path after submit
    document.getElementById('profilepic').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('pplink').value = filepath;
        }
    });

    function update(table, id, idvalue, k, value) {
        let v = document.getElementById(value).value;

        const data = {
            Table: table,
            Id: id,
            IdValue: idvalue,
            Key: k,
            Value: v,
        };

        fetch("<?php echo BASEURL ?>/edit/", {
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
                        title: 'Edited Successfully'
                    }).then((result) => {
                        location.reload();
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            }).catch(function (error) {                        // catch
                console.log('Request failed', error);
            });
    };

</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>