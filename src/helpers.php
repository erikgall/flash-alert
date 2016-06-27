<?php

if (!function_exists('alert')) {

    /**
     * Flash an alert to the session.
     *
     * @param string|null $message
     * @return \EGALL\FlashAlert\Alert
     */
    function alert($message = null)
    {

        $alert = app('alert');

        if (!is_null($message)) {
            return $alert->info($message);
        }

        return $alert;
    }
}