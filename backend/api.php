<?php

require '../vendor/autoload.php';
require '../backend/config/db.php';

$app = new \Slim\Slim();

$query = "SELECT * FROM inventario";
$result = mysql_query($query);
$datos = mysql_fetch_array($result);

$GLOBALS['data'] = $datos;

$app->get('/api/test', function () {
	
	 echo json_encode($GLOBALS['data']);

});

$app->run();