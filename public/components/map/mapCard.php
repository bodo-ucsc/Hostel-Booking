<?php

if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}

?>
<?php

function viewMap($address)
{
    echo '<div id="map_container" style="width: 45%; height: 300px;">MAP</div>';
    echo "  
<main  class='navbar-offset full-width'>
<div id='nearby' class='col-8 shadow padding-3 border-rounded-more'>
<div class='row'>
    <div class='col-3  fill-vertical padding-3 '>
      <img src='https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/brewster-mcleod-architects-1486154143.jpg'
            class='fill-container fill-vertical border-rounded-more' alt=''>
    </div>

    <div class='col-4 padding-3'>
        <div class='row'>
            <div d='address' class='col-3 header-2 fill-container left'>
            Address: $address
            </div>
            <div class='col-3 big bold fill-container right'>
                <i data-feather='star' class='fill-black vertical-align-middle'></i>
                <span class=' vertical-align-middle'>4.5</span>
            </div>
        </div>
        <div class='row'>
            <div class='col-3 fill-container left small grey'>
                Street, CityName
            </div>
        </div>
    </div>
</div>
</div>
    
</main>";
    
    //echo "<div id='address'>Address: $address</div>";
    $apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
    $base = BASEURL;
    $radius = 1000;
    $type = 'restaurant';
    $address = str_replace(array(','), '', $address);
    $address = str_replace(' ', '+', $address);
    $APIKEY = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=$APIKEY";
    $response = file_get_contents($url);
    $results = json_decode($response, true);

    if ($results['status'] == 'OK') {
        $lats = $results['results'][0]['geometry']['location']['lat'];
        $lngs = $results['results'][0]['geometry']['location']['lng'];
?>
        <div id='lat'>latitude:<?php echo $lats ?></div>
        <div id='lng'>longitude:<?php echo $lngs ?></div>

    <?php
        echo "<script>initMap($lats,$lngs);</script>";
        //when window load then call initMap function
        //window.addEventListener('load', initMap);
    } else {
        echo 'Geocode was not successful for the following reason: ' . $results['status'];
    }
    ?>
    <div id="nearby">Near By Places</div>
<?php
    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$apiKey&location=$lats,$lngs&radius=$radius&type=$type";
    $response = file_get_contents($url);
    $results = json_decode($response, true);

    //echo json_encode($results);
    // //print_r($results);
    $places = array();
    $places = $results['results'];
    // print_r($places);
    // return $results;
    //return $places;
    $results = '';
    foreach ($places as $place) {
        $name = $place['name'];
        $address = $place['vicinity'];
        if (isset($place['rating'])) {

            $rating = $place['rating'];
            if (isset($place['photos'])) {
                $photos = $place['photos'];
                $photoUrl = '';
                if ($photos) {
                    $photoReference = $photos[0]['photo_reference'];
                    $photoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=200&photoreference=$photoReference&key=$apiKey";
                    $results .= "$name ($address) ($rating) <img src='$photoUrl'> <br>";
                }
            }
        }
    }

    echo $results;
}

?>

<script>
    function initMap(lats, lngs) {

        var location = {
            lat: parseFloat(lats),
            lng: parseFloat(lngs)
        };

        var map = new google.maps.Map(document.getElementById('map_container'), {
            zoom: 17,
            center: location
        });
        var marker = new google.maps.Marker({
            map: map,
            position: location
        });

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap"></script>

<!-- <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap'></script> -->



<!-- // ucsc,colombo, sri lanka
    // University of Colombo,colombo, sri lanka
    // University of kelaniya,Kelaniya, sri lanka
    // University of Moratuwa,Moratuwa, sri lanka
    // University of Peradeniya,Peradeniya, sri lanka
    // University of Ruhuna,Galle, sri lanka
    // University of Jaffna,Jaffna, sri lanka
    // University of Sabaragamuwa,Keppetipola, sri lanka
    // University of Sri Jayewardenepura,Kotte, sri lanka  -->