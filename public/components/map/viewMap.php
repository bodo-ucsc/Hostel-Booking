<div id="map_container" style="width: 50%; height: 350px;">MAP</div>

<?php

function viewMap($address)
{
    echo "<div id='address'>Address: $address</div>";
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

<!-- 
    // const apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
    // const radius = 1000;
    // const type = 'restaurant';
    // const url = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$apiKey&location=$lats,$lngs&radius=$radius&type=$type`;

    // fetch(url)
    //     .then(response => response.json())
    //     .then(data => {
    //         const places = data.results;
    //         let results = '';
    //         for (let i = 0; i < places.length; i++) {
    //             let place = places[i];
    //             let name = place.name;
    //             let address = place.vicinity;
    //             let rating = place.rating;
    //             let photos = place.photos;
    //             let photoUrl = '';
    //             if (photos) {
    //                 let photoReference = photos[i].photo_reference;
    //                 photoUrl = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=photoReference&key=$apiKey';
    //             }
    //             results += '{$name} ({address}) ({rating}) <img src=' {
    //                 photoUrl
    //             }
    //             '> <br>';
    //         }
    //         document.getElementById('nearby').innerHTML = results;
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     }); -->






<script>
    /*
    function near(lats, lngs) {

        const apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
        const radius = 1000;
        const type = 'restaurant';
        const url = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=${apiKey}&location=${lat},${lng}&radius=${radius}&type=${type}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const places = data.results;
                let results = "";
                for (let i = 0; i < places.length; i++) {
                    let place = places[i];
                    let name = place.name;
                    let address = place.vicinity;
                    let rating = place.rating;
                    let photos = place.photos;
                    let photoUrl = "";
                    if (photos) {
                        let photoReference = photos[i].photo_reference;
                        photoUrl = `https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${photoReference}&key=${apiKey}`;
                    }
                    results += `${name} (${address}) (${rating}) <img src='${photoUrl}'> <br>`;
                }
                document.getElementById('nearby').innerHTML = results;
            })
            .catch(error => {
                console.error(error);
            });
    } -->






    // function getData(lats, lngs) {
    //     window.$.ajax({
    //         url: "nearby.php",
    //         async: true,
    //         type: "POST",
    //         data: {
    //             lats: lats,
    //             lngs: lngs
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //             const places = data.results;
    //             // create an empty string to store the results
    //             let results = '';
    //             // iterate through the array of places

    //             for (let i = 0; i < places.length; i++) {
    //                 let place = places[i];
    //                 let name = place.name;
    //                 let address = place.vicinity;
    //                 let rating = place.rating;
    //                 let photos = place.photos;
    //                 // let photoUrl = "";
    //                 // if (photos) {
    //                 //     let photoReference = photos[i].photo_reference;
    //                 //     photoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${photoReference}&key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8";
    //                 // }
    //                 results += "${name} (${address}) (${rating}) <img src='${photos}'> <br>";
    //             }
    //             // Select the element where you want to display the results
    //             document.getElementById('nearby').innerHTML = results;
    //             //document.getElementById("rating-value").innerHTML=rating;
    //         }
    //     });
    // }

    // ucsc,colombo, sri lanka
    // University of Colombo,colombo, sri lanka
    // University of kelaniya,Kelaniya, sri lanka
    // University of Moratuwa,Moratuwa, sri lanka
    // University of Peradeniya,Peradeniya, sri lanka
    // University of Ruhuna,Galle, sri lanka
    // University of Jaffna,Jaffna, sri lanka
    // University of Sabaragamuwa,Keppetipola, sri lanka
    // University of Sri Jayewardenepura,Kotte, sri lanka -->
    */
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap"></script> -->