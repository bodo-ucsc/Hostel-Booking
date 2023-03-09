<?php
class SearchUser
{

    public function __construct($usertype = null)
    { 
        echo " 
            <div class='row border-rounded-more searchbar fill-container'>
                <div class=' col-2 col-medium-1  '>
                <i data-feather='search'></i>
                </div>

                <div class='col-medium-8 col-10 fill-container'>
                    <input id='searchUser' class=' header-nb border-none fill-container' type='text' onkeyup='searchUser()'
                        placeholder='Find $usertype '>
                </div>
 
            </div>";
    }
}
?>