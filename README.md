Отправка сообщений в чат Telegram
===============================================
Вводим id чата и текст сообщения. Которое отправляется в чат.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist efremovp/simple-telegram-send "*"
```

or add

```
"efremovp/simple-telegram-send": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
use efremovP\telegram\TelegramBot;

$telegram = new TelegramBot('token_bot');

$chat_id = 123456;
$telegram->send('Привет Бот!', $chat_id);
```