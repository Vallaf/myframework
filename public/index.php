<?php
rerequire_DIR_."/../vendor/autoload.php";
use \Core\Request;

$request = Request::createFromGlobals();

var_dump($request);
//var_dump affiche les informations d'une varaible//
die();