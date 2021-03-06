<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo h($title); ?></title> <!--TODO rendre dynamique -->
        <link rel="icon" href="ressources/images/logoCarre_noFond.png" type="image/png"/>

        <link rel='stylesheet' href='css/bootstrap.min.css'>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <?php if(!empty($link)):
            echo $link;
            endif;
        ?>
    </head>
    <body>

        <?php
            echo $body;
        ?>

        <footer>
            <?php if(!empty($footer)):
                echo $footer;
                endif;
            ?>
        </footer>

        <script src='js/jquery-2.1.4.min.js'></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <?php if(!empty($script)):
            echo $script;
            endif;
        ?>
    </body>
</html>
