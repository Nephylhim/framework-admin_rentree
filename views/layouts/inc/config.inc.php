<?php
	$project_properties = array(
		 'title'	      => 'Admin rentrée'
		,'CSS_filename'   => '../style/style.css'
		,'charset'        => 'utf-8'
		,'DB_host'        => '127.0.0.1'
		,'DB_port'        => 'not defined'
		,'DB_name'        => 'not defined'
		,'DB_logon'       => 'root'
		,'DB_pw'          => ''
		,'ERROR'          => 'Une erreur (inconnue) est survenue !'
	);

	$project_menu = array(
        array(
			 'item' => 'Accueil'
			,'action' => 'home'
		)
        ,array(
			 'item' => 'Admin Fichiers'
			,'action' => 'admin_files'
		)
		, array(
			 'item' => 'Admin Données'
			,'action' => 'admin_datas'
		)
	);
?>
