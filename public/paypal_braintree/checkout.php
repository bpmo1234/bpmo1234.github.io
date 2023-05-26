<?php 
	//require_once("braintree_init.php");
	require_once "lib/Braintree.php";

	/*$nonce=$_POST['nonce'];
	$amount=$_POST['amount'];
	$result=Braintree_Transaction::sale([
		'amount'=>$amount,
		'paymentMethodNonce'=>$nonce,
		'options'=>	[
			'submitForSettlement'=>True
		]
	]);
	echo $result;*/

	$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '6kymhgsxb5f8tgry',
    'publicKey' => 'dptng2rn836c5thw',
    'privateKey' => 'f5f9deb391a23f4a0c8ebe9de2047c05'
	]);

	$result = $gateway->transaction()->sale([
	  'amount' => '1.00',
	  'paymentMethodNonce' => 'f29377ed-6272-0e12-6f75-5d22599ccaae',
	  'options' => [
	    'submitForSettlement' => True
	  ]
	]);

	if ($result->success) {
	  // See $result->transaction for details

		print_r($result->transaction);	

	} else {
	  // Handle errors

	  echo "errors";	
	}
 ?>