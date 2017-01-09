<?php

namespace WyriHaximus\SliFly\Tests;

use Silex\Application;

class FlysystemServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $application = new Application();
        $provider = $this->getMock('WyriHaximus\SliFly\FlysystemServiceProvider', [
            'registerFlysystems',
        ]);

        $provider
            ->expects($this->once())
            ->method('registerFlysystems')
            ->with($application)
        ;

        $provider->register($application);
        $this->assertInstanceOf('Pimple\ServiceProviderInterface', $provider);
    }
}
