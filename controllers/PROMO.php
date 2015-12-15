<?php
require_once(dirname(__FILE__)."/../models/model_class_includes.php");

function getPromo()
{
    $promo = params("promo");
	if ($promo == null)
	{
		set("promos", Promo::getAllPromos());
	}
	else
	{
		set("promos", Promo::getPromoByPromo($promo));
	}

    header('Content-Type: application/json');
    return render("promos/getPromo.json.php");
}

function addPromo()
{
	$promo = params("promo");
	$label = params("label");

	$newPromo = new Promo();
	$newPromo->setPromo($promo);
	$newPromo->setLabel($label);
	$status = $newPromo->create();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}

function delPromo()
{
	$promo = params("promo");

	$promoToDel = Promo::getPromoByPromo($promo);
	$status = $promoToDel->delete();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}

function updPromo()
{
	$promo = params("promo");
	$newLabel = params("newLabel");

	$promoToUpd = Promo::getPromoByPromo($promo);
	$promoToUpd->setLabel($newLabel);
	$status = $promoToUpd->update();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}
?>