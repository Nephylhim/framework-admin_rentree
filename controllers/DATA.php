<?php
require_once(dirname(__FILE__)."/../models/model_class_includes.php");

function getData()
{
	$id = params("id");

	if($id == null)
	{
		set("datas", Data::getAllDatas());
	}
	else
	{
		set("datas", Data::getDataById($id));
	}

	header('Content-Type: application/json');
	return render("datas/getData.json.php");
}

function xtrData()
{
	$datas = Data::getAllDatas();
	set("datas", $datas);

	$datetime = date('Y-m-d H:i:s');
	set("datetime", $datetime);

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=exportDonneesEleves_'.count($datas).'enregistrements_'.$datetime.'.csv');
	return render("datas/xtrData.csv.php");
}

function updData()
{
	$data = Data::getDataById(params("id"));
	$data->setIdentifiant(params("identifiant"));
	$data->setNomFils(params("nom_fils"));
	$data->setPrenomFils(params("prenom_fils"));
	$data->setDdnFils(params("ddn_fils"));
	$data->setTelMobile(params("tel_mobile"));
	$data->setCourriel(params("courriel"));

	$status = $data->update();

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}

function delData()
{
	$id = params("id");

	if($id == null)
	{
		$status = Data::deleteAllDatas();
	}
	else
	{
		$status = Data::getDataById($id)->delete();
	}

	set("status", $status);

	header('Content-Type: application/json');
	return render("status.json.php");
}