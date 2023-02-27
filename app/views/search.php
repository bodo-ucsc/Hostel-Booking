<?php 

if(isset($data['result'])){

    while($row = $data['result']->fetch_assoc()) {
        echo "place id= ".$row['PlaceId']."<br>";
        echo $row['Title']."<br>";
        echo $row['Description']."<br>";
        echo $row['Price']."<br>";
        echo $row['PriceType']."<br>";
        echo $row['Street']."<br>";
        echo $row['CityName']."<br>";
        echo $row['NoOfMembers']."<br>";
        echo $row['NoOfRooms']."<br>";

    }
    

}




?>