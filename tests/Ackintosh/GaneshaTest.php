<?php
namespace Ackintosh;

class GaneshaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function recordsFailureAndTrips()
    {
        $ganesha = new Ganesha(2);
        $this->assertFalse($ganesha->isClosed());

        $ganesha->recordFailure();
        $ganesha->recordFailure();
        $this->assertTrue($ganesha->isClosed());
    }

    /**
     * @test
     */
    public function recordsSuccessAndClose()
    {
        $ganesha = new Ganesha(2);
        $ganesha->recordFailure();
        $ganesha->recordFailure();
        $this->assertTrue($ganesha->isClosed());

        $ganesha->recordSuccess();
        $this->assertFalse($ganesha->isClosed());
    }
}
