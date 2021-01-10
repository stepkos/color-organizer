<?php

    session_start();

    require_once "controllers/index.php";

    require_once "templates/head.php";
    require_once "templates/header.php";
    require_once "templates/mainOpen.php";

?>

<div class="scrolling">

    <?php 
        if (isset($pallets)) {
            foreach($pallets as $palette) {
    
                echo '<article>';
    
                    foreach($palette as $color) {
                        echo '
                            <div class="tile" style="background-color: '.$color['color'].';">
                                <a href="#" title="Click to delete"><div class="delTile">x</div></a>
                                <a title="Click to copy"><div class="hash">'.$color['color'].'</div></a>
                            </div>
                        ';
                    }
    
                echo '
                    <a href="deletePalette.php?palette_id='.$palette[0]['palette_id'].'" title="Delete palette">
                        <div class="delete">Delete</div>
                    </a>
    
                    </article>
                ';  
            }
        }

    ?>

    <a href="#" title="Add pallete">
        <div class="addPalet">
            <img src="icons/add.svg" alt="Add Palet">
        </div>
    </a>

</div>


<?php
    require_once "templates/mainClose.php";
    require_once "templates/footer.php";
?>