<?php
require_once 'lib/limonade.php';

dispatch("/", "home");
dispatch("/home", "home");
dispatch("/admin_files", "files");
dispatch("/admin_datas", "datas");
dispatch_get("/promos/get", "getPromos");

run();
?>
