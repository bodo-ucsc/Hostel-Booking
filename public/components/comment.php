<?php

class comment
{
    public function __construct($FirstName, $LastName, $DateTime, $Comment)
    {
        echo "
        <div class='col-11 fill-container'>
            <div class='row no-gap padding-3 bg-white shadow-small border-rounded'>
                <div class='col-12 fill-container left small bold'>
                $FirstName $LastName
                
                </div>
                <div class='col-12 fill-container left padding-bottom-2 '>
                    $Comment
                </div>

                <div class='col-12 fill-container right small grey '>";
                    $timestamp = strtotime($DateTime);
                    echo date("M d, Y h.i A", $timestamp);
        echo "</div>

            </div>
        </div>
        ";
    }
}