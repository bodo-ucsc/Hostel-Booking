<?php

class ownerCard
{
    public function __construct($value)
    {
        $id= $value->OwnerId;
        $name = $value->Name;
        $count = $value->Count;
        if($count==1){
            $count = $count." Property";
        }else{
            $count = $count." Properties";
        }
        $photo = $value->ProfilePicture;
        if($photo==null){
            $photo = "https://ui-avatars.com/api/?background=288684&color=fff&name=$name";
        }
        else{
            $photo = BASEURL."/$photo";
        } 
        $link = BASEURL."/property/place/$id";

        echo"
        <div class='col-small-6 col-medium-4 col-large-3  col-12 shadow fill-container border-rounded-more overflow-hidden'>
            <img class='fill-container  ' src='https://picsum.photos/200/100.jpg?random=$id' alt=''>
            <div class=' center fill-container margin-top-n4 '>
                <img class='width-100px border-circle shadow' src='$photo' alt=''>
            </div>
        
            <div class='col-12 center fill-container padding-bottom-4'>
                <div class=' padding-vertical-2'>
                    <span>$name</span>
                    <br />
                    <span class='small'>$count</span>
                </div>
                <button class='bg-white-hover border-1 border-rounded-more' onclick='location.href=\"$link\" '
                > View Properties</button>
            </div>
        </div>
        ";
    }
}

?>

