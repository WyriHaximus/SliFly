<?php

namespace WyriHaximus\SliFly;

use League\Flysystem\Filesystem;
use Silex\Application;
use Silex\ServiceProviderInterface;

class FlysystemServiceProvider implements ServiceProviderInterface
{
    /**
     * Register this service provider with the Application.
     *
     * @param Application $app Application.
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app['flysystem.filesystems'] = array();
        $app['flysystems'] = $app->share(function (Application $app) {
            $flysystems = new \Pimple();
            foreach ($app['flysystem.filesystems'] as $alias => $parameters) {
                $flysystems[$alias] = $this->buildFilesystem($parameters);
            }
            return $flysystems;
        });
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

    /**
     * Instantiate an adapter and wrap it in a filesystem.
     *
     * @param array $parameters Array containing the adapter classname and arguments that need to be passed into it.
     *
     * @return Filesystem
     */
    protected function buildFilesystem(array $parameters)
    {
        $adapter = new \ReflectionClass($parameters['adapter']);
        return new Filesystem($adapter->newInstanceArgs($parameters['args']));
    }
}
