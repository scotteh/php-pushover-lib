<?php

namespace PushoverLib\Api;

/**
 * Group Delete User Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class GroupDeleteUser extends AbstractApi implements ApiInterface
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
        return 'groups/' . $this->groupKey . '/delete_user';
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
