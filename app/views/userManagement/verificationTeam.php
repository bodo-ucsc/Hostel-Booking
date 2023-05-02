<?php
$header = new HTMLHeader("Verification Team");
$nav = new Navigation('management');
$sidebar = new SidebarNav("user", "verification");
$basePage = BASEURL . '/userManagement/verificationTeam';
$base = BASEURL . '/userManagement';


?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">
                <div class="col-12 left fill-container">
                    <h1 class="header-1 ">
                        Verification Team
                    </h1>
                </div>

                <div class="col-9 col-small-10 col-large-9 fill-container left">

                    <?php
                    if (isset($data['result'])) {
                        new SearchUser("Verification Team");
                    }


                    ?>
                </div>
                <div class="col-1 display-small-none"></div>
                <div class="col-2 col-large-3 fill-container right">
                    <?php
                    if ($_SESSION['role'] == 'Admin') {
                        echo "
                <button class='bg-blue-hover white border-rounded header-nb padding-3 right'
                        onclick='location.href=\"$base/create/verificationTeam\"'>
                        <i data-feather='user-plus' class=' vertical-align-middle '></i>
                        <span class='display-large-inline-block padding-left-2 display-none'>Add User</span>
                    </button>";
                    }
                    ?>
                </div>
            </div>




            <div class="row margin-top-5 fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div id="table"
                            class="col-8 col-small-9 table fill-container border-rounded-more-left padding-top-4 padding-bottom-5 shadow-small bg-white "
                            data-current-page="<?php if (isset($data['page'])) {
                                echo $data['page'];
                            } ?>" aria-live="polite">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-2  text-overflow bold">First Name</div>
                                <div class="col-2  text-overflow bold">Last Name</div>
                                <div class="col-2  text-overflow bold">User Name</div>
                                <div class="col-2  text-overflow bold">DOB</div>
                                <div class="col-2  text-overflow bold">Gender</div>
                                <div class="col-3  text-overflow bold">NIC</div>
                                <div class="col-3  text-overflow bold">Email</div>
                                <div class="col-3  text-overflow bold">Contact</div>
                                <div class="col-4  text-overflow bold">Address</div>
                            </div>
                            <?php
                            if (isset($data['result'])) {

                                $useridArray = array();
                                foreach ($data['result'] as $key => $value) {
                                    array_push($useridArray, $value->UserId);
                                    $gender = $value->Gender;
                                    if ($gender == 'm') {
                                        $gender = 'Male';
                                    } else {
                                        $gender = 'Female';
                                    }
                                    $verifiedStatus = $value->VerifiedStatus;
                                    if ($verifiedStatus == "verified") {
                                        $verifiedstyle = " border-accent accent";
                                    } else {
                                        $verifiedstyle = " border-grey grey";
                                        $verifiedStatus = "not verified";
                                    }
                                    echo "<div class='hs list-items padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                    echo "<div class='person-name col-2  text-overflow ' title='" . $value->FirstName . "' >" . $value->FirstName . "</div>";
                                    echo "<div class='person-name col-2  text-overflow ' title='" . $value->LastName . "' >" . $value->LastName . "</div>";
                                    echo "<div class='col-2  text-overflow ' title='" . $value->Username . "' >" . $value->Username . "</div>";
                                    echo "<div class='col-2  text-overflow ' title='" . $value->DateOfBirth . "' >" . $value->DateOfBirth . "</div>";
                                    echo "<div class='col-2  text-overflow ' title=' $gender'>$gender</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $value->NIC . "' >" . $value->NIC . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $value->Email . "' >" . $value->Email . "</div>";
                                    echo "<div class='col-3  text-overflow ' title='" . $value->ContactNumber . "' >" . $value->ContactNumber . "</div>";
                                    echo "<div class='col-4  text-overflow ' title='" . $value->Address . "' >" . $value->Address . "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>

                        </div>
                        <div
                            class="col-4 col-small-3 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($useridArray)) {
                                if ($_SESSION['role'] == 'Admin') {

                                    foreach ($useridArray as $userid) {
                                        echo "<div class='row less-gap padding-1 padding-horizontal-3 list-item-action'>";
                                        echo "<div class='col-6 fill-container '>";
                                        echo "<a href='" . $base . "/userEdit/verificationTeam/$userid'><div class=' fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>";
                                        echo "<i data-feather='edit' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Edit</span>";
                                        echo "</div></a>";
                                        echo "</div>";

                                        echo "<div class='col-6 fill-container '>";
                                        echo "<a onclick='deleteUser($userid)' class='cursor-pointer'><div class=' fill-container border-red bg-white red-hover border-1 border-rounded padding-vertical-1  center'>";
                                        echo "<i data-feather='trash' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Delete</span>";
                                        echo "</div></a>";

                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }else{
                                    foreach ($useridArray as $userid) {
                                        echo "<div class='row less-gap padding-1 padding-horizontal-3 list-item-action'>
                                                <div class='col-12 fill-container '>
                                                    <div class=' cursor-default fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>
                                                        <i data-feather='alert-circle' class='feather-body display-inline-block display-small-none'></i> 
                                                        <span class='display-small-block  display-none'>No Actions</span>
                                                    </div>
                                                </div>
                                             </div>"; 
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row no-gap fill-container  ">
                        <div class="col-small-6 display-small-block  display-none  fill-container">

                            <?php
                            if (isset($data['rowCount']) && isset($data['page']) && isset($data['perPage'])) {
                                echo '<span class="padding-horizontal-4">' . $data["perPage"] . ' entries per page (Total ' . $data["rowCount"] . ' entries)</span>';
                            }
                            ?>
                        </div>
                        <div class="col-12 col-small-6 padding-vertical-2 fill-container right">

                            <div class="pagination right padding-right-4">
                                <select
                                    class=" autowidth display-inline-block border-1 border-rounded  margin-0 margin-right-2"
                                    id="per-page" onchange="changePerPage(this)">
                                    <?php
                                    if (isset($data['perPage'])) {
                                        if ($data['perPage'] == 2 || $data['perPage'] == 5 || $data['perPage'] == 10 || $data['perPage'] == 20 || $data['perPage'] == 50 || $data['perPage'] == 100) {
                                            if ($data['perPage'] == 2) {
                                                echo '<option value="2" selected>2</option>';
                                            } else {
                                                echo '<option value="2">2</option>';
                                            }
                                            if ($data['perPage'] == 5) {
                                                echo '<option value="5" selected>5</option>';
                                            } else {
                                                echo '<option value="5">5</option>';
                                            }
                                            if ($data['perPage'] == 10) {
                                                echo '<option value="10" selected>10</option>';
                                            } else {
                                                echo '<option value="10">10</option>';
                                            }
                                            if ($data['perPage'] == 20) {
                                                echo '<option value="20" selected>20</option>';
                                            } else {
                                                echo '<option value="20">20</option>';
                                            }
                                            if ($data['perPage'] == 40) {
                                                echo '<option value="40" selected>40</option>';
                                            } else {
                                                echo '<option value="40">40</option>';
                                            }
                                            if ($data['perPage'] == 80) {
                                                echo '<option value="80" selected>80</option>';
                                            } else {
                                                echo '<option value="80">80</option>';
                                            }
                                            if ($data['perPage'] == 100) {
                                                echo '<option value="100" selected>100</option>';
                                            } else {
                                                echo '<option value="100">100</option>';
                                            }
                                        } else {
                                            echo '<option value="' . $data['perPage'] . '" selected>' . $data['perPage'] . '</option>';
                                            echo '<option value="2">2</option>';
                                            echo '<option value="5">5</option>';
                                            echo '<option value="10">10</option>';
                                            echo '<option value="20">20</option>';
                                            echo '<option value="40">40</option>';
                                            echo '<option value="80">80</option>';
                                            echo '<option value="100">100</option>';
                                        }

                                    }
                                    ?>
                                </select>
                                <button class="pagination-button bg-white-hover shadow padding-3 display-inline-block"
                                    id="prev-button" aria-label="Previous page" title="Previous page">
                                    &lt;
                                </button>

                                <div class="display-inline-block" id="pagination-numbers">

                                </div>

                                <button class="pagination-button bg-white-hover shadow padding-3 display-inline-block"
                                    id="next-button" aria-label="Next page" title="Next page">
                                    &gt;
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    function deleteUser(id) {
        const data = { 
            UserId: id
        };
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#006DFF',
            cancelButtonColor: '#C83A3A',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {

                fetch("<?php echo BASEURL ?>/delete/deleteUser", {
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
                                title: 'Deleted Successfully'
                            }).then((result) => {
                                location.reload();
                            });

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

            }
        })


    };

    <?php
    if (isset($data['page']) && isset($data['perPage'])) {
        new pagination($data['page'], $data['perPage']);
    }
    ?>

    const changePerPage = (limit) => {
        location.href = '<?php echo $basePage ?>/1/' + limit.value;
    };

    function searchUser() {
        // Declare variables
        var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
        input = document.getElementById("searchUser");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByClassName('list-items');
        const listItemsActions = document.getElementsByClassName('list-item-action');

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByClassName("person-name")[0];
            td2 = tr[i].getElementsByClassName("person-name")[1];
            if (td1 || td2) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                    tr[i].classList.add('hs');
                    tr[i].classList.remove('display-none');
                    listItemsActions[i].classList.add('row');
                    listItemsActions[i].classList.remove('display-none');
                } else {
                    listItemsActions[i].classList.add('display-none');
                    listItemsActions[i].classList.remove('row');
                    tr[i].classList.add('display-none');
                    tr[i].classList.remove('hs');
                }
            }
        }
        //if cleared search reset pagination
        if (filter == "") {
            setCurrentPage(<?php echo $data['page']; ?>);
        }
    }
</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>