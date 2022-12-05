<?php

class boardingOwnerModel extends model{

    public function __construct()
    {
        parent::__construct();
    }

    public function addABoarding($ownerid, $title, $verifiedStatus, $ubrLink, $summaryL1, $summaryL2, $summaryL3, $description, $price, $priceType, $address, $cityName, $googleMaps, $propertyType, $noofMembers, $currentBoarderCount, $noofRooms, $noofWashRooms, $gender, $boarderType, $sqft, $parking){
        $this->insert('boardingPlace',['OwnerId' => $ownerid, 'Title' => $title, 'VerifiedStatus' => $verifiedStatus, 'UtilityBillReceiptLink' => $ubrLink, 
        'SummaryLine1' => $summaryL1, 'SummaryLine2' => $summaryL2, 'SummaryLine3' => $summaryL3, 'Description' => $description, 
        'Price' => $price, 'PriceType' => $priceType, 'Address' => $address, 'CityName' => $cityName, 'GoogleMap' => $googleMaps, 
        'PropertyType' => $propertyType, 'NoOfMembers' => $noofMembers, 'NoOfRooms' => $noofRooms, 'CurrentBoarderCount' => $currentBoarderCount,
        'NoOfWashRooms' => $noofWashRooms, 'Gender' => $gender, 'BoarderType' => $boarderType, 'SquareFeet' => $sqft, 'Parking' => $parking]);        
    }

    public function viewAllBoarding($userid){
        $this->get('boardingPlace', "'OwnerId' = $userid", null, null );
    }

    public function viewABoarding($placeid){
        $this->get('boardingPlace', "'PlaceId' = $placeid", null, 1);
    }

    public function editABoarding($placeid, $title = null, $verifiedStatus = null, $ubrLink = null, $summaryL1 = null, $summaryL2 = null, $summaryL3 = null, $description = null, $price = null, $priceType = null, $address = null, $cityName = null, $googleMaps = null, $propertyType = null, $noofMembers = null, $noofRooms = null, $noofWashRooms = null, $gender = null, $boarderType = null, $sqft = null, $parking = null){

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
            if(isset($address)){
                $this->update('boardingplace', ['Address' => $address], "'PlaceId' = $placeid");
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

    public function howMany($userid, $where = null)
    {
        $this->numRowsWhere($userid, $where);
    }

}