<?php
require_once(dirname(__FILE__)."/../models/model_class_includes.php");

function addPromo(){
    $promo = params(0);
    $label = params(1);

    set("promos", Promo::setPromo($promo));
    set("promos", Promo::setLabel($label));
	set("promos", Promo::create());
}

?>
