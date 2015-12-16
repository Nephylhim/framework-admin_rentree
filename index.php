<?php
require_once 'lib/limonade.php';

dispatch("/", "home");
dispatch("/home", "home");
dispatch("/admin_files", "files");
dispatch("/admin_datas", "datas");
dispatch_get("/upload", "getUploadPage");//get uploading page

dispatch_get("/promos/get", "getPromo");//get all promos
dispatch_get("/promos/get/:promo", "getPromo");//get a promo
dispatch_post("/promos/add/:promo/:label", "addPromo");//add a promo
dispatch_post("/promos/del/:promo", "delPromo");//delete a promo
dispatch_post("/promos/upd/:promo/:newLabel", "updPromo");//update promo

dispatch_get("/files/get/:id", "getFile");//get file
dispatch_get("/files/get/promo/:promo", "getFile");//get files associated with promo
dispatch_post("/files/add/:promo/:rang/:libelle", "addFile");//add a file
dispatch_post("/files/del/:id", "delFile");//delete a file
dispatch_post("/files/upd/:id/:promo/:rang/:libelle", "updFile");//upd file

dispatch_get("/datas/get/all", "getData");//gat all data
dispatch_get("/datas/get/:id", "getData");//get a data
dispatch_get("/datas/xtr", "xtrData");//export datas
dispatch_post("/datas/upd/:id/:identifiant/:nom_fils/:prenom_fils/:ddn_fils/:tel_mobile/:courriel", "updData");//update data
dispatch_post("/datas/del/all", "delData");//delete all datas
dispatch_post("/datas/del/:id", "delData");//delete one data

run();
?>
