<?php

namespace WyriHaximus\SliFly;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use WyriHaximus\Pimple\FlysystemServiceProviderTrait;

class FlysystemServiceProvider implements ServiceProviderInterface
{
    use FlysystemServiceProviderTrait;

    /**
     * Register this service provider with the Application.
     *
     * @param Container $app Container.
     *
     * @return void
     */
    public function register(Container $app)
    {
        $this->registerFlysystems($app);
    }

    /**
     * Nothing to see here move along.
     *
     * @param Application $app Application.
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }
}
