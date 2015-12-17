<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<p>
		<?php
		if($status)
		{
			echo "L'envoi du fichier ".$file." à <span style=\"color:green\">réussi.</span>";
		}
		else
		{
			echo "L'envoi du fichier ".$file." à <span style=\"color:red\">échoué.</span>";
		}
		?>
	</p>
</body>
</html>