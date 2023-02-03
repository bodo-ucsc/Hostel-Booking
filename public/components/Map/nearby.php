<?php

$lat = $_POST['lats'];
$lng = $_POST['lngs'];

// Replace YOUR_API_KEY with your actual API key
$apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
// Set the radius (in meters) around the location
$radius = 1000;

// Set the type of place you want to search for (optional)
$type = 'restaurant';

// Send a request to the Places API to search for places
$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$apiKey&location=$lat,$lng&radius=$radius&type=$type";
$response = file_get_contents($url);
// Decode the response and extract the information about the nearby places
$results = json_decode($response, true);

echo json_encode($results);
// //print_r($results);
// $places = array();
// $places = $results['results'];
// print_r($places);
return $results;
    //return $places;

    // // Print the name and address of each place
    // foreach ($places as $place) {
    //     $name = $place['name'];
    //     $address = $place['vicinity'];
    //     echo "$name ($address)<br>";
    // }
