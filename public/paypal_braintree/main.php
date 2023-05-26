<?php 
	//require_once("braintree_init.php");
	require_once "lib/Braintree.php";


	$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '6kymhgsxb5f8tgry',
    'publicKey' => 'dptng2rn836c5thw',
    'privateKey' => 'f5f9deb391a23f4a0c8ebe9de2047c05'
	]);

	/*echo $clientToken = $gateway->clientToken()->generate([
    "customerId" => $aCustomerId
]);*/
	
	echo $clientToken = $gateway->clientToken()->generate();

 ?>