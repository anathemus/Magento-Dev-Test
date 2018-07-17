<?php
/**
 * @author William Byrne <wbyrne@razoyo.com>
 * Documentation: https://github.com/razoyo/devtest
 */
require_once __DIR__ . '/raz-lib.php';
require_once __DIR__ . '/dev-lib.php';
// disabled due to FORBIDDEN
$apiWsdl = 'https://www.shopjuniorgolf.com/api/?wsdl';
// $apiWsdl = 'https://www.shopjuniorgolf.com/api/xmlrpc/';
$apiUrl = 'https://www.shopjuniorgolf.com/api/';

$apiUser = 'devtest';
$apiKey = getenv('RAZOYO_TEST_KEY');
$formatKey = 'csv'; // csv, xml, or json
// Connect to SOAP API using PHP's SoapClient class
// Feel free to create your own classes to organize code
$soap = new SoapClient($apiWsdl);
// var_dump($soap);
class SoapLogin
{
    public $session;
    public function login($param, $user, $key) {
        try {
        // create a session by logging into the API
        $session = $param->login($user, $key);
        // $session = startSession();
        return $session;
        }
    catch(Exception $e){
        var_dump($e);
        }

    }
    
}

$soapSession = SoapLogin::login($soap, $apiUser, $apiKey);
// $sessionID = putenv("RAZOYO_SESSION_ID=$session");
// $soapClient = putenv("RAZOYO_SOAP_CLIENT=$soap");
// var_dump($sessionID);
// attempting a session - not logged in to see what 
// resources and methods are available
// $session = $soap->startSession();

// get all the products in an array
// $result = $soap->call($session, array('catalog_product.list'));

// dump them all in the console
// var_dump($result);
// close out the session
// $soap->endSession($session);
$xml = new DOMDocument();
$xml->load('products.xml');
$xmlParser = new XMLParse();
$xmlParser->xmlLoad($xml);
// ...
// You will need to create a FormatFactory.
$factory = new FormatFactory(); 
$format = $factory->create($formatKey);
// var_dump($format);
// See ProductOutput in raz-lib.php for reference
$output = new ProductOutput();
// ...
$output->format();