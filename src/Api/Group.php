<?php

namespace PushoverLib\Api;

/**
 * Group Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class Group extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_GET;

    /** @var string */
    protected $groupKey = '';

    /**
     * @inherit
     */
    public function getResource() {
        return 'groups/' . $this->groupKey;
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
