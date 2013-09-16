php-pushover-lib
================

Allows you interface to with the Pushover.net API using your favourite language ... PHP.

## Reference

The official reference documentation is available at: https://pushover.net/api

## Resource/Class/API Method

### Message

### Sound

### Receipt

### Validate

## Example

``` PHP
<?php

// Autoloader: https://gist.github.com/jwage/221634

$config = array(
    'user' => '<user key>',
    'token' => '<application token>',
);

// Fetch sounds
$sound = new Scotteh\Pushover\Sound($config);
$result = $sound->push();
$sounds = array_keys($result['sounds']);

// Send message
$message = new Scotteh\Pushover\Message($config);
$message->setTitle('My title');
$message->setMessage('My message example!');
$message->setSound($sounds[0]);

$result = $message->push();

var_dump($result);
```