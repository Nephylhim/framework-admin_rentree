<?php
<<<<<<< HEAD
    require_once dirname(__FILE__).'/lib/limonade.php';
=======
require_once dirname(dirname(dirname(__FILE__))).'/lib/limonade/limonade.php';
>>>>>>> framework-admin_rentree/master

dispatch("/", "home.php");
dispatch("/home", "home.php");

?>
