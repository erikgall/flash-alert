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
     * Alert constructor.
     *
     * @param \EGALL\FlashAlert\Contracts\SessionStore $session
     */
    public function __construct(SessionStore $session)
    {

        $this->session = $session;

    }

    public function error($message)
    {

        $this->message($message, 'danger');

        return $this;
    }

    public function info($message)
    {

        $this->message($message, 'info');

        return $this;

    }

    public function message($message, $level = 'success')
    {

        $this->session->flash('alert.message', $message);
        $this->session->flash('alert.type', $message);

        return $this;

    }

    public function success($message)
    {

        $this->message($message, 'success');

        return $this;

    }

    public function warning($message)
    {

        $this->message($message, 'warning');

        return $this;

    }

}