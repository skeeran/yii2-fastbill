Yii2 Fastbill
========
<a href="http://www.fastbill.com">Fastbill</a> (Digital invoicing for services and products)


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
``` php

$article = Yii::$app->fastbill->request(array("SERVICE" => "article.get"));

```

This extenion is under development
