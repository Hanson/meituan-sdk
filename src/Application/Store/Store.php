<?php

namespace Hanson\Meituan\Application\Store;


use function GuzzleHttp\Psr7\parse_query;

class Store extends Api
{

    const STORE_MAP_API = 'https://open-erp.meituan.com/storemap';
    const RELEASE_BINDING_API = 'https://open-erp.meituan.com/releasebinding';

    /**
     * 门店映射接入
     *
     * @param $params
     * @return string
     */
    public function getAuthorizeUrl($params)
    {
        $params['callbackUrl'] = urlencode($params['callbackUrl']);

        $params = array_merge($params, [
            'developerId' => $this->accessToken->getDeveloperId(),
            'signKey' => $this->accessToken->getSignKey(),
        ]);

        return self::STORE_MAP_API.'?'.http_build_query($params);
    }

    /**
     * (新)门店映射接入
     *
     * @param $params
     * @return string
     */
    public function getNewAuthorizeUrl($params)
    {
        $params = array_merge($params, [
            'developerId' => $this->accessToken->getDeveloperId(),
            'timestamp' => time(),
        ]);

        $params['sign'] = $this->accessToken->signature($params);

        return self::STORE_MAP_API.'?'.http_build_query($params);
    }

    /**
     * 跳转至绑定页面.
     *
     * @param $params
     */
    public function authorize($params)
    {
        $url = $this->getAuthorizeUrl($params);

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

    /**
     * 获取解除绑定链接.
     *
     * @param $businessId
     * @return string
     */
    public function getUnbindUrl($businessId)
    {
        $params = [
            'businessId' => $businessId,
            'appAuthToken' => $this->accessToken->getAuthToken(),
            'signKey' => $this->accessToken->getSignKey(),
        ];

        return self::RELEASE_BINDING_API.'?'.http_build_query($params);
    }

    /**
     * (新)获取解除绑定链接.
     *
     * @param $businessId
     * @return string
     */
    public function getNewUnbindUrl($businessId)
    {
        $params = [
            'businessId' => $businessId,
            'appAuthToken' => $this->accessToken->getAuthToken(),
            'timestamp' => time(),
        ];

        $params['sign'] = $this->accessToken->signature($params);

        return self::RELEASE_BINDING_API.'?'.http_build_query($params);
    }

}
