<?php
/**
 * Your code goes here
 */

 // set the API key
$apiPass = 'password';
putenv("RAZOYO_TEST_KEY=$apiPass");

// ---------------------------------------------------------------
// Retrieved products list from using soapUI program. On to parsing!
// ---------------------------------------------------------------
$xml = new DOMDocument();
$xml->load('products.xml');

class XMLParse
{
    public $productArray = array();
    public function xmlLoad($xml) {
        $products = $xml->getElementsByTagName("item");
        foreach ($products as $product) {
            $sku = $product;
            var_dump($sku);
        }
    }
}

// get sessionID and Soap Client
// $sessionID = getenv('RAZOYO_SESSION_ID');
// $soapClient = getenv('RAZOYO_SOAP_CLIENT');

// $result = $soapClient->call($sessionID, array('catalog_product.list'));

//$xml = simplexml_load_file("products.xml") or die ("Error: 
// Cannot create object"); (Whoops, re-read the premise of the exercise)




// var_dump($productItems);
class FormatFactory implements FormatInterface
{
    protected $formatKey;
    public $header;
    
    public function create($key) {
        ProductOutput::setFormat($key);
    }
    
    public function start() {
        
    }
    
    public function formatProduct(array $product) {
        var_dump($format);
    }
    
    public function finish() {
        
    }
}
