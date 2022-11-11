<?php
session_start();
?>

<?php if (!isset($_SESSION['username'])): ?>
<a href="signup.php">
    <li>Sign Up</li>
</a>
<a href="login.php">
    <li>Login</li>
</a>
<?php else: ?>
<a href="./Users.php?q=logout">
    <li>Logout</li>
</a>
<?php endif; ?>
<h1 id="index-text">Welcome,
    <?php if (isset($_SESSION['username'])) {
        echo explode(" ", $_SESSION['usersName'])[0];
    } else {
        echo 'Guest';
    }
    ?>
</h1>