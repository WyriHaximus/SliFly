<?php

namespace WyriHaximus\SliFly;

use League\Flysystem\Filesystem;
use Silex\Application;
use Silex\ServiceProviderInterface;

class FlysystemServiceProvider implements ServiceProviderInterface
{
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

    public function boot(Application $app)
    {
    }

    protected function buildFilesystem($parameters)
    {
        $adapter = new \ReflectionClass($parameters['adapter']);
        return new Filesystem($adapter->newInstanceArgs($parameters['args']));
    }
}
