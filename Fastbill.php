<?php

/** 
 *  	Copyright: DIGITALSCHMIEDE				
 *  	http://www.digitalschmiede.de	
 *		
 *	Released for Yii 2.0
 *      Nakkeeran Sathasivam			
 * 	http://www.sathadev.com
 * 				
 */

namespace skeeran\fastbill;


use yii\base\Component;
use yii\base\InvalidConfigException;


class Fastbill extends Component
{
    public $apiId;     // fastbill apiID is you email
    public $apiKey;    // apiKey you can get from backend of fastbill after you are loged in
    public $apiUrl;    // url of the fastbill api
    public $apiDebug;  // true if you want use it in debug modus else false
    					// https://my.fastbill.com/api/1.0/api.php

    /**
     * Sets up Fastbill confiquration from config file
     * @throws \yii\base\InvalidConfigException
     */
    public function init(){
    	
    	foreach (['apiId','apiKey','apiUrl','apiDebug'] as $attribute) {
            print_r($attribute);

    		if($this->$attribute === null){
    			throw new InvalidConfigException(strtr('"{class}::{attribute}" cannot be empty.',[
    				'{class}' => static::className(),
    				'{attribute}' => '$' .$attribute

    			]));
    		}
    		//\Fastbill_Configuration::$attribute($this->attribute);
    	}
    	parent::init();
    }

    /**
     * Fastbill debug modus
     */
    public function setDebug($bool = false)
    {
        if($bool != '')
        {
            $this->apiDebug = $bool;
        }
        else
        {
            if($this->apiDebug == true) { return array("RESPONSE" => array("ERROR" => array("Übergabeparameter 1 ist leer!"))); }
            else { return false; }
        }
    }

    /**
     * Request transcation or service
     */
    public function request($data, $file = NULL)
    {
        if($data)
        {
            if($this->apiId != '' && $this->apiKey != '' && $this->apiUrl != '')
            {
                $ch = curl_init();

                $data_string = json_encode($data);
                if($file != NULL) { $bodyStr = array("document" => "@".$file, "httpbody" => $data_string); }
                else { $bodyStr = array("httpbody" => $data_string); }

                curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('header' => 'Authorization: Basic ' . base64_encode($this->apiId.':'.$this->apiKey)));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyStr);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            	curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

                $exec = curl_exec($ch);
                $result = json_decode($exec,true);

                curl_close($ch);

                return $result;
            }
            else
            {
                if($this->apiDebug == true) { return array("RESPONSE" => array("ERROR" => array("ApiID and/or APIKey and/or APIURL missing!"))); }
                else { return false; }
            }
        }
        else
        {
            if($this->apiDebug == true) { return array("RESPONSE" => array("ERROR" => array("something is missing!"))); }
            else { return false; }
        }
	}
}

?>
