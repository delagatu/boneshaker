<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/17/14
 * Time: 11:13 PM
 * To change this template use File | Settings | File Templates.
 */

class BikeFunImport extends CApplicationComponent{

    public $host;

    private function getProductsXML()
    {
//        $params = array('prgname'=>'getxmlproducts');
//        $url = $this->host .'?'. http_build_query($params);
//
//        $ch = curl_init($url);
//        $fp = fopen("allprod" . time() . '.xml', "w");
//
//        curl_setopt($ch, CURLOPT_FILE, $fp);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//
//        curl_exec($ch);
//        curl_close($ch);
//        fclose($fp);

        $allProd = new SimpleXMLElement('new.xml');

        var_dump($allProd);

    }

    public function doXML()
    {
        $this->getProductsXML();
    }

}