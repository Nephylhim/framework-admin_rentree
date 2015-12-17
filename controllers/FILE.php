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

function delFile()
{
	$id = params("id");

	$file = File::getDocumentById($id);
	$status = $file->delete();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}

function addFile()
{
	$promo = params("promo");
	$rang = params("rang");
	$libelle = params("libelle");

	if(!(isset($_FILES["document"]) && $_FILES["document"]["error"] == 0))
	{
		set("status", false);
		header('Content-Type: application/json');
		return render("status.json.php");
	}

	if($promo == "-1")
	{
		$promo = "";
	}

	$file = new File();
	$file->setPromo($promo);
	$file->setRang($rang);
	$file->setLibelle($libelle);
	$file->setFichier($_FILES["document"]["tmp_name"]);
	$file->setFichierOK($_FILES["document"]["name"]);
	$status = $file->create();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}