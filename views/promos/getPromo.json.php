{
	"promos":[
	<?php
	$length = count($promos);
	foreach($promos as $key => $promo)
	{
		echo '{"promo": "'.$promo->getPromo().'", "label":"'.$promo->getLabel().'"}';
		if($key+1 != $length)
		{
			echo ",";
		}
	}
	?>
	]
}