<?php


namespace Hanson\Meituan;


use Hanson\Foundation\Foundation;
use Hanson\Meituan\Application;

/**
 * Class Meituan
 * @package Hanson\Meituan
 *
 * @property \Hanson\Meituan\Application\Common\Store   $store
 * @property \Hanson\Meituan\AccessToken\AccessToken    $access_token
 * @property \Hanson\Meituan\Application\Dish\Dish      $dish
 * @property \Hanson\Meituan\Application\Order\Order    $order
 * @property \Hanson\Meituan\Application\Poi\Poi        $poi
 * @property \Hanson\Meituan\Application\Server\Server  $server
 */
class Meituan extends Foundation
{

    protected $providers = [
        AccessToken\ServiceProvider::class,
        Application\Common\ServiceProvider::class,
        Application\Dish\ServiceProvider::class,
        Application\Order\ServiceProvider::class,
        Application\Poi\ServiceProvider::class,
        Application\Server\ServiceProvider::class,
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);

        return $this;
    }

}