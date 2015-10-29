<?php

namespace PushoverLib\Api;

/**
 * Api Interface
 *
 * @package PushoverLib
 * @license MIT License
 */
interface ApiInterface {
    /**
     * @param array $config
     * @param array $arguments
     *
     * @return null
     */
    public function __construct($config, $arguments = []);

    /**
     * @return null
     */
    public function getResource();

    /**
     * @return string
     */
    public function getAppToken();

    /**
     * @return string
     */
    public function getUserToken();

    /**
     * @return array
     */
    public function getData();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return null
     */
    public function send();
}
