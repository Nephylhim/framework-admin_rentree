<?php

function home(){
    set ('title', 'Accueil');
    return html('../views/home/home.html.php', '../views/layouts/base.html.php');
}


?>
