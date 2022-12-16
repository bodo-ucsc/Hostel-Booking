<?php

class editModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function EditUser($id, $firstname, $lastname, $username, $email, $usertype)
    {
        $this->update('user', ['FirstName' => $firstname, 'LastName' => $lastname, 'Username' => $username, 'UserType' => $usertype, 'Email' => $email], "UserId = '$id'");
    }

    public function updateBoardingOwner($id, $mobile, $dob, $gender, $address, $nic, $occupation, $workplace)
    {
        $this->update('BoardingOwner', ['DateOfBirth' => $dob, 'NIC' => $nic, 'ContactNumber' => $mobile, 'Address' => $address, 'Gender' => $gender, 'Occupation' => $occupation, 'Workplace' => $workplace], "BoardingOwnerId = '$id'");
    }

    public function editAdvertisement($pid, $userid, $placeid, $date, $message)
    {
        $this->update('postupdate', ['UserId' => $userid, 'PlaceId' => $placeid, 'DateTime' => $date, 'Caption' => $message], "PostId = '$pid'");

    }

    public function editABoarding($placeid, $title = null, $ubrLink = null, $summaryL1 = null, $summaryL2 = null, $summaryL3 = null, $description = null, $price = null, $priceType = null, $houseNo = null, $street = null, $cityName = null, $googleMaps = null, $propertyType = null, $noofMembers = null, $noofRooms = null, $noofWashRooms = null, $gender = null, $boarderType = null, $sqft = null, $parking = null)
    {

        if (isset($placeid)) {
            $result = $this->update('boardingplace',[

                'Title' => "$title",
                'SummaryLine1' => "$summaryL1",
                'SummaryLine2' => "$summaryL2",
                'SummaryLine3' => "$summaryL3",
                'Description' => "$description",
                'Price' => $price,
                'PriceType' => "per month",
                'HouseNo' => "$houseNo",
                'Street' => "$street",
                'CityName' => "$cityName",
                'GoogleMap' => "$googleMaps",
                'PropertyType' => "$propertyType",
                'NoOfMembers' => $noofMembers,
                'NoOfRooms' => $noofRooms,
                'NoOfWashRooms' => $noofWashRooms,
                'Gender' => "$gender",
                'BoarderType' => "$boarderType",
                'SquareFeet' => $sqft,
                'Parking' => "$parking"
            ], "PlaceId = $placeid");

            // $sql = "UPDATE SET Title = '$title', SummaryLine1 = '$summaryL1', SummaryLine2 = '$summaryL2', SummaryLine3 = '$summaryL3', Description = '$description', Price = $price, PriceType = 'per month', HouseNo = '$houseNo', Street = '$street', CityName = '$cityName', GoogleMap = '$googleMaps', PropertyType = '$propertyType', NoOfMembers = $noofMembers, NoOfRooms = $noofRooms, NoOfWashRooms = $noofWashRooms, Gender = '$gender', BoarderType = '$boarderType', SquareFeet = $sqft, Parking = '$parking' WHERE PlaceId = $placeid";
            // echo $sql;
            // $result = $this->runQuery($sql);
        }
    }
 
    public function modifyData($table,$data,$condition)
    {
        $result = $this->update($table,$data,$condition);
        return $result;
    }

}