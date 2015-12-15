<?php
require_once("model_class_includes.php");
//header('Content-Type: application/json; charset=utf-8');

//$f = (File::getDocumentById(1));
//echo $f->getLibelle();
//echo "  éé@ç";
//echo json_encode(File::getAllDocumentByPromo("CSI_A1"));

$f = File::getDocumentById(100);
$f->setLibelle("fictest");
$f->setPromo("CSI_A1");
$f->setRang("20");
$f->setFichier("blabla.txt");