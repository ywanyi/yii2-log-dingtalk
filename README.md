Yii2 Framework log target implement by DingTalk
============================
Yii2 Framework log DingTalk target ,send log message to your dingtalk group

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ywanyi/yii2-log-dingtalk "*"
```

or add

```
"ywanyi/yii2-log-dingtalk": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
'components' => [
    'log' => [
         'targets' => [
             [
                 'class' => 'ywanyi\log\DingTalkTarget',
                 'token' => 'your token',
                 'levels' => ['error', 'warning'],
                 'atMobiles' => ['13800138000']
             ],
         ],
    ],
],
```