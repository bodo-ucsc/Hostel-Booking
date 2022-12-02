<?php
$header = new HTMLHeader("Test");
// $nav = new Navigation("home");
// $sidebar = new SideBarNav("user", "admin"); //pass the parameter to set active                  
?>

<?php
$base = BASEURL;

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
    $role = $_SESSION['role'];
}
$active = null;


?>

<main class=' full-width full-height overflow-hidden '>


</main> 

 
<?php
if (isset($data['error'])) {
    $footer = new HTMLFooter($data['error']);
} else {
    $footer = new HTMLFooter();
}
?>