<?php
class CashfreeConfig {
    public static $appId = "16830398bc3fba49b7b9beee8b303861";
    public static $secret = "e11d6fd0e84a83ec2e4baa4313f4de9c7b683fee";
    public static $apiVersion = "2022-01-01";

    public static $baseUrl = "https://sandbox.cashfree.com/pg"; //Live https://api.cashfree.com/pg  TESt: https://sandbox.cashfree.com/pg

    public static $returnHost = "http://localhost/cashfree_payment/return.php";

}

function doPost($url, $headers, $data){
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $resp = curl_exec($curl);
    if($resp === false){
        throw new \Exception("Unable to post to cashfree");
    }
    $info = curl_getinfo($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $responseJson = json_decode($resp, true);
    curl_close($curl);
    return array("code" => $httpCode, "data" => $responseJson);
}

function doGet($url, $headers){
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($curl);
    if($resp === false){
        throw new \Exception("Unable to get to cashfree");
    }
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $responseJson = json_decode($resp, true);
    curl_close($curl);
    return array("code" => $httpCode, "data" => $responseJson);
}

?>