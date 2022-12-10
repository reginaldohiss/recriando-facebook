<?php
require 'environment.php';

define("BASE", "http://localhost/facebook/");

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
} else {
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}
?>