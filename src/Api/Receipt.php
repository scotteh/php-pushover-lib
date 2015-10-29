<?php

namespace PushoverLib\Api;

/**
 * Receipt Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class Receipt extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_GET;

    /** @var string */
    protected $receipt = '';

    /**
     * @inherit
     */
    public function getResource() {
        return 'receipts/' . $this->receipt;
    }

    /**
     * Set receipt parameter
     *
     * @param string $receipt
     */
    public function setReceipt($receipt) {
        $this->receipt = $receipt;
    }
}
