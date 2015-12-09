<?php
require_once(dirname(__FILE__)."/../models/model_class_includes.php");

function getPromos(){
	set("promos", Promo::getAllPromos());
	header('Content-Type: application/json');
	return render("promos/getPromo.json.php");
}

?>