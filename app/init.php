<?php

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once '../public/components/HtmlComponents/htmlFileHeader.php';
require_once '../public/components/HtmlComponents/htmlFileFooter.php';
require_once '../public/components/HtmlComponents/pagination.php';
require_once '../public/components/navigation.php';
require_once '../public/components/search/property.php';
require_once '../public/components/search/user.php';
require_once '../public/components/sidebarNav.php';
require_once '../public/components/viewCard.php';
require_once '../public/components/propertyCard.php'; 
require_once '../public/components/comment.php';
require_once '../public/components/likeSection.php';
require_once '../public/components/PHPMailer/config.php'; 
require_once '../public/components/map/mapCard.php';
require_once '../public/components/sidebarNavBO.php'; 


function restAPI($urlAppend, $external = null)
{
    if (isset($external)) {
        $url = $urlAppend;
    } else {
        $base = BASEURL;
        $url = "$base/$urlAppend";
    }
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    $result = json_decode($response);
    return $result;
}
?>