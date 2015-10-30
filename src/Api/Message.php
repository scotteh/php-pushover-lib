<?php

namespace PushoverLib\Api;

/**
 * Message Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class Message extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'user',
        'device',
        'title',
        'message',
        'html',
        'timestamp',
        'priority',
        'retry',
        'expire',
        'callback',
        'url',
        'url_title',
        'sound',
    ];

    /**
     * @inherit
     */
    public function getResource() {
        return 'messages';
    }
}
