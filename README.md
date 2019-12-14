# carrot-quest-yii2-client

[![Build Status](https://travis-ci.com/alexeevdv/carrot-quest-yii2-client.svg?branch=master)](https://travis-ci.com/alexeevdv/carrot-quest-yii2-client) 
[![codecov](https://codecov.io/gh/alexeevdv/carrot-quest-yii2-client/branch/master/graph/badge.svg)](https://codecov.io/gh/alexeevdv/carrot-quest-yii2-client)
![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg) 
![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)
![PHP 7.3](https://img.shields.io/badge/PHP-7.3-green.svg)
![PHP 7.4](https://img.shields.io/badge/PHP-7.4-green.svg)

Yii2 component for carrot-quest-php-client

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require alexeevdv/carrot-quest-yii2-client "^0.1"
```

or add

```
"alexeevdv/carrot-quest-yii2-client": "^0.1"
```

to the ```require``` section of your `composer.json` file.

## Configuration

```php
[
    'components' => [
        'carrotQuest' => [
            'class' => alexeevdv\yii\CarrotQuest\Client::class,
            'authToken' => 'MY_AUTH_TOKEN',
        ],
    ],
]
```

or

```php
[
    'container' => [
        'singletons' => [
            alexeevdv\CarrotQuest\ClientInterface::class => [
                'class' => alexeevdv\yii\CarrotQuest\Client::class,
                'authToken' => 'MY_AUTH_TOKEN',
            ],
        ],
    ],
]
```


## Usage

```php
Yii::$app->carrotQuest->userSetProperties(777, ['$name' => 'John'], false);
```

### Methods

For the list of available methods see https://github.com/alexeevdv/carrot-quest-php-client
