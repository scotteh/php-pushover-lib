<?php

namespace Scotteh\Pushover;

class Sound extends Base
{
    protected $method = self::METHOD_GET;

    /**
     * @see Base::getResource()
     */
    public function getResource()
    {
        return 'sounds';
    }

    /**
     * @see Base::getUrl()
     */
    public function getUrl()
    {
        return parent::getUrl() . '?token=' . $this->getToken();
    }
}
