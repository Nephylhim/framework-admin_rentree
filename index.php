<?php
require_once 'lib/limonade.php';

dispatch("/", "home");
dispatch("/home", "home");


run();
?>
