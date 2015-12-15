<?php
require_once 'lib/limonade.php';

dispatch("/", "home");
dispatch("/home", "home");
dispatch("/admin_files", "files");
dispatch("/admin_datas", "datas");

dispatch_get("/promos/get", "getPromo");
dispatch_get("/promos/add/:promo/:label", "addPromo");
dispatch_delete("/promos/del", "delPromo");
dispatch_post("/promos/upd", "updPromo");

dispatch_get("/files/get", "getFile");
dispatch_put("/files/add", "addFile");
dispatch_delete("/files/del", "delFile");
dispatch_post("/files/lnk", "lnkFile");
dispatch_post("/files/mv", "mvFile");

dispatch_get("/datas/get", "getData");
dispatch_post("/datas/upd", "updData");
dispatch_get("/datas/xtr", "xtrData");

run();
?>
