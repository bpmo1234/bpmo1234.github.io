<?php 
	session_start();
	require_once("vendor/autoload.php");
	// if(file_exists(__DIR__ . "/../.env"));
	// {
	// 	$dotenv= new Dotenv\Dotenv(__DIR__ . "/../");
	// 	$dotenv->load();
	// }

	Braintree_Configuration::environment("sandbox");
	Braintree_Configuration::merchantId("6kymhgsxb5f8tgry");
	Braintree_Configuration::publicKey("dptng2rn836c5thw");
	Braintree_Configuration::privateKey("f5f9deb391a23f4a0c8ebe9de2047c05");
 ?>