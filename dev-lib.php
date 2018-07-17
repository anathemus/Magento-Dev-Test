<?php
/**
 * Your code goes here
 */

 // set the API key
$apiPass = 'ku%64TeYMo5mAIFj8e';
putenv("RAZOYO_TEST_KEY=$apiPass");

// ---------------------------------------------------------------
// Retrieved products list from using soapUI program. On to parsing!
// ---------------------------------------------------------------
$xml = new DOMDocument();
$xml->load('products.xml');
$productArray = array();
// get sessionID and Soap Client
// $sessionID = getenv('RAZOYO_SESSION_ID');
// $soapClient = getenv('RAZOYO_SOAP_CLIENT');

// $result = $soapClient->call($sessionID, array('catalog_product.list'));

$products = $xml->getElementsByTagName("item");

//$xml = simplexml_load_file("products.xml") or die ("Error: 
// Cannot create object"); (Whoops, re-read the premise of the exercise)


foreach ($products as $product) {
    $sku = $product;
    var_dump($sku);
}

// var_dump($productItems);
