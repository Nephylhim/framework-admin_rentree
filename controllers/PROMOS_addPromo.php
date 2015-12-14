<?php
require_once(dirname(__FILE__)."/../models/model_class_includes.php");

function addPromo(){
    $promo = params(0);
    $label = params(1);

    $newPromo = new Promo();
    $newPromo->setPromo($promo);
	$newPromo->setLabel($label);
	$status = $newPromo->create();

	set("status", $status);

    return render("status.json.php");
}

?>
