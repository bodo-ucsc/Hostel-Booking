<?php

class ShowMap
{
    public $lats;
    public $lngs;

    public function __construct($address)
    {  
        echo '<div class=" margin-left-5 map" id="map_container">MAP</div>';
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

            //when window load then call initMap function
            //window.addEventListener('load', initMap);
        } else {
            echo 'Geocode was not successful for the following reason: ' . $results['status'];
        }

        echo '
    <br><span class="header-2 margin-left-4">Near By Places</span>
    <div id="nearby"></div>';

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
        //$results = '';

        echo '<div class=" row padding-4">';

        $limit = 10;
        $count = 0;
        foreach ($places as $place) {
            if ($count >= $limit) {
                break;
            }

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

                        echo '<div class="col-3 margin-horizontal-2 margin-vertical-1 fill-container">';
                        echo "<div class='shadow border-rounded padding-3 map-card'>";
                        echo '<img style="height: 150px;" src="' . $photoUrl . '" alt="Place Image">';
                        echo '<h2>' . $name . '</h2>';
                        echo '<p>' . $address . '</p>';
                        echo '<i data-feather="star"></i>' . $rating . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            $count++;
        }

        echo '</div>
        <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap"></script>
        ';

        if (isset($lats) && isset($lngs)) {
            echo "
            <script>
                initMap(); 
        
                function initMap( ) { 
                    
                    var location = {
                        lat: parseFloat($lats),
                        lng: parseFloat($lngs)
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
      ";
        }
    }
}
