<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;

?>

<main class=" navbar-offset full-width  ">
    <div class=" fill-container center ">

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

</main>


<?php
$footer = new HTMLFooter();
?>