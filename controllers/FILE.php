<?php
require_once(dirname(__FILE__)."/../models/model_class_includes.php");

function getFile()
{
	$promo = params("promo");
	$id = params("id");

	if($id == null)
	{
		if($promo == "-1")
		{

			$promo = "";
		}

		set("files", File::getAllDocumentByPromo($promo));
	}
	else
	{
		set("files", File::getDocumentById($id));
	}

	header('Content-Type: application/json');
	return render("files/getFile.json.php");
}

function updFile()
{
	$id = params("id");
	$promo = params("promo");
	$rang = params("rang");
	$libelle = params("libelle");

	$file = File::getDocumentById($id);
	$file->setPromo($promo);
	$file->setRang($rang);
	$file->setLibelle($libelle);
	$status = $file->update();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}