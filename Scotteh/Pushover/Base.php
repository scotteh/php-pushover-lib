<?php

namespace Scotteh\Pushover;

abstract class Base
{
    const API_URL = 'https://api.pushover.net/1/';
    const API_FORMAT = 'json';

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    protected $method = self::METHOD_POST;

    /**
     * Set multiple values
     *
     * @param array $opts
     * @return null
     */
    public function __construct(array $opts)
    {
        foreach ($opts as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Set application API token (required)
     *
     * @param array $opts
     * @return null
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get token value
     *
     * @return null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get post data
     *
     * @return null
     */
    public function getData()
    {
        return get_object_vars($this);
    }

    /**
     * Get resource
     *
     * @return null
     */
    abstract public function getResource();

    /**
     * Get complete url to resource
     *
     * @return null
     */
    public function getUrl()
    {
        return self::API_URL . $this->getResource() . '.' . self::API_FORMAT;
    }

    /**
     * Push request to api resource
     *
     * @return mixed
     */
    public function push()
    {
        $opts = array(
            CURLOPT_URL => $this->getUrl(),
            CURLOPT_RETURNTRANSFER => 1,
        );

        if ($this->method == self::METHOD_POST) {
            $opts += array(
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $this->getData(),
            );
        }

        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $result = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (!isset($result['status']) || !$result['status']) {
            throw new Exception(isset($result->errors) ? implode(', ', $result->errors) : '', $http_code);
        }

        return $result;
    }
}
