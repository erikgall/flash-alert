<?php

namespace EGALL\FlashAlert\Contracts;

/**
 * SessionStore interface contract.
 *
 * @package EGALL\FlashAlert\Contracts
 * @author Erik Galloway <erik@mybarnapp.com>
 */
interface SessionStore
{

    /**
     * Flash an alert message to the session.
     *
     * @param $name
     * @param $data
     * @return mixed
     */
    public function alert($name, $data);
}