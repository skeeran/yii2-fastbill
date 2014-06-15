Yii2 Fastbill
========
This is a extension to communicate using Yii2 with Fastbill API <br>
 Works for Api: https://my.fastbill.com/api/1.0/api.php and https://automatic.fastbill.com/api/1.0/api.php<br>
 
<a href="http://www.fastbill.com">Fastbill</a> (Digital invoicing for services and products)<br>
Please check <a href="http://www.fastbill.com/api/">Fastbill-API Dokumentation</a> to findout the structur for a request.



Installation
============

The preferred way to install this extension is through composer.

Either run

``` php
php composer.phar require skeeran/fastbill "*"
```

Configuring
=========

``` php
'components' => [
    .....
    
        'fastbill' =>[
            'class' => 'skeeran\fastbill\Fastbill',
                'apiId' => 'max.mustermann@mail.com',
                'apiKey' => '123ghtzsuuaszzzasuuas', 
                'apiUrl' => 'https://automatic.fastbill.com/api/1.0/api.php',
                'apiDebug' => false,
        ],
        
    ....
]
```

How to use ?
============

Request:
``` php


$article = Yii::$app->fastbill->request(array("SERVICE" => "article.get"));

```

Response: is an array
``` php
$article['RESPONSE']['ARTICLES'];
```
Array will look like this:

``` php
Array
(
    [0] => Array
        (
            [ARTICLE_NUMBER] => 1
            [TITLE] => Free
            [DESCRIPTION] => 
            [TAGS] => 
            [UNIT_PRICE] => 0.0000
            [SETUP_FEE] => 0.0000
            [ALLOW_MULTIPLE] => 0
            [IS_ADDON] => 0
            [CURRENCY_CODE] => EUR
            [VAT_PERCENT] => 19.00
            [SUBSCRIPTION_INTERVAL] => 1 month
            [SUBSCRIPTION_NUMBER_EVENTS] => 0
            [SUBSCRIPTION_TRIAL] => 0
            [SUBSCRIPTION_DURATION] => 0
            [SUBSCRIPTION_DURATION_FOLLOW] => 0
            [SUBSCRIPTION_CANCELLATION] => 0
            [RETURN_URL_SUCCESS] => 
            [RETURN_URL_CANCEL] => 
            [CHECKOUT_URL] => https://automatic.fastbill.com/purchase/.........
        )
)
```
This extenion is under development


Source
======
<a href="https://github.com/Digitalschmiede/fastbill">Digitalschmiede/fastbill</a>


TBD

