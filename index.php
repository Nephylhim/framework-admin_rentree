<?php
    require_once dirname(__FILE__).'/lib/limonade.php';

    dispatch("/", "home.php");
    dispatch("/home", "home.php");

?>
