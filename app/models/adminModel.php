<?php

class adminModel extends Model
{
    protected $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function getverificationTeam($page=1, $perPage=1)
    {

        $start=($page-1)*$perPage; 
        $result = $this->get('User,VerificationTeam', 'UserId = VerificationTeamId', null ,"$start,$perPage" );
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        } 
    }


    public function getboardingOwner($page=1, $perPage=1)
    {

        $start=($page-1)*$perPage; 
        $result = $this->get('User,BoardingOwner', 'UserId = BoardingOwnerId', null ,"$start,$perPage" );
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        } 
    }
}