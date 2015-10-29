<?php

namespace PushoverLib\Api;

/**
 * Message Api
 *
 * @package PushoverLib
 * @license MIT License
 */
abstract class AbstractApi
{
    /** @var string */
    const API_URL = 'https://api.pushover.net/1/';

    /** @var string */
    const API_FORMAT = 'json';

    /** @var string */
    const METHOD_GET = 'GET';

    /** @var string */
    const METHOD_POST = 'POST';

    /** @var string */
    protected $method = '';

    /** @var array */
    protected $parameters = [];

    /** @var array */
    protected $data = [];

    /** @var array */
    protected $config = [];

    /**
     * Api constructor
     *
     * @param array $config
     * @param array $arguments
     */
    public function __construct($config, $arguments = []) {
        $this->config = $config;

        foreach ($this->parameters as $name) {
            if (isset($arguments[$name])) {
                $this->data[$name] = $arguments[$name];
            }
        }
    }

    /**
     * Get parameter
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name) {
        if (in_array($name, self::$parameters) && isset($this->data[$name])) {
            return $this->data[$name];
        }
    }

    /**
     * Set parameter
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value) {
        if (in_array($name, self::$parameters)) {
            $this->data[$name] = $value;
        }
    }

    /**
     * Get api resource
     *
     * @return string
     */
    abstract public function getResource();

    /**
     * Get application token
     *
     * @return string
     */
    public function getAppToken() {
        return $this->config['appToken'];
    }

    /**
     * Get user token
     *
     * @return string
     */
    public function getUserToken() {
        return $this->config['userToken'];
    }

    /**
     * Get request data
     *
     * @return array
     */
    public function getData() {
        return array_merge($this->data, [
            'token' => $this->getAppToken(),
            'user' => $this->getUserToken(),
        ]);
    }

    /**
     * Get url to resource
     *
     * @return string
     */
    public function getUrl() {
        $url = self::API_URL . $this->getResource() . '.' . self::API_FORMAT;

        if ($this->method == self::METHOD_GET) {
            $url .= '?token=' . $this->getAppToken();
        }

        return $url;
    }

    /**
     * Send request to API resource
     *
     * @return mixed
     */
    public function send() {
        $opts = [
            CURLOPT_URL => $this->getUrl(),
            CURLOPT_RETURNTRANSFER => 1,
        ];

        if ($this->method == self::METHOD_POST) {
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $this->getData();
        }

        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $result = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (!isset($result['status']) || !$result['status']) {
            throw new \Exception(isset($result->errors) ? implode(', ', $result->errors) : '', $http_code);
        }

        return $result;
    }
}
