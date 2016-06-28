<?php

namespace EGALL\FlashAlert;

use EGALL\FlashAlert\Contracts\SessionStore;

/**
 * Flash Alert
 *
 * @package EGALL\FlashAlert
 * @author Erik Galloway <erik@mybarnapp.com>
 */
class Alert
{

    /**
     * FlashAlert constructor.
     *
     * @param \EGALL\FlashAlert\Contracts\SessionStore $session
     */
    public function __construct(SessionStore $session)
    {

        $this->session = $session;

    }

    /**
     * Set the autohide interval.
     * 
     * @param int $interval
     * @return $this
     */
    public function autohide($interval = 3000)
    {

        $this->session->alert('alert.autohide', $interval);

        return $this;

    }

    /**
     * @param $message
     * @return $this
     */
    public function error($message)
    {

        $this->message($message, 'danger');

        return $this;
    }

    /**
     * @param $icon
     * @return $this
     */
    public function icon($icon)
    {

        $this->session->alert('alert.icon', $icon);

        return $this;

    }

    /**
     * @param $message
     * @return $this
     */
    public function info($message)
    {

        $this->message($message, 'info');

        return $this;

    }

    /**
     * @param $message
     * @param string $level
     * @return $this
     */
    public function message($message, $level = 'success')
    {

        $this->session->alert('alert.message', $message);
        $this->session->alert('alert.type', $level);

        return $this;

    }

    /**
     * @param $message
     * @return $this
     */
    public function success($message)
    {

        $this->message($message, 'success');

        return $this;

    }

    /**
     * @param $message
     * @return $this
     */
    public function warning($message)
    {

        $this->message($message, 'warning');

        return $this;

    }

}