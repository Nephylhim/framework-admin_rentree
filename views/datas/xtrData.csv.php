<?php
echo "id,identifiant,nom_fils,prenom_fils,ddn_fils,tel_mobile,courriel,date,ip\n";

function quote($str, $comma = true)
{
	$str = '"'.$str.'"';
	if($comma)
	{
		$str.=",";
	}
	return $str;
}

foreach($datas as $key => $data)
{
	echo quote($data->getId()).quote($data->getIdentifiant()).quote($data->getNomFils()).
		quote($data->getPrenomFils()).quote($data->getDdnFils()).quote($data->getTelMobile()).
		quote($data->getCourriel()).quote($data->getDate()).quote($data->getIp(), false)."\n";
}