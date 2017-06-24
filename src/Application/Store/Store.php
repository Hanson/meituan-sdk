<?php

namespace Hanson\Meituan\Application\Store;


use function GuzzleHttp\Psr7\parse_query;

class Store extends Api
{

    const STORE_MAP_API = 'https://open-erp.meituan.com/storemap';

    /**
     * 门店映射接入
     *
     * @param $params
     * @return string
     */
    public function getMapUrl($params)
    {
        $params['callbackUrl'] = urlencode($params['callbackUrl']);

        $params = array_merge($params, [
            'developerId' => $this->accessToken->getDeveloperId(),
            'signKey' => $this->accessToken->getSignKey(),
        ]);

        return self::STORE_MAP_API.'?'.http_build_query($params);
    }

    /**
     * 跳转至绑定页面.
     *
     * @param $params
     */
    public function toMap($params)
    {
        $url = $this->getMapUrl($params);

        header('Location:'.$url);
    }

    /**
     * 门店映射回调
     *
     * @return array
     */
    public function callback()
    {
        $content = file_get_contents('php://input');

        return parse_query($content);
    }

}