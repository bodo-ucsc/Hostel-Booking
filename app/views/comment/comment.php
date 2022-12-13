<?php
$header = new HTMLHeader("Login | Student");
$nav = new Navigation("home");
?>

<?php $postid = $data['postid']; ?>

<main class=" full-width navbar-offset">


    <form action="" method="post">
        <textarea class="  margin-top-1 width-90" rows="4" id="description" name="description"></textarea>
        <br>
        <input type="submit" value="Add comment">
        <?php echo "<input type='hidden' id='postid' name='postid' value=$postid";?>




    </form>
</main>






<?php
    if (isset($data['error'])) {
        $footer = new HTMLFooter($data['error']);
    } else {
        $footer = new HTMLFooter();
    }
    ?>

