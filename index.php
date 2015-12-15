<?php
require_once 'lib/limonade.php';

dispatch("/", "home");
dispatch("/home", "home");
dispatch("/admin_files", "files");
dispatch("/admin_datas", "datas");

dispatch_get("/promos/get", "getPromo");//get all promos
dispatch_get("/promos/get/:promo", "getPromo");//get a promo
dispatch_post("/promos/add/:promo/:label", "addPromo");//add a promo
dispatch_post("/promos/del/:promo", "delPromo");//delete a promo
dispatch_post("/promos/upd/:promo/:newLabel", "updPromo");//update promo

dispatch_get("/files/get", "getFile");
dispatch_post("/files/add", "addFile");
dispatch_post("/files/del", "delFile");
dispatch_post("/files/lnk", "lnkFile");
dispatch_post("/files/mv", "mvFile");

dispatch_get("/datas/get", "getData");
dispatch_post("/datas/upd", "updData");
dispatch_get("/datas/xtr", "xtrData");

run();
?>
