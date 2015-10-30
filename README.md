php-pushover-lib
================

Allows you interface to with the Pushover.net API using your favourite language ... PHP.

## Reference

The official reference documentation is available at: https://pushover.net/api

## Methods

* message()
* receipt()
* receiptCancel()
* sound()
* validate()
* subscriptionMigrate()
* group()
* groupAddUser()
* groupDeleteUser()
* groupDisableUser()
* groupEnableUser()
* groupRename()
* licenseAssign()

## Example

``` PHP
<?php

require('vendor/autoload.php');

$po = \PushoverLib\Pushover([
    'appToken' => '<application token>',
]);

// Fetch sounds
$result = $po->sound()->send();
$sounds = array_keys($result['sounds']);
var_dump($sounds);

$result = $po->message([
    'user' => '<user token>',
    'html' => 1,
    'title' => 'My example title',
    'message' => 'Example message <b>with some html!</b>',
    'sound' => $sounds[0],
])->send();

var_dump($result);

```