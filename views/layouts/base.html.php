<?php
    require("views/layouts/inc/config.inc.php");
    require("views/layouts/inc/inc_db/db_connect.inc.php");
    //TODO require("modeles");
    require("views/layouts/inc/inc_tools/tools.inc.php");


    $currentPage = get_currentPageName($project_menu);

?>
    <!DOCTYPE HTML>
    <html lang=\"fr\">
        <head>
            <title>Admin Rentrée</title>
            <meta charset='UTF-8'/>
            <link rel='stylesheet' href='style/css/style.css' />
            <link rel='stylesheet' href='style/css/bootstrap.min.css'>
		</head>
		<body>

<?php

    //TODO //-------------- echo $content; --------------//

?>
            <script src='js/jquery-2.1.4.min.js'></script>
        </body>
    </html>

<?php
    require("views/layouts/inc/inc_db/db_close.inc.php");
?>
