<?php
class Searchfriends
{

    public function __construct($usertype = null)
    {
        echo " 
            <div class='row border-rounded-more searchbar fill-container'>
            <div class='display-medium-inline-block  display-none  col-1  '>
               <i data-feather='search'></i>
            </div>

                <div class='col-medium-8 col-9 fill-container'>
                    <input class=' header-nb border-none fill-container' type='text'
                        placeholder='Search $usertype friend list'>
                </div>
              
                <div class='display-medium-none display-block col-1 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more'> <i data-feather='search'></i></button>
                </div>
            </div> 
        ";
    }
}
?>