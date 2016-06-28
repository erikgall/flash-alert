<?php

use Mockery as m;
use EGALL\FlashAlert\Alert;

/**
 * Flash Alert test.
 *
 * @author Erik Galloway <erik@mybarnapp.com>
 */
class AlertTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var string
     */
    protected $session;

    /**
     * @var EGALL\FlashAlert\Alert
     */
    protected $subject;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {

        $this->session = m::mock('EGALL\FlashAlert\Contracts\SessionStore');

        $this->subject = new Alert($this->session);

    }

    /**
     * Tear down the test environment.
     *
     * @return void
     */
    public function tearDown()
    {

        m::close();
    }

    /**
     * Test flashing an autohide interval to the session.
     *
     * @return void
     */
    public function testAutohide()
    {

        $this->session->shouldReceive('alert')->with('alert.interval', 3500);
        $this->subject->autohide(3500);

        $this->session->shouldReceive('alert')->with('alert.interval', 4000);
        $this->subject->autohide(4000);
    }

    /**
     * Test flashing an error message to the session.
     *
     * @return void
     */
    public function testError()
    {

        $this->session->shouldReceive('alert')->with('alert.message', 'Error message.');
        $this->session->shouldReceive('alert')->with('alert.type', 'danger');
        $this->session->shouldReceive('alert')->with('alert.interval', 4000);
        $this->subject->autohide(4000);

        $this->subject->error('Error message.')->autohide(4000);

    }

    /**
     * Test flashing an icon to the session.
     *
     * @return void
     */
    public function testIcon()
    {

        $this->session->shouldReceive('alert')->with('alert.icon', 'fa-bell-o');

        $this->subject->icon('fa-bell-o');

    }


    /**
     * Test flashing an info message.
     *
     * @return void
     */
    public function testInfo()
    {

        $this->session->shouldReceive('alert')->with('alert.message', 'Alert message');
        $this->session->shouldReceive('alert')->with('alert.type', 'info');

        $this->subject->info('Alert message');

    }

    /**
     * Test it receives a flash alert.
     *
     * @return void
     */
    public function testMessage()
    {

        $this->session->shouldReceive('alert')->with('alert.message', 'Message')->once();
        $this->session->shouldReceive('alert')->with('alert.type', 'success')->once();

        $this->subject->success('Message', 'info');

    }
    /**
     * Test it receives a success flash alert.
     *
     * @return void
     */
    public function testSuccess()
    {

        $this->session->shouldReceive('alert')->with('alert.message', 'Success message.')->once();
        $this->session->shouldReceive('alert')->with('alert.type', 'success')->once();

        $this->subject->success('Success message.');

    }

    /**
     * Test flashing a warning message to the session.
     *
     * @return void
     */
    public function testWarning()
    {

        $this->session->shouldReceive('alert')->with('alert.message', 'Warning message.')->once();
        $this->session->shouldReceive('alert')->with('alert.type', 'warning')->once();

        $this->subject->warning('Warning message.');
    }
}