<?php

namespace PushoverLib\Api;

/**
 * Subscription Migrate Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class SubscriptionMigrate extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'subscription',
        'device_name',
        'sound',
    ];

    /**
     * @inherit
     */
    public function getResource() {
        return 'subscriptions/migrate';
    }
}
