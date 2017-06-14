<?php

namespace Hanson\Meituan\Application\Poi;

use Hanson\Meituan\Core\Api;

class Poi extends Api
{

    const OPEN_API = 'http://api.open.cater.meituan.com/waimai/poi/open';
    const CLOSE_API = 'http://api.open.cater.meituan.com/waimai/poi/close';
    const UPDATE_OPEN_TIME_API = 'http://api.open.cater.meituan.com/waimai/poi/updateOpenTime';
    const QUERY_DELAY_DISPATCH_API = 'http://api.open.cater.meituan.com/waimai/poi/queryDelayDispatch';
    const UPDATE_DELAY_DISPATCH_API = 'http://api.open.cater.meituan.com/waimai/poi/updateDelayDispatch';
    const QUERY_INFO_API = 'http://api.open.cater.meituan.com/waimai/poi/queryPoiInfo';
    const QUERY_REVIEW_LIST_API = 'http://api.open.cater.meituan.com/waimai/poi/queryReviewList';

    /**
     * 门店置营业
     *
     * @return array
     */
    public function open()
    {
        return $this->request('post', [self::OPEN_API, []]);
    }

    /**
     * 门店置休息
     *
     * @return array
     */
    public function close()
    {
        return $this->request('post', [self::CLOSE_API, []]);
    }

    /**
     * 修改门店营业时间
     *
     * @param $openTime
     * @return array
     */
    public function updateOpenTime($openTime)
    {
        return $this->request('post', [self::UPDATE_OPEN_TIME_API, ['openTime' => $openTime]]);
    }

    /**
     * 查询门店是否延迟发配送
     *
     * @return array
     */
    public function queryDelayDispatch()
    {
        return $this->request('post', [self::QUERY_DELAY_DISPATCH_API, []]);
    }

    /**
     * 设置延迟发配送时间
     *
     * @param $delaySeconds
     * @return array
     */
    public function updateDelayDispatch($delaySeconds)
    {
        return $this->request('post', [self::UPDATE_DELAY_DISPATCH_API, ['delaySeconds' => $delaySeconds]]);
    }

    /**
     * 查询门店信息
     *
     * @param $ePoiIds
     * @return array
     */
    public function queryPoiInfo($ePoiIds)
    {
        return $this->request('get', [self::QUERY_INFO_API, ['ePoiIds' => $ePoiIds]]);
    }

    /**
     * 查询门店评价信息
     *
     * @param $params
     * @return array
     */
    public function queryReviewList($params)
    {
        return $this->request('get', [self::QUERY_REVIEW_LIST_API, $params]);
    }
}