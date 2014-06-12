Yii2 Fastbill
========


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

This extenion is under development
