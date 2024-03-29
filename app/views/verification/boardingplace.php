<?php
$header = new HTMLHeader("Professional Verification");
$nav = new Navigation('management');
$sidebar = new SidebarNav("verification", "boardingPlace");
$basePage = BASEURL . '/verification/boardingplace';
$base = BASEURL;
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">
                <div class="col-12 left fill-container">
                    <h1 class="header-1 ">
                        Boarding Place Verification
                    </h1>
                </div>

                <div class="col-12 fill-container left">

                    <?php
                    if (isset($data['result'])) {
                        new SearchUser("Boarding Place");
                    } ?>

                </div>
            </div>




            <div class="row margin-top-5 fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div id="table"
                            class="col-7 col-small-8 table fill-container border-rounded-more-left padding-top-4 padding-bottom-5 shadow-small bg-white "
                            data-current-page="<?php if (isset($data['page'])) {
                                echo $data['page'];
                            } ?>" aria-live="polite">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-3  text-overflow bold">OwnerName</div>
                                <div class="col-5  text-overflow bold">Title</div>
                                <div class="col-2  text-overflow bold">Status</div>
                                <div class="col-4  text-overflow bold">Point 1</div>
                                <div class="col-4  text-overflow bold">Point 2</div>
                                <div class="col-4  text-overflow bold">Point 3</div>
                                <div class="col-6  text-overflow bold">Description</div>
                                <div class="col-2  text-overflow bold">Price</div>
                                <div class="col-2  text-overflow bold">Pricing</div>
                                <div class="col-2  text-overflow bold">Type</div>
                                <div class="col-2  text-overflow bold">House No.</div>
                                <div class="col-2  text-overflow bold">Street</div>
                                <div class="col-2  text-overflow bold">City</div>
                                <div class="col-2  text-overflow bold">Members</div>
                                <div class="col-2  text-overflow bold">Rooms</div>
                                <div class="col-2  text-overflow bold">Washroom</div>
                                <div class="col-2  text-overflow bold">Gender</div>
                                <div class="col-2  text-overflow bold">Boarder</div>
                                <div class="col-2  text-overflow bold">Sq Ft</div>
                                <div class="col-2  text-overflow bold">Parking</div>
                            </div>
                            <?php
                            if (isset($data['result'])) {
                                $placeidArray = array();
                                $count = 0;
                                foreach ($data['result'] as $key => $value) {
                                    $verifiedStatus = $value->VerifiedStatus;
                                    if ($verifiedStatus != "verified") {
                                        $count++;

                                        $verifiedstyle = "border-1 border-rounded center border-grey grey small";
                                        $verifiedStatus = "not verified";

                                        $park = $value->Parking;
                                        if ($park == 'y') {
                                            $park = "Available";
                                        } else {
                                            $park = "N/A";
                                        }
                                        
                                        $array['PlaceId'] = $value->PlaceId;
                                        $placeid = $value->PlaceId;
                                        $array['Util']=$value->UtilityBillReceiptLink;

                                        array_push($placeidArray, $array);

                                          

                                        echo "<div id='result-$placeid' class='hs list-items padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                        echo "<div class='person-name col-3  text-overflow ' title='" . $value->OwnerName . "' >" . $value->OwnerName . "</div>";
                                        echo "<div class='person-name col-5  text-overflow ' title='" . $value->Title . "' >" . $value->Title . "</div>";
                                        echo "<div class='col-2  text-overflow $verifiedstyle' title='" . $verifiedStatus . "' >" . $verifiedStatus . "</div>"; 
                                        echo "<div class='col-4  text-overflow ' title='" . $value->SummaryLine1 . "' >" . $value->SummaryLine1 . "</div>"; 
                                        echo "<div class='col-4  text-overflow ' title='" . $value->SummaryLine2 . "' >" . $value->SummaryLine2 . "</div>"; 
                                        echo "<div class='col-4  text-overflow ' title='" . $value->SummaryLine3 . "' >" . $value->SummaryLine3 . "</div>"; 
                                        echo "<div class='col-6  text-overflow ' title='" . $value->Description . "' >" . $value->Description . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->Price . "' >" . $value->Price . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->PriceType . "' >" . $value->PriceType . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->PropertyType . "' >" . $value->PropertyType . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->HouseNo . "' >" . $value->HouseNo . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->Street . "' >" . $value->Street . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->CityName . "' >" . $value->CityName . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->NoOfMembers . "' >" . $value->NoOfMembers . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->NoOfRooms . "' >" . $value->NoOfRooms . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->NoOfWashRooms . "' >" . $value->NoOfWashRooms . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->Gender . "' >" . $value->Gender . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->BoarderType . "' >" . $value->BoarderType . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $value->SquareFeet . "' >" . $value->SquareFeet . "</div>"; 
                                        echo "<div class='col-2  text-overflow ' title='" . $park . "' >" . $park . "</div>"; 
                                        echo "</div>";
                                    }
                                }
                            }
                            if ($count == 0) {
                                echo "<div class='hs list-items padding-horizontal-5 padding-vertical-2 border-1 border-white'>
                                        <div class='col-12  text-overflow ' title='No results found' >All properties verified</div>
                                    </div>
                                ";

                            }
                            ?>

                        </div>
                        <div
                            class="col-5 col-small-4 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($placeidArray) && !empty($placeidArray)) {
                                foreach ($placeidArray as $key => $value) {
                                    $placeId = $value['PlaceId'];
                                    $util=$value['Util'];
                                    echo "<div class='row less-gap padding-1 padding-horizontal-3 list-item-action'>";

                                    echo "<div class='col-4 fill-container '>";
                                    echo "<a onclick='showModal(\"$util\")' class='cursor-pointer'><div class=' fill-container  border-accent bg-white accent-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='eye' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>View</span>";
                                    echo "</div></a>";
                                    echo "</div>";

                                    echo "<div class='col-4 fill-container '>";
                                    echo "<a onclick='verify($placeId)' class='cursor-pointer'><div class=' fill-container border-blue bg-white blue-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='user-check' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Verify</span>";
                                    echo "</div></a>";
                                    echo "</div>";

                                    echo "<div class='col-4 fill-container '>";
                                    echo "<a onclick='deleteProperty($placeId)' class='cursor-pointer'><div class=' fill-container border-red bg-white red-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='trash' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Delete</span>";
                                    echo "</div></a>";

                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            else{
                                echo "<div class='row less-gap padding-1 padding-horizontal-3 list-item-action'>
                                        <div class='col-12 fill-container padding-2 bold '>No actions available</div>
                                    </div>
                                ";

                            }
                            ?>
                        </div>
                    </div>
                    <div class="row no-gap fill-container  ">
                        <div class="col-small-6 display-small-block  display-none  fill-container">

                            <?php
                            if (isset($data['rowCount']) && isset($data['page']) && isset($data['perPage'])) {
                                echo '<span class="padding-horizontal-4">' . $data["perPage"] . ' entries per page (Total ' . count($placeidArray) . ' entries)</span>';
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
    function showModal(elem){
        if(elem == null || elem == ""){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Image not found!'
            })
            return;
        }
        Swal.fire({
                title: 'Utility Bill Scanned',
                 
            html:
                '<a href="<?= $base ?>/'+elem+'" target="_blank"><img class="fill-container border-rounded" src="<?= $base ?>/'+elem+'" /></a>'
            
            });
    }

    function verify(id) {
        let url = "<?= $base ?>/verification/verify/BoardingPlace/";
        console.log(url + id);
        fetch(url + id).then((response) => response.json()).then((json) => {
            console.log(json);
            if (json.Status === 'Success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Boarding Place Verified'
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

        });
    }
    function deleteProperty(id) {
        const data = {
            Table: 'BoardingPlace',
            Id1: 'PlaceId',
            IdValue1: id,
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

                fetch("<?php echo BASEURL ?>/delete/", {
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