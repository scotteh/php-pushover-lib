<?php

namespace PushoverLib\Api;

/**
 * Receipt Cancel Api
 *
 * @package PushoverLib
 * @license MIT License
 */
class ReceiptCancel extends AbstractApi implements ApiInterface
{
    /** @inherit */
    protected $method = self::METHOD_POST;

    /**
     * @inherit
     */
    public function getResource() {
        return 'receipts/' . $this->receipt . '/cancel';
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
