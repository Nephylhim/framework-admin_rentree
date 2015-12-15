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