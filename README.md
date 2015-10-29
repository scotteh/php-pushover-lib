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

require('vendor/autoload.php');

$config = array(
);

$po = \PushoverLib\Pushover([
    'userToken' => '<user key>',
    'appToken' => '<application token>',
]);

// Fetch sounds
$result = $po->sound()->send();
$sounds = array_keys($result['sounds']);
var_dump($sounds);

$result = $po->message([
    'html' => 1,
    'title' => 'My example title',
    'message' => 'Example message <b>with some html!</b>',
    'sound' => $sounds[0],
])->send();

var_dump($result);

```