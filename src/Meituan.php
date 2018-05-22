<?php


namespace Hanson\Meituan;


use Hanson\Foundation\Foundation;
use Hanson\Meituan\Application;

/**
 * Class Meituan
 * @package Hanson\Meituan
 *
 * @property \Hanson\Meituan\AccessToken\AccessToken    $access_token
 * @property \Hanson\Meituan\Application\Waimai\Waimai  $waimai
 * @property \Hanson\Meituan\Application\Coupon\Coupon  $coupon
 * @property \Hanson\Meituan\Application\Store\Store    $store
 */
class Meituan extends Foundation
{

    protected $providers = [
        AccessToken\ServiceProvider::class,
        Application\Waimai\ServiceProvider::class,
        Application\Coupon\ServiceProvider::class,
        Application\Store\ServiceProvider::class,
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);

        return $this;
    }

}