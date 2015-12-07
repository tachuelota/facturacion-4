<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'facturacion';

$conn =  mysql_connect($host, $user, $password) or die('[ERROR]: ' . mysql_error());
mysql_select_db($db_name);

//End of File.