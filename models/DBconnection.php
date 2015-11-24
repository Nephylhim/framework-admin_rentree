<?php
require_once('../config.inc.php');
try {
	$bdd = new PDO('mysql:host='.$project_properties["DB_host"].';dbname='.$project_properties['DB_name'], $project_properties['DB_logon'], $project_properties['DB_pw']);
}
catch (Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>