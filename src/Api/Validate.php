<?php

namespace PushoverLib\Api;

/**
 * Validate Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class Validate extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'device',
    ];

    /**
     * @inherit
     */
    public function getResource() {
        return 'users/validate';
    }
}
