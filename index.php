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
            foreach($pallets as $key => $palette) {
    
                echo '<article>';

                foreach($palette as $color) {
                    echo '
                        <div class="tile" style="background-color: '.$color['color'].';">
                            <a href="deleteColor.php?color_id='.$color['color_id'].'" title="Click to delete">
                                <div class="delTile">x</div>
                            </a>
                            <a title="Click to copy"><div class="hash">'.$color['color'].'</div></a>
                        </div>
                    ';
                }
    
                echo '
                    <a href="addColor.php?palette_id='.$key.'" title="Add color" style="display: block; margin: auto 0;">
                        <div class="tile add">
                            <img src="icons/add.svg" alt="Add">
                        </div>                            
                    </a>

                    <a href="deletePalette.php?palette_id='.$key.'" title="Delete palette">
                        <div class="delete">Delete</div>
                    </a>
    
                    </article>
                ';
            }
        }

    ?>

    <a href="addPalette.php" title="Add pallete">
        <div class="addPalet">
            <img src="icons/add.svg" alt="Add Palet">
        </div>
    </a>

</div>


<?php
    require_once "templates/mainClose.php";
    require_once "templates/footer.php";
?>