<?php

namespace PushoverLib\Api;

/**
 * Group Enable User Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class GroupEnableUser extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'user',
    ];

    /** @var string */
    protected $groupKey = '';

    /**
     * @inherit
     */
    public function getResource() {
        return 'groups/' . $this->groupKey . '/enable_user';
    }

    /**
     * Set group key
     *
     * @param string $groupKey
     *
     * @return self
     */
    public function setGroupKey($groupKey) {
        $this->groupKey = $groupKey;

        return $this;
    }
}
