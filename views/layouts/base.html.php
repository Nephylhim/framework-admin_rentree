<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Wololo à rendre dynamique</title> <!--TODO rendre dynamique -->
        <link href="style/css/main.css" rel="stylesheet" type="text/css"/>
        <link rel='stylesheet' href='style/css/bootstrap.min.css'>
        <?php if(!empty($link)):
            echo $link;
            endif;
        ?>
    </head>
    <body>

        <?php
            echo $body;
        ?>

        <script src='js/jquery-2.1.4.min.js'></script>
    </body>
</html>
