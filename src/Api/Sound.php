<?php

namespace PushoverLib\Api;

/**
 * Sound Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class Sound extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_GET;

    /**
     * @inherit
     */
    public function getResource() {
        return 'sounds';
    }
}
