 
Hello hi 

<?php

session_start();

if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
    echo ' <br><a href="welcome/signout">Sign Out</a>  <br>';
} else {
    echo '<br>You are not logged in';
    ?>

    <P>Please Sign In first</P>
    <P><a href="signin/admin">Sign In </a></P>
<?php  
}
 
?>
<br>
<!-- <a href="file1">click</a>  -->
