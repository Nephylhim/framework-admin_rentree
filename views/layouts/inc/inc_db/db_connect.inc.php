<?php
	$db = mysqli_connect($project_properties['DB_host'], $project_properties['DB_logon'], $project_properties['DB_pw'], $project_properties['DB_name']);

	if ($db === false) {
		$error_message = array(
							"ERREUR !<br />"
							,"Impossible de se connecter à la base de donnée.<br />"
							,"Erreur de connexion (".mysqli_connect_errno()."<br />)"
							,mysqli_connect_error()."<br />");
	}
?>
