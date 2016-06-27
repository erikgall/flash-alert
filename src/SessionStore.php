<?php

namespace EGALL\FlashAlert;

use EGALL\FlashAlert\Contracts\SessionStore as Contract;
use Illuminate\Session\Store;

class SessionStore implements Contract
{

    /**
     * The laravel session store.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * SessionStore constructor.
     *
     * @param \Illuminate\Session\Store $session
     */
    public function __construct(Store $session)
    {

        $this->session = $session;
    }

    /**
     * Flash an alert message to the session.
     *
     * @param $name
     * @param $data
     * @return mixed
     */
    public function alert($name, $data)
    {

        $this->session->flash($name, $data);
        
    }
}