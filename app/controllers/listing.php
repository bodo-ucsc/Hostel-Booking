<?php

class Listing extends Controller
{
    public function placeRest($PlaceId=null)
    {
        $data = $this->model('viewModel')->getPlace($PlaceId);
        while ($row = $data->fetch_assoc()) {
            $json['PlaceId'] = $row['PlaceId'];
            $json['SummaryLine1'] = $row['SummaryLine1'];
            $json['SummaryLine2'] = $row['SummaryLine2'];
            $json['SummaryLine3'] = $row['SummaryLine3'];
            $json['Price'] = $row['Price'];
            $json['PriceType'] = $row['PriceType'];
            $json['Street'] = $row['Street'];
            $json['CityName'] = $row['CityName'];
            $json['NoOfMembers'] = $row['NoOfMembers'];
            $json['NoOfRooms'] = $row['NoOfRooms'];
            $json['NoOfWashRooms'] = $row['NoOfWashRooms'];
            $json['Gender'] = $row['Gender'];
            $json['BoarderType'] = $row['BoarderType'];
            $json['SquareFeet'] = $row['SquareFeet'];
            $json['Parking'] = $row['Parking'];
        }
        $json_response = json_encode($json);
        echo $json_response;
        //viewPlace($json['PlaceId']);
    }

    public function viewPlace($PlaceId)
    {
        $base = BASEURL;
        new HTMLHeader("Listing | Place");
        new Navigation("listing");

        

        echo "<div class='navbar-offset full-width center'>";
        new PropertyCard( 
                $PlaceId
        );
 

        echo "</div>";
        new HTMLFooter();
    }


}