<?php
$type = ucfirst($data['type']);
$header = new HTMLHeader("Support | $type");
$nav = new Navigation('management');
$sidebar = new SidebarNav("support", "$type");
$basePage = BASEURL . "/support/$type";
?>
<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 width-90">
            <div class="row no-gap">

                <div class="col-12 col-medium-8 fill-container left">
                    <h1 class="header-1 ">
                        Support |
                        <?php echo $type ?>
                    </h1>
                </div>
                <?php
                if ($_SESSION['role'] == 'Manager' ) {
                    echo "
                <div class='col-12 col-medium-4 fill-container right'>
                    <button class='bg-blue white border-rounded header-nb padding-3 right'
                        onclick=\"location.href='".BASEURL."/support/addSupport/$type' \">
                        <i data-feather='plus' class=' vertical-align-middle '></i>
                        <span class='display-small-inline-block padding-left-2 display-none'>Add $type</span>
                    </button>
                </div>
                ";
                }
                ?>
            </div>




            <div class="row margin-top-5 fill-container">
                <div class=" shadow-small border-rounded-more   fill-container col-12 ">
                    <div class="row no-gap fill-container">
                        <div id="table"
                            class="col-8 table fill-container border-rounded-more-left padding-top-4 padding-bottom-5 shadow-small bg-white "
                            data-current-page="<?php if (isset($data['page'])) {
                                echo $data['page'];
                            } ?>" aria-live="polite">
                            <div class="hs padding-horizontal-5 padding-vertical-3">
                                <div class="col-3  text-overflow bold">Name</div>
                                <div class="col-3  text-overflow bold">User Type</div>
                                <div class="col-3  text-overflow bold">Email</div>
                                <div class="col-2  text-overflow bold">Status</div>
                                <div class="col-3  text-overflow bold">Topic</div>
                                <div class="col-4  text-overflow bold">Message</div>
                            </div>
                            <?php
                            if (isset($data['result'])) {
                                $SupportidArray = array();
                                foreach ($data['result'] as $key => $value) {
                                    if ($value->RequestTo == $_SESSION['role']) {
                                        array_push($SupportidArray, [$value->SupportId, $value->SupportStatus, $value->SupportImageLink, $value->Email, $value->SupportTitle]);
                                        $supportStatus = $value->SupportStatus;
                                        if ($supportStatus == "resolved") {
                                            $style = " border-accent accent";
                                        } else {
                                            $style = " border-grey grey";
                                            $supportStatus = "not resolved";
                                        }
                                        echo "<div class='hs list-items padding-horizontal-5 padding-vertical-2 border-1 border-white'>";
                                        echo "<div class='col-3  text-overflow ' title='" . $value->FirstName . " " . $value->LastName . "' >" . $value->FirstName . " " . $value->LastName . "</div>";
                                        echo "<div class='col-3  text-overflow ' title='" . $value->UserType . "' >" . $value->UserType . "</div>";
                                        echo "<div class='col-3  text-overflow ' title='" . $value->Email . "' >" . $value->Email . "</div>";
                                        echo "<div class='col-2 text-overflow ' title=' $supportStatus ' > <span class=' border-1 border-rounded-more small padding-horizontal-2 $style'> $supportStatus  </span></div>";
                                        echo "<div class='col-3  text-overflow ' title='" . $value->SupportTitle . "' >" . $value->SupportTitle . "</div>";
                                        echo "<div class='col-4  text-overflow ' title='" . $value->SupportMessage . "' >" . $value->SupportMessage . "</div>";
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>

                        </div>
                        <div
                            class="col-4 fill-container border-rounded-more-right padding-top-4 padding-bottom-5 bg-white shadow-small ">
                            <div class="col-12 fill-container padding-3 bold ">Actions</div>

                            <?php
                            if (isset($SupportidArray)) {
                                foreach ($SupportidArray as $support) {
                                    $image = $support[2];
                                    $supportId = $support[0];
                                    $email = $support[3];
                                    $title = $support[4];
                                    echo "<div class='row less-gap padding-1 padding-horizontal-3 list-item-action'>";

                                    echo "<div class='col-4 fill-container '>";
                                    echo "<a class='cursor-pointer' onclick='showModal(\"$image\")'><div class=' fill-container border-accent bg-white accent-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='eye' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>View</span>";
                                    echo "</div></a>";
                                    echo "</div>";

                                    echo "<div class='col-4 fill-container '>";
                                    echo "<a class='cursor-pointer' onclick='emailModal(\"$email\",\"$title\")'><div class=' fill-container border-accent bg-white accent-hover border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='mail' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Reply</span>";
                                    echo "</div></a>";
                                    echo "</div>";

                                    if ($support[1] == "resolved") {
                                        $style = " border-grey grey-hover ";
                                        $status = 'not';
                                    } else {
                                        $style = "border-blue blue-hover";
                                        $status = 'resolved';
                                    }
                                    echo "<div class='col-4 fill-container '>";
                                    echo "<a class='cursor-pointer' onclick='resolve(\"$supportId\", \"$status\" )'><div class=' fill-container bg-white $style border-1 border-rounded padding-vertical-1  center'>";
                                    echo "<i data-feather='check' class='feather-body display-inline-block display-small-none'></i> <span class='display-small-block  display-none'>Resolve</span>";
                                    echo "</div></a>";

                                    echo "</div>";
                                    echo "</div>";
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

    <?php
    if (isset($data['page']) && isset($data['perPage'])) {
        new pagination($data['page'], $data['perPage']);
    }
    ?>

    const changePerPage = (limit) => {
        location.href = '<?php echo $basePage ?>/1/' + limit.value;
    };

    function showModal(elem) {
        if (elem === null || elem === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Image not found!'
            })
            return;
        }
        Swal.fire({
            title: '<?= $type ?> Image',

            html:
                '<a href="<?= BASEURL ?>/' + elem + '" target="_blank"><img class="fill-container" src="<?= BASEURL ?>/' + elem + '" /></a>'

        });
    };

    function emailModal(email, subject) {
        Swal.fire({
            title: 'Reply',

            html:
                '<div class="row no-gap">' +
                '<div class="col-12 fill-container left">' +
                // '<label for="email-from">From</label>' +
                '<input type="hidden" class="fill-container" id="email-from" placeholder="jvatsbodo@gmail.com" value="jvatsbodo@gmail.com"/>' +
                '<label for="email-to">To</label>'+
                '<input type="email" class="fill-container" id="email-to" placeholder="Enter email here" value="' + email + '"/>' +
                '<label for="email-subject">Subject</label>'+
                '<input type="text" class="fill-container" id="email-subject" placeholder="Enter subject here" value="Re: ' + subject + '"/>' +
                '<label for="email-text">Message</label>'+
                '<textarea class="fill-container" id="email-text" rows="10" placeholder="Enter your reply here"></textarea>' +
                '</div>' +
                '</div>',
            showCancelButton: true,
            confirmButtonText: 'Send',


        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    emailFrom: document.getElementById('email-from').value,
                    emailTo: document.getElementById('email-to').value,
                    emailSubject: document.getElementById('email-subject').value,
                    emailText: document.getElementById('email-text').value,
                };

                fetch("<?php echo BASEURL ?>/support/email/", {
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
                                title: 'Email Sent',
                                text: 'Email sent successfully!',
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    });
            }
        });

    }

    function resolve(id, status) {
        let url = "<?= BASEURL ?>/support/resolve/";
        fetch(url + id + '/' + status).then((response) => response.json()).then((json) => {
            console.log(json);
            if (json.Status === 'Success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Status Changed',
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
</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>