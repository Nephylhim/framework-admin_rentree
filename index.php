<?php
require_once dirname(dirname(dirname(__FILE__))).'/lib/limonade/limonade.php';
dispatch("/", "home.php");
dispatch("/home", "home.php");
?>