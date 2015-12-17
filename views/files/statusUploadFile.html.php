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
			echo "L'envoi du fichier ".$file." à réussi.";
		}
		else
		{
			echo "L'envoi du fichier ".$file." à échoué.";
		}
		?>
	</p>
</body>
</html>