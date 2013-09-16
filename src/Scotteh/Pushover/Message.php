<?php

namespace Scotteh\Pushover;

class Message extends Base
{
    /**
     * @see Base::getResource()
     */
    public function getResource()
    {
        return 'messages';
    }

    /**
     * Set user/group key (required)
     *
     * User/group key (not e-mail address) of the user.
     *
     * @return null
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Set message (required)
     *
     * @return null
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Set device
     *
     * User's device name to send the message directly to that device,
     * rather than all of the user's devices
     *
     * @return null
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * Set title
     *
     * Message title, if nothing is set the Apps name will be used.
     *
     * @return null
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set url
     *
     * Url to display alongside the message
     *
     * @return null
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Set url title
     *
     * Title for self::setUrl()
     *
     * @return null
     */
    public function setUrlTitle($url)
    {
        $this->url_title = $url_title;
    }


    /**
     * Set message priority
     *
     * By default messages are sent with a priority of 0.
     *
     * Possible values:
     *  -1: Low priority
     *   0: Normal priority
     *   1: High priority
     *   2: Emergency priority
     *
     * @return null
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Set message timestamp
     *
     * Unix timestamp
     *
     * @return null
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * Set notification sound
     *
     * List of values for argument can be obtained via Pushover\Sound()
     *
     * @return null
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
    }
}
