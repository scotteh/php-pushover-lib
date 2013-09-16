<?php

namespace Scotteh\Pushover;

class Receipt extends Base
{
    protected $method = self::METHOD_GET;

    /**
     * @see Base::getResource()
     */
    public function getResource()
    {
        return 'receipts/' . $this->receipt;
    }

    /**
     * @see Base::getUrl()
     */
    public function getUrl()
    {
        return parent::getUrl() . '?token=' . $this->getToken();
    }

    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;
    }
}
