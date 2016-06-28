<?php

if (!function_exists('alert')) {

    /**
     * Flash a vuejs alert to the session.
     *
     * @param string|null $message
     * @return \EGALL\FlashAlert\Alert
     */
    function flash($message = null)
    {

        $alert = app('alert');

        if (!is_null($message)) {
            return $alert->info($message);
        }

        return $alert;
    }
}