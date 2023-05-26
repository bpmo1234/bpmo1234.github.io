@extends('site_app')

@section('head_title', 'Paytm | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

<?php
$paytmParams = array();

$order_id=time();
$plan_amount=$plan_info->plan_price;
$user_id="CUST_00".Auth::user()->id;

if( getPaymentGatewayInfo(9,'mode') == "live")
{
  $merchant_id=  getPaymentGatewayInfo(9,'paytm_merchant_id');
  $merchant_key= getPaymentGatewayInfo(9,'paytm_merchant_key');

  $websiteName= "DEFAULT";

   $initiate_url= "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=".$merchant_id."&orderId=".$order_id;

   $payment_url= "https://securegw.paytm.in/theia/api/v1/showPaymentPage?mid=".$merchant_id."&orderId=".$order_id;
   
}
else
{
  $merchant_id=  getPaymentGatewayInfo(9,'paytm_merchant_id');
  $merchant_key= getPaymentGatewayInfo(9,'paytm_merchant_key');

  $websiteName= "WEBSTAGING";

  $initiate_url= "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=".$merchant_id."&orderId=".$order_id;

  $payment_url= "https://securegw-stage.paytm.in/theia/api/v1/showPaymentPage?mid=".$merchant_id."&orderId=".$order_id;
}

$paytmParams["body"] = array(
    "requestType"   => "Payment",
    "mid"           => $merchant_id,
    "websiteName"   => $websiteName,
    "orderId"       => $order_id,
    "callbackUrl"   => \URL::to('paytm/success'),
    "txnAmount"     => array(
        "value"     => $plan_amount,
        "currency"  => "INR",
    ),
    "userInfo"      => array(
        "custId"    => $user_id,
    ),
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
 $checksum = \PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $merchant_key);
 
$paytmParams["head"] = array(
"channelId"=> "WEB",
"signature"=> $checksum
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=tHtZsz66965119503536&orderId=".$order_id;

/* for Production */
$url = $initiate_url;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$response = curl_exec($ch);

//print_r($response);exit;

$result=json_decode($response);

$txnToken=$result->body->txnToken;     
?>  
 
 
<div class="vfx-item-ptb vfx-item-info pb-3">
  <div class="container-fluid">
   <div class="row">
 
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

              <center>
                 <h1>{{trans('words.do_not_refresh')}}</h1>
              </center>
              <form method="post" action="{{$payment_url}}" name="paytm">
                 <table border="1">
                    <tbody>
                       <input type="hidden" name="mid" value="<?php echo $merchant_id;?>">
                       <input type="hidden" name="orderId" value="<?php echo $order_id;?>">
                       <input type="hidden" name="txnToken" value="<?php echo $txnToken;?>">
                    </tbody>
                 </table>
                 <script type="text/javascript"> document.paytm.submit(); </script>
              </form>
             
      </div>
    </div>
  </div>
</div>
  
 
@endsection