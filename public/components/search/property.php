<?php
class Search
{
    public function __construct($filter=null)
    { 
        $base = BASEURL;

        // if($filter==null){
            
        // }else{
        //   if($filter=='true'){
        //     echo " 
        //     <form action='$base/searchProperty' method='POST'>
        //         <div class='row border-rounded-more searchbar '>
        //             <div class='display-small-block  display-none  col-1 '>
        //                 <i data-feather='search'></i>
        //             </div>
            
        //             <div id='search-bar' class='col-small-8 col-10 fill-container'>
        //                 <input id='search-key'  class=' header-nb border-none fill-container' required name='searchText' type='text'
        //                     placeholder='Search Boarding places, Hostels...'>
        //             </div>

        //             <div class='display-none display-small-block  col-3 fill-container'>
        //                 <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
        //             </div>
        //             <div class='display-small-none display-block col-1 fill-container'>
        //             <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
        //         </div>
                    
        //     </div> 
           
        // ";
        // }
   // }
        
       
        echo " 
        <form action='$base/searchProperty' method='POST'>
            <div class='row border-rounded-more searchbar '>
                <div class='display-small-block  display-none  col-1 '>
                    <i data-feather='search'></i>
                </div>
        
                <div id='search-bar' class='col-small-8 col-10 fill-container'>
                    <input id='search-key'  class=' header-nb border-none fill-container' required name='searchText' type='text'
                        placeholder='Search Boarding places, Hostels...'>
                </div>

                <div class='display-none display-small-block  col-3 fill-container'>
                    <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'>Search</button>
                </div>
                <div class='display-small-none display-block col-1 fill-container'>
                <button class='header-nb fill-container border-1 bg-black-hover white-hover border-rounded-more' type='submit' name='submit'><i data-feather='search'></i></button>
            </div>
                
            </div> 
         </from>  
        ";

    }}
?>