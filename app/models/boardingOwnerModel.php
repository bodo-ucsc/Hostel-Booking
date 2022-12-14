<?php

class boardingOwnerModel extends model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addABoarding($ownerid, $title, $verifiedStatus, $summaryL1, $summaryL2, $summaryL3, $description, $price, $priceType, $address, $cityName, $googleMaps, $propertyType, $noofMembers, $currentBoarderCount, $noofRooms, $noofWashRooms, $gender, $boarderType, $sqft, $parking)
    {
        $this->insert('boardingPlace', [
            'OwnerId' => $ownerid,
            'Title' => $title,
            'VerifiedStatus' => $verifiedStatus,
            'SummaryLine1' => $summaryL1,
            'SummaryLine2' => $summaryL2,
            'SummaryLine3' => $summaryL3,
            'Description' => $description,
            'Price' => $price,
            'PriceType' => $priceType,
            'Address' => $address,
            'CityName' => $cityName,
            'GoogleMap' => $googleMaps,
            'PropertyType' => $propertyType,
            'NoOfMembers' => $noofMembers,
            'NoOfRooms' => $noofRooms,
            'CurrentBoarderCount' => $currentBoarderCount,
            'NoOfWashRooms' => $noofWashRooms,
            'Gender' => $gender,
            'BoarderType' => $boarderType,
            'SquareFeet' => $sqft,
            'Parking' => $parking
        ]);
    }

    public function viewAllBoarding($userid)
    {
        $result = $this->get('boardingPlace', "OwnerId = $userid");
        return $result;
    }

    public function viewABoarding($placeid)
    {
        $result = $this->get('boardingPlace', "PlaceId = $placeid");
        // $sql = "SELECT * FROM boardingPlace WHERE PlaceId = $placeid LIMIT 1";
        // $result = $this->runQuery($sql);
        return $result;
    }

    public function editABoarding($placeid, $title = null, $ubrLink = null, $summaryL1 = null, $summaryL2 = null, $summaryL3 = null, $description = null, $price = null, $priceType = null, $address = null, $cityName = null, $googleMaps = null, $propertyType = null, $noofMembers = null, $noofRooms = null, $noofWashRooms = null, $gender = null, $boarderType = null, $sqft = null, $parking = null)
    {

        if (isset($placeid)) {
            if (isset($title) && $title != null) {
                //$this->update('boardingplace', ['Title' => $title], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET Title = '$title' WHERE PlaceId = $placeid";
                $result0 = $this->runQuery($sql);
            }
            if (isset($ubrLink) && $ubrLink != null) {
                //                $this->update('boardingplace', ['UtilityBillReceiptLink' => $ubrLink], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET UtilityBillReceiptLink = '$ubrLink' WHERE PlaceId = $placeid";
                $result1 = $this->runQuery($sql);
            }
            if (isset($summaryL1) && $summaryL1 != null) {
                // $this->update('boardingplace', ['SummaryLine1' => $summaryL1], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET SummaryLine1 = '$summaryL1' WHERE PlaceId = $placeid";
                $result2 = $this->runQuery($sql);
            }
            if (isset($summaryL2) && $summaryL2 != null) {
                // $this->update('boardingplace', ['SummaryLine2' => $summaryL2], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET SummaryLine2 = '$summaryL2' WHERE PlaceId = $placeid";
                $result3 = $this->runQuery($sql);
            }
            if (isset($summaryL3) && $summaryL3 != null) {
                // $this->update('boardingplace', ['SummaryLine3' => $summaryL3], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET SummaryLine3 = '$summaryL3' WHERE PlaceId = $placeid";
                $result4 = $this->runQuery($sql);
            }
            if (isset($description) && $description != null) {
                // $this->update('boardingplace', ['Description' => $description], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET 'Description' = '$description' WHERE PlaceId = $placeid";
                $result5 = $this->runQuery($sql);
            }
            if (isset($price) && $price != null) {
                // $this->update('boardingplace', ['Price' => $price], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET Price = $price WHERE PlaceId = $placeid";
                $result6 = $this->runQuery($sql);
            }
            if (isset($priceType) && $priceType != null) {
                // $this->update('boardingplace', ['PriceType' => $priceType], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET PriceType = '$priceType' WHERE 'PlaceId' = $placeid";
                $result7 = $this->runQuery($sql);
            }
            if (isset($address) && $address != null) {
                // $this->update('boardingplace', ['Address' => $address], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET 'Address' => '$address' WHERE PlaceId = $placeid";
                $result8 = $this->runQuery($sql);
            }
            if (isset($cityName) && $cityName != null) {
                // $this->update('boardingplace', ['CityName' => $cityName], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET CityName = '$cityName' WHERE PlaceId = $placeid";
                $result9 = $this->runQuery($sql);
            }
            if (isset($googleMaps) && $googleMaps != null) {
                // $this->update('boardingplace', ['GoogleMap' => $googleMaps], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET GoogleMap = '$googleMaps' WHERE PlaceId = $placeid";
                $result10 = $this->runQuery($sql);
            }
            if (isset($propertyType) && $propertyType != null) {
                // $this->update('boardingplace', ['PropertyType' => $propertyType], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET PropertyType = '$propertyType' WHERE PlaceId = $placeid";
                $result11 = $this->runQuery($sql);
            }
            if (isset($noofMembers) && $noofMembers != null) {
                // $this->update('boardingplace', ['NoOfMembers' => $noofMembers], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET NoOfMembers = $noofMembers WHERE PlaceId = $placeid";
                $result12 = $this->runQuery($sql);
            }
            if (isset($noofRooms) && $noofRooms != null) {
                // $this->update('boardingplace', ['NoOfRooms' => $noofRooms], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET NoOfRooms = $noofRooms WHERE PlaceId = $placeid";
                $result13 = $this->runQuery($sql);
            }
            if (isset($noofWashRooms) && $noofWashRooms != null) {
                // $this->update('boardingplace', ['NoOfWashRooms' => $noofWashRooms], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET NoOfWashRooms = $noofWashRooms WHERE PlaceId = $placeid";
                $result14 = $this->runQuery($sql);
            }
            if (isset($gender) && $gender != null) {
                // $this->update('boardingplace', ['Gender' => $gender], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET Gender = '$gender' WHERE PlaceId = $placeid";
                $result15 = $this->runQuery($sql);
            }
            if (isset($boarderType) && $boarderType != null) {
                // $this->update('boardingplace', ['BoarderType' => $boarderType], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET BoarderType = '$boarderType' WHERE PlaceId = $placeid";
                $result16 = $this->runQuery($sql);
            }
            if (isset($sqft) && $sqft != null) {
                // $this->update('boardingplace', ['SquareFeet' => $sqft], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET SquareFeet = $sqft WHERE PlaceId = $placeid";
                $result17 = $this->runQuery($sql);
            }
            if (isset($parking) && $parking != null) {
                // $this->update('boardingplace', ['Parking' => $parking], "'PlaceId' = $placeid");
                $sql = "UPDATE boardingplace SET Parking => '$parking' WHERE PlaceId = $placeid";
                $result18 = $this->runQuery($sql);
            }
        }
    }

    public function deleteABoarding($placeid)
    {
        // $this->delete('boardingplacepicture', "'PlaceId' = $placeid");
        // $this->delete('boardingplacetenant', "'PlaceId' = $placeid");
        // $this->delete('friendinvite', "'PlaceId' = $placeid");
        // $this->delete('postupdate', "'PlaceId' = $placeid");
        // $this->delete('reviewrating', "'Place' = $placeid");
        // $this->delete('boardingplace', "'PlaceId' = $placeid");

        $sql = "DELETE FROM boardingplacepicture WHERE BoardingPlace = $placeid";
        $result0 = $this->runQuery($sql);
        $sql = "DELETE FROM boardingplacetenant WHERE PlaceId = $placeid";
        $result1 = $this->runQuery($sql);
        $sql = "DELETE FROM friendinvite WHERE PlaceId = $placeid";
        $result2 = $this->runQuery($sql);
        $sql = "DELETE FROM postupdate WHERE PlaceId = $placeid";
        $result3 = $this->runQuery($sql);
        $sql = "DELETE FROM reviewrating WHERE Place = $placeid";
        $result4 = $this->runQuery($sql);
        $sql = "DELETE FROM boardingplace WHERE PlaceId = $placeid";
        $result5 = $this->runQuery($sql);
    }

    public function howMany($table, $where = null)
    {
        //        $this->numRowsWhere($table, $where);
        $sql = "SELECT COUNT(1) FROM $table WHERE $where";
        $result = $this->runQuery($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function userDetails($userid)
    {
        //        $this->get('user', "UserId = $ownerid");
        $sql = "SELECT * FROM user WHERE UserId = $userid";
        $result = $this->runQuery($sql);
        return $result;
    }

    public function boardingImages($placeid)
    {
        // $this->get('boardingplacepicture', "BoardingPlace = $placeid");
        $sql = "SELECT * FROM boardingplacepicture WHERE BoardingPlace = $placeid";
        $result = $this->runQuery($sql);
    }

}