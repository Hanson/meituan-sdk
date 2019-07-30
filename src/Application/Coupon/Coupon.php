<?php

namespace Hanson\Meituan\Application\Coupon;


use Hanson\Meituan\Application\Waimai\Dish\Dish;
use Hanson\Meituan\Application\Waimai\Order\Order;
use Hanson\Meituan\Application\Waimai\Poi\Poi;
use Hanson\Meituan\Application\Waimai\Server\Server;
use Hanson\Meituan\Core\Api;

/**
 * Class Group
 * @package Hanson\Meituan\Application\Waimai
 *
 * @property Dish      $dish
 * @property Order    $order
 * @property Poi        $poi
 * @property Server  $server
 */
class Coupon extends Api
{

    const API = 'http://api.open.cater.meituan.com/tuangou/coupon/';

    /**
     * 已验券码查询
     *
     * @param $couponCode
     * @return array
     */
    public function queryById($couponCode)
    {
        return $this->request('get', [self::API . 'queryById', ['couponCode' => $couponCode]]);
    }

    /**
     * 验券准备
     *
     * @param $couponCode
     * @return array
     */
    public function prepare($couponCode)
    {
        return $this->request('post', [self::API . 'prepare', ['couponCode' => $couponCode]]);
    }

    /**
     * 执行验券
     *
     * @param array $params
     * @return array
     */
    public function consume(array $params)
    {
        return $this->request('post', [self::API . 'consume', $params]);
    }

    /**
     * 撤销验券
     *
     * @param array $params
     * @return array
     */
    public function cancel(array $params)
    {
        return $this->request('post', [self::API . 'cancel', $params]);
    }

    /**
     * 门店验券历史
     *
     * @param array $params
     * @return array
     */
    public function queryListByDate(array $params)
    {
        return $this->request('get', [self::API . 'queryListByDate', $params]);
    }

    /**
     * 门店本地验券历史
     *
     * @param array $params
     * @return array
     */
    public function queryLocalListByDat(array $params)
    {
        return $this->request('get', [self::API . 'queryLocalListByDat', $params]);
    }

    /**
     * 门店套餐映射接口说明
     *
     * @param $dealStatus
     * @return array
     */
    public function querySetMealList($dealStatus)
    {
        return $this->request('get', [self::API . 'querySetMealList', ['dealStatus' => $dealStatus]]);
    }
}