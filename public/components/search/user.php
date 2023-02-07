<?php
class SearchUser
{

    public function __construct($usertype = null, $data = null)
    { 
        echo " 
            <div class='row border-rounded-more searchbar fill-container'>
                <div class='display-medium-inline-block  display-none  col-1  '>
                <i data-feather='search'></i>
                </div>

                <div class='col-medium-8 col-11 fill-container'>
                    <input id='searchUser' class=' header-nb border-none fill-container' type='text' list='people'
                        placeholder='Find $usertype users...'>
                </div>

                <div class='display-none display-medium-block  col-3 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more'>Search</button>
                </div>
                <div class='display-medium-none display-block col-1 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more'> <i data-feather='search'></i></button>
                </div>
            </div> 
            <datalist id='people'>";
            foreach ($data as $key => $value) {
                echo "<option data-id='".$value->UserId."' value='". $value->FirstName." ".$value->LastName."' onclick='searchUser(this)'>";
            }
            echo "</datalist>";
    }
}
?>