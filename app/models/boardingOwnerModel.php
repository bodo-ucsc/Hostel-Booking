<?php

class boardingOwnerModel extends model{

    public function __construct()
    {
        parent::__construct();
    }

    public function addABoarding($ownerid, $title, $verifiedStatus, $ubrLink, $summaryL1, $summaryL2, $summaryL3, $description, $price, $priceType, $houseNo, $street, $cityName, $googleMaps, $propertyType, $noofMembers, $noofRooms, $noofWashRooms, $gender, $boarderType, $sqft, $parking){
        $this->insert('boardingPlace',['OwnerId' => $ownerid, 'Title' => $title, 'VerifiedStatus' => $verifiedStatus, 'UtilityBillReceiptLink' => $ubrLink, 
        'SummaryLine1' => $summaryL1, 'SummaryLine2' => $summaryL2, 'SummaryLine3' => $summaryL3, 'Description' => $description, 
        'Price' => $price, 'PriceType' => $priceType, 'HouseNo' => $houseNo, 'Street' => $street, 'CityName' => $cityName, 'GoogleMap' => $googleMaps, 
        'PropertyType' => $propertyType, 'NoOfMembers' => $noofMembers, 'NoOfRooms' => $noofRooms, 
        'NoOfWashRooms' => $noofWashRooms, 'Gender' => $gender, 'BoarderType' => $boarderType, 'SquareFeet' => $sqft, 'Parking' => $parking]);        
    }

    public function viewAllBoarding($userid){
        $this->get('boardingPlace', "'OwnerId' = $userid", );
    }

    public function viewABoarding($placeid){
        $this->get('boardingPlace', "'PlaceId' = $placeid", null, 1);
    }

    public function editABoarding($placeid, $title, $verifiedStatus, $ubrLink, $summaryL1, $summaryL2, $summaryL3, $description, $price, $priceType, $houseNo, $street, $cityName, $googleMaps, $propertyType, $noofMembers, $noofRooms, $noofWashRooms, $gender, $boarderType, $sqft, $parking){

        if(isset($placeid)){
            if(isset($title)){
                $this->update('boardingplace', ['Title' => $title], "'PlaceId' = $placeid");
            }
            if(isset($verifiedStatus)){
                $this->update('boardingplace', ['VerifiedStatus' => $verifiedStatus], "'PlaceId' = $placeid");
            }
            if(isset($ubrLink)){
                $this->update('boardingplace', ['UtilityBillReceiptLink' => $ubrLink], "'PlaceId' = $placeid");
            }
            if(isset($summaryL1)){
                $this->update('boardingplace', ['SummaryLine1' => $summaryL1], "'PlaceId' = $placeid");
            }
            if(isset($summaryL2)){
                $this->update('boardingplace', ['SummaryLine2' => $summaryL3], "'PlaceId' = $placeid");
            }
            if(isset($summaryL3)){
                $this->update('boardingplace', ['SummaryLine3' => $summaryL3], "'PlaceId' = $placeid");
            }
            if(isset($description)){
                $this->update('boardingplace', ['Description' => $description], "'PlaceId' = $placeid");
            }
            if(isset($price)){
                $this->update('boardingplace', ['Price' => $price], "'PlaceId' = $placeid");
            }
            if(isset($priceType)){
                $this->update('boardingplace', ['PriceType' => $priceType], "'PlaceId' = $placeid");
            }
            if(isset($houseNo)){
                $this->update('boardingplace', ['HouseNo' => $houseNo], "'PlaceId' = $placeid");
            }
            if(isset($street)){
                $this->update('boardingplace', ['Street' => $street], "'PlaceId' = $placeid");
            }
            if(isset($cityName)){
                $this->update('boardingplace', ['CityName' => $cityName], "'PlaceId' = $placeid");
            }
            if(isset($googleMaps)){
                $this->update('boardingplace', ['GoogleMap' => $googleMaps], "'PlaceId' = $placeid");
            }
            if(isset($propertyType)){
                $this->update('boardingplace', ['PropertyType' => $propertyType], "'PlaceId' = $placeid");
            }
            if(isset($noofMembers)){
                $this->update('boardingplace', ['NoOfMembers' => $noofMembers], "'PlaceId' = $placeid");
            }
            if(isset($noofRooms)){
                $this->update('boardingplace', ['NoOfRooms' => $noofRooms], "'PlaceId' = $placeid");
            }
            if(isset($noofWashRooms)){
                $this->update('boardingplace', ['NoOfWashRooms' => $noofWashRooms], "'PlaceId' = $placeid");
            }
            if(isset($gender)){
                $this->update('boardingplace', ['Gender' => $gender], "'PlaceId' = $placeid");
            }
            if(isset($boarderType)){
                $this->update('boardingplace', ['BoarderType' => $boarderType], "'PlaceId' = $placeid");
            }
            if(isset($sqft)){
                $this->update('boardingplace', ['SquareFeet' => $sqft], "'PlaceId' = $placeid");
            }
            if(isset($parking)){
                $this->update('boardingplace', ['Parking' => $parking], "'PlaceId' = $placeid");
            }
        }
    }

    public function deleteABoarding($placeid){
        $this->delete('boardingplacepicture', "'PlaceId' = $placeid");
        $this->delete('boardingplacetenant', "'PlaceId' = $placeid");
        $this->delete('friendinvite', "'PlaceId' = $placeid");
        $this->delete('postupdate', "'PlaceId' = $placeid");
        $this->delete('reviewrating', "'Place' = $placeid");
        $this->delete('postupdate', "'PlaceId' = $placeid");
        $this->delete('boardingplace', "'PlaceId' = $placeid");
    }

}