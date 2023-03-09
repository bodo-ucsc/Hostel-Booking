<?php
$header = new HTMLHeader("Edit User | Boarding Owner");
$nav = new Navigation("home");
$sidebar = new SidebarNav("user", "boardingOwner");
$base = BASEURL;

if (isset($data['id'])) {
    $id = $data['id'];
    $result = restAPI("userManagement/getUser/boardingowner/$id");
    if (isset($result['0'])) {
        $value = $result['0'];
    }
} else {
    header("Location:  '$base/userManagement/boardingOwner'");
}

$FirstName = $value->FirstName;
$LastName = $value->LastName;
$Gender = $value->Gender;

$Username = $value->Username;
$Email = $value->Email;
$WorkPlace = $value->WorkPlace;
$Occupation = $value->Occupation;
$DateOfBirth = $value->DateOfBirth;
$NIC = $value->NIC;
$ContactNumber = $value->ContactNumber;
$Address = $value->Address;
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-medium-12 width-90">
            <div class="row ">
                <div class="col-12   fill-container left"
                    onclick=" location.href='<?= $base ?>/userManagement/boardingOwner'">
                    <h1 class="header-1 black-hover cursor-pointer">

                        <i data-feather="chevron-left" class="feather-large vertical-align-middle"></i>
                        <span class="vertical-align-middle">Edit Boarding Owner</span>
                    </h1>
                </div>
                <div class="col-12 col-medium-4 fill-container right">

                    <!-- <div class="col-4 fill-container">
                            <input class=" padding-5 bg-accent-hover white-hover border-rounded header-nb right"
                                type="submit" value="Save">

                        </div> -->
                </div>
            </div>
            <div class="row margin-top-3 fill-container">
                <div class="col-12 col-large-12 fill-container ">
                    <h2 class="header-2">Personal Details</h2>
                    <div class="row">
                        <div class="col-12 col-medium-4 fill-container">
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

                        <div class="col-12 col-medium-4 fill-container">
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

                        <div class="col-12 col-medium-4 fill-container padding-bottom-4">
                            <!-- gender radio buttons-->
                            <div class="bold black padding-bottom-2 ">Gender</div>
                            <div class=" row fill-container border-rounded-more">
                                <div class="col-6 col-small-4 col-medium-8 fill-container ">
                                    <?php
                                    if ($Gender == 'm') {
                                        echo "
                                    <input type='radio' name='gender' value='m' id='male'  checked>
                                    <label for='male' class=''>Male</label>

                                    <input type='radio' name='gender' value='f' id='female' >
                                    <label for='female' class=''>Female</label>
                                    ";
                                    } else {
                                        echo "
                                    <input type='radio' name='gender' value='m' id='male' >
                                    <label for='male' class=''>Male</label>

                                    <input type='radio' name='gender' value='f' id='female' checked >
                                    <label for='female' class=''>Female</label>
                                    ";
                                    }

                                    ?>
                                </div>
                                <div class="col-1 fill-container right ">
                                    <button
                                        onclick="updateGender('BoardingOwner','BoardingOwnerId','<?= $id ?>','Gender','gender')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-4 fill-container">
                            <label for="dob" class="bold black">Date of Birth</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="date" class=" fill-container margin-0 " id="dob" name="dob"
                                        placeholder="Enter Date of Birth" value='<?= $DateOfBirth ?>'>
                                </div>

                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingOwner','BoardingOwnerId','<?= $id ?>','DateOfBirth','dob')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-4 fill-container">
                            <label for="nic" class="bold black">NIC Number</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="nic" name="nic"
                                        placeholder="Enter NIC Number" value='<?= $NIC ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('BoardingOwner','BoardingOwnerId','<?= $id ?>','NIC','nic')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-4 fill-container">
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

                        <div class="col-12 col-medium-4 fill-container">
                            <label for="occupation" class="bold black">Occupation</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="occupation"
                                        name="occupation" placeholder="Enter Occupation" value='<?= $Occupation ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingOwner','BoardingOwnerId','<?= $id ?>','Occupation','occupation')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-4 fill-container">
                            <label for="workplace" class="bold black">Work Place</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="workplace" name="workplace"
                                        placeholder="Enter Work Place" value='<?= $WorkPlace ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingOwner','BoardingOwnerId','<?= $id ?>','WorkPlace','workplace')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-medium-4 fill-container">
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


                        <div class="col-12 col-medium-5 fill-container">
                            <label for="address" class="bold black">Address</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="address" name="address"
                                        placeholder="Enter Address" value='<?= $Address ?>'>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button
                                        onclick="update('BoardingOwner','BoardingOwnerId','<?= $id ?>','Address','address')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-12 col-large-12 fill-container ">
                    <h2 class="header-2">Login Credentials</h2>
                    <div class="row">


                        <div class="col-12 col-medium-4 fill-container">
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

                        <div class="col-12 col-medium-4 fill-container">
                            <label for="password" class="bold black">Password</label><br>
                            <div class="searchbar row fill-container border-rounded-more">
                                <div class="col-10 fill-container ">
                                    <input type="text" class=" fill-container margin-0 " id="password" name="password"
                                        placeholder="Enter Password" value=''>
                                </div>
                                <div class="col-2 fill-container right ">
                                    <button onclick="update('User','UserId','<?= $id ?>','Password','password')"
                                        class="bg-accent-hover white-hover border-rounded-more ">
                                        <i data-feather="check" class=" vertical-align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

</main>

<script>
    function update(table, id, idvalue, k, value) {
        let v = document.getElementById(value).value;

        const data = {
            Table: table,
            Id: id,
            IdValue: idvalue,
            Key: k,
            Value: v,
        };
        doUpdate(data);
    }
    function updateGender(table, id, idvalue, k, value) {
        var v = document.getElementsByName(value);
        for (var radio of v) {
            if (radio.checked) {
                val = radio.value;
                break;
            }
        }
        const data = {
            Table: table,
            Id: id,
            IdValue: idvalue,
            Key: k,
            Value: val,
        };
        doUpdate(data);
    }

    function doUpdate(data) {

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