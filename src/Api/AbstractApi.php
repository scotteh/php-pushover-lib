<?php

namespace PushoverLib\Api;

/**
 * Abstract Api
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
     * Get request data
     *
     * @return array
     */
    public function getData() {
        return array_merge([
            'token' => $this->getAppToken(),
        ], $this->data);
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
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (!isset($result['status']) || !$result['status']) {
            throw new \Exception(isset($result['errors']) ? implode(', ', $result['errors']) : '', $httpCode);
        }

        return $result;
    }
}
