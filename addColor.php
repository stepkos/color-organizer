<?php

    session_start();

    require_once "controllers/addColor.php";

    require_once "templates/head_form.php";
    require_once "templates/header_form.php";
    require_once "templates/mainOpen.php";

?>

<div class="titleOfForm">Add color</div>

<form method="post" action="addColor.php?palette_id=
    <?php

        if(!isset($_GET['palette_id'])) {
            header("Location: index.php");
            exit();
        }
        echo $_GET['palette_id']; 
    
    ?>
">
    
    <input type="text" name="hash" placeholder="hash">

    <?php
        if (isset($_SESSION['incorrect_regex'])) {
            echo '<div class="error">Incorrect color hash!</div>';
            unset($_SESSION['incorrect_regex']);
        }
    ?>

    <input type="submit" value="Add">

</form>


<?php
    require_once "templates/mainClose.php";
    require_once "templates/footer_form.php";
?>