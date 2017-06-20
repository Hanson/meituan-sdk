<?php


namespace Hanson\Meituan\Application\Waimai\Dish;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['dish'] = function ($pimple) {
            return new Dish($pimple['access_token']);
        };
    }
}