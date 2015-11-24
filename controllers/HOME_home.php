<?php

function home(){
    set ('title', 'Documents de rentrée');
    return html('../views/home/home.html.php', '../views/layouts/base.html.php');
}


?>
