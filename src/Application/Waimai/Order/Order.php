<?php

namespace Hanson\Meituan\Application\Waimai\Order;

use Hanson\Meituan\Core\Api;

class Order extends Api
{

    const QUERY_BY_ID_API = 'http://api.open.cater.meituan.com/waimai/order/queryById';
    const QUERY_BY_DAY_API = 'http://api.open.cater.meituan.com/waimai/order/queryByDaySeq';
    const CONFIRM_API = 'http://api.open.cater.meituan.com/waimai/order/confirm';
    const CANCEL_API = 'http://api.open.cater.meituan.com/waimai/order/cancel';
    const DELIVERING_API = 'http://api.open.cater.meituan.com/waimai/order/delivering';
    const DELIVERED_API = 'http://api.open.cater.meituan.com/waimai/order/delivered';
    const QUERY_ZB_SHIPPING_FEE_API = 'http://api.open.cater.meituan.com/waimai/order/queryZbShippingFee';
    const PREPARE_DISPATCH_API = 'http://api.open.cater.meituan.com/waimai/order/prepareZbDispatch';
    const UPDATE_DISPATCH_TIP_API = 'http://api.open.cater.meituan.com/waimai/order/updateZbDispatchTip';
    const CONFIRM_DISPATCH_API = 'http://api.open.cater.meituan.com/waimai/order/confirmZbDispatch';
    const DISPATCH_SHIP_API = 'http://api.open.cater.meituan.com/waimai/order/dispatchShip';
    const CANCEL_DISPATCH_API = 'http://api.open.cater.meituan.com/waimai/order/cancelDispatch';
    const AGREE_REFUND_API = 'http://api.open.cater.meituan.com/waimai/order/agreeRefund';
    const REJECT_REFUND_API = 'http://api.open.cater.meituan.com/waimai/order/rejectRefund';
    const QUERY_BY_EPOIDS_API = 'http://api.open.cater.meituan.com/waimai/order/queryByEpoids';
    const BATCH_PULL_PHONE_NUMBER_API = 'http://api.open.cater.meituan.com/waimai/order/batchPullPhoneNumber';

    /**
     * 根据订单Id查询订单
     *
     * @param $orderId
     * @return array
     */
    public function queryById($orderId)
    {
        return $this->request('get', [self::QUERY_BY_ID_API, ['orderId' => $orderId]]);
    }

    /**
     * 根据流水号查询订单
     *
     * @param $params
     * @return array
     */
    public function queryByDaySeq($params)
    {
        return $this->request('get', [self::QUERY_BY_DAY_API, $params]);
    }

    /**
     * 商家确认接单
     *
     * @param $orderId
     * @return array
     */
    public function confirm($orderId)
    {
        return $this->request('post', [self::CONFIRM_API, ['orderId' => $orderId]]);
    }

    /**
     * 商家取消订单
     *
     * @param $params
     * @return array
     */
    public function cancel($params)
    {
        return $this->request('post', [self::CANCEL_API, $params]);
    }

    /**
     * 自配送场景－发配送
     *
     * @param $params
     * @return array
     */
    public function delivering($params)
    {
        return $this->request('post', [self::DELIVERING_API, $params]);
    }

    /**
     * 自配送场景－订单已送达
     *
     * @param $orderId
     * @return array
     */
    public function delivered($orderId)
    {
        return $this->request('post', [self::DELIVERED_API, ['orderId' => $orderId]]);
    }

    /**
     * 众包配送场景－查询配送费
     *
     * @param $orderIds
     * @return array
     */
    public function queryZbShippingFee($orderIds)
    {
        return $this->request('get', [self::QUERY_ZB_SHIPPING_FEE_API, ['orderIds' => $orderIds]]);
    }

    /**
     * 众包配送场景－预下单
     *
     * @param $params
     * @return array
     */
    public function prepareZbDispatch($params)
    {
        return $this->request('post', [self::PREPARE_DISPATCH_API, $params]);
    }

    /**
     * 众包配送场景－配送单加小费
     *
     * @param $params
     * @return array
     */
    public function updateZbDispatchTip($params)
    {
        return $this->request('post', [self::UPDATE_DISPATCH_TIP_API, $params]);
    }

    /**
     * 众包配送场景－确认下单
     *
     * @param $params
     * @return array
     */
    public function confirmZbDispatch($params)
    {
        return $this->request('post', [self::CONFIRM_DISPATCH_API, $params]);
    }

    /**
     * 美团专送场景－发配送
     *
     * @param $orderId
     * @return array
     */
    public function dispatchShip($orderId)
    {
        return $this->request('post', [self::DISPATCH_SHIP_API, ['orderId' => $orderId]]);
    }

    /**
     * 取消美团配送（除自配送场景）
     *
     * @param $orderId
     * @return array
     */
    public function cancelDispatch($orderId)
    {
        return $this->request('post', [self::CANCEL_DISPATCH_API, ['orderId' => $orderId]]);
    }

    /**
     * 订单同意退款
     *
     * @param $params
     * @return array
     */
    public function agreeRefund($params)
    {
        return $this->request('post', [self::AGREE_REFUND_API, $params]);
    }

    /**
     * 订单拒绝退款
     *
     * @param $params
     * @return array
     */
    public function rejectRefund($params)
    {
        return $this->request('post', [self::REJECT_REFUND_API, $params]);
    }

    /**
     * 查询待确认订单号列表
     *
     * @param $epoiIds
     * @return array
     */
    public function queryByEpoids($epoiIds)
    {
        return $this->request('post', [self::QUERY_BY_EPOIDS_API, ['epoiIds' => $epoiIds]]);
    }

    /**
     * 隐私号-批量拉取手机号
     *
     * @param $offset
     * @param int $limit
     * @return array
     */
    public function batchPullPhoneNumber($offset, $limit = 1000)
    {
        return $this->request('post', [self::BATCH_PULL_PHONE_NUMBER_API, ['degradOffset' => $offset, 'degradLimit' => $limit]]);
    }

}
