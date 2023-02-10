<?php



class FriendSuggestionCard
{
    public function __construct($userid,$firstname,$lastname,$profilePicture=null)
    {
        echo "
        
        <img class=' dp border-blue border-1 border-circle' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$firstname+$lastname' alt='user'>
                        
  
        <h2> $firstname $lastname  </h2>
        <button class=' bg-white border-1 border-black margin-top-3 border-rounded-more'>Add Friend</button>
        
        ";
      

    }
 }