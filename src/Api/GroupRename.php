<?php

namespace PushoverLib\Api;

/**
 * Group Rename Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class GroupRename extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /** @inherit */
    protected $parameters = [
        'user',
        'name',
    ];

    /** @var string */
    protected $groupKey = '';

    /**
     * @inherit
     */
    public function getResource() {
        return 'groups/' . $this->groupKey . '/rename';
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
