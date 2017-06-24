<?php


namespace Hanson\Meituan\Application\Waimai;


use Hanson\Foundation\Foundation;

/**
 * Class Waimai
 * @package Hanson\Meituan\Application\Waimai
 *
 * @property \Hanson\Meituan\Application\Waimai\Dish\Dish      $dish
 * @property \Hanson\Meituan\Application\Waimai\Order\Order    $order
 * @property \Hanson\Meituan\Application\Waimai\Poi\Poi        $poi
 * @property \Hanson\Meituan\Application\Waimai\Server\Server  $server
 */
class Waimai extends Foundation
{

    protected $providers = [
        Dish\ServiceProvider::class,
        Order\ServiceProvider::class,
        Poi\ServiceProvider::class,
        Server\ServiceProvider::class,
    ];

    public function __construct($accessToken)
    {
        $this['access_token'] = $accessToken;
        $this->registerProviders();
    }
}