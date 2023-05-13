<?php 

error_reporting(E_ERROR | E_PARSE);

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once '../public/components/HtmlComponents/htmlFileHeader.php';
require_once '../public/components/HtmlComponents/htmlFileFooter.php';
require_once '../public/components/HtmlComponents/pagination.php';
require_once '../public/components/navigation.php';
require_once '../public/components/pageFooter.php';
require_once '../public/components/search/property.php';
require_once '../public/components/search/user.php';
require_once '../public/components/sidebarNav.php';
require_once '../public/components/filter.php';
require_once '../public/components/viewCard.php';
require_once '../public/components/propertyCard.php'; 
require_once '../public/components/viewPropertyCard.php'; 
require_once '../public/components/ownerCard.php'; 
require_once '../public/components/comment.php';
require_once '../public/components/likeSection.php';
require_once '../public/components/PHPMailer/config.php'; 
require_once '../public/components/map/mapCard.php';


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
    curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($client);
    $result = json_decode($response);
    return $result;
 
}
?>