<?php

namespace PushoverLib\Api;

/**
 * Group Add User Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class GroupAddUser extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'user',
        'device',
        'memo',
    ];

    /** @var string */
    protected $groupKey = '';

    /**
     * @inherit
     */
    public function getResource() {
        return 'groups/' . $this->groupKey . '/add_user';
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
