<?php

class Listing extends Controller
{
public function index($placeId = null)
    {

        if (isset($placeId)) {
            header("Location: " . BASEURL . "/listing/viewPlace/" . $placeId);
        } else {

            $base = BASEURL;
            new HTMLHeader("Listing | Place");
            new Navigation("listing");




            echo "<div class='navbar-offset full-width center'>";

            $data = $this->model('viewModel')->getId('BoardingPlace', 'PlaceId');
            while ($row = $data->fetch_assoc()) {
                new PropertyCard(
                    $row['PlaceId']
                );
            }

            echo "</div>";
            new HTMLFooter();

        }
    }
    public function placeRest($PlaceId = null)
    {
        $data = $this->model('viewModel')->getPlace($PlaceId);
        while ($row = $data->fetch_assoc()) {
            $array['PlaceId'] = $row['PlaceId'];
            $array['SummaryLine1'] = $row['SummaryLine1'];
            $array['SummaryLine2'] = $row['SummaryLine2'];
            $array['SummaryLine3'] = $row['SummaryLine3'];
            $array['Price'] = $row['Price'];
            $array['PriceType'] = $row['PriceType'];
            $array['Street'] = $row['Street'];
            $array['CityName'] = $row['CityName'];
            $array['NoOfMembers'] = $row['NoOfMembers'];
            $array['NoOfRooms'] = $row['NoOfRooms'];
            $array['NoOfWashRooms'] = $row['NoOfWashRooms'];
            $array['Gender'] = $row['Gender'];
            $array['BoarderType'] = $row['BoarderType'];
            $array['SquareFeet'] = $row['SquareFeet'];
            $array['Parking'] = $row['Parking'];
        }
        $json_response = json_encode($array);
        echo $json_response;
        //viewPlace($json['PlaceId']);
    }

    public function viewPlace($PlaceId = null)
    {
        if (isset($PlaceId)) {
            new HTMLHeader("Listing | Place");
            new Navigation("listing");



            echo "<div class='navbar-offset full-width center'>";
            new PropertyCard(
                $PlaceId
            );


            echo "</div>";
            new HTMLFooter();
        }else{
            header("Location: " . BASEURL . "/listing");
        }
    }


}