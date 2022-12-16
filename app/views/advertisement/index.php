<?php
$header = new HTMLHeader("Admin | Advertisement Management");
$nav = new Navigation("management");
$base = BASEURL;

new SideBarNav("Advertisement");
?>

<main class=" full-width ">
    <div class="row sidebar-offset navbar-offset ">
        <div class="col-12 col-small-12 fill-container">
            <div class="row margin-horizontal-5 ">
                <div class="col-8 left fill-container">
                    <h1 class="header-1 ">
                        Advertisement Management
                    </h1>
                </div>

                <div class="col-4  fill-container right">
                    <button class="bg-blue-hover white border-rounded header-nb padding-3 right"
                        onclick="location.href='<?php echo $base ?>/admin/addUpdate'">
                        <i data-feather="plus" class=" vertical-align-middle "></i>
                        <span class="display-large-inline-block padding-left-2 display-none">Add Advert</span>
                    </button>
                </div>
            </div>

            <?php
            if (isset($data['row'])) {
                while ($row = $data['row']->fetch_assoc()) {

                    $PostId = $row['PostId'];
                    $url = "$base/feed/postRest/$PostId";
                    $client = curl_init($url);
                    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($client);
                    $result = json_decode($response);

                    new ViewCard(
                            $result->FirstName,
                            $result->LastName,
                            $result->UserType,
                            $result->ProfilePicture,
                            $result->PostId,
                            $result->DateTime,
                            $result->Caption,
                            $result->SummaryLine1,
                            $result->SummaryLine2,
                            $result->SummaryLine3,
                            $result->Price,
                            $result->PriceType,
                            $result->Street,
                            $result->CityName,
                            $result->NoOfMembers,
                            $result->NoOfRooms,
                            $result->NoOfWashRooms,
                            $result->Gender,
                            $result->BoarderType,
                            $result->SquareFeet,
                            $result->Parking
                    );
                }
            }
            ?>
        </div>
    </div>

</main>


<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>