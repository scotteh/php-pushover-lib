<?php

namespace PushoverLib\Api;

/**
 * License Assign Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class LicenseAssign extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'user',
        'email',
        'os',
    ];

    /**
     * @inherit
     */
    public function getResource() {
        return 'licenses/assign';
    }
}
