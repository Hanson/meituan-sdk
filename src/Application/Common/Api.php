<?php


namespace Hanson\Meituan\Application\Common;


use Hanson\Foundation\AbstractAPI;
use Hanson\Meituan\AccessToken\AccessToken;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Request;

class Api extends AbstractAPI
{

    /**
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * @var Request
     */
    private $request;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param $method
     * @param array $params
     * @return array
     */
    public function request($method, array $params)
    {
        $http = $this->getHttp();

        $url = $params[0];

        $params = array_merge($params[1], [
            'developerId' => $this->accessToken->getDeveloperId(),
            'signKey' => $this->accessToken->getSignKey(),
        ]);

        $response = call_user_func_array([$http, $method], [$url, $params]);

        print_r($response);

        return json_decode($response, true);
    }

    /**
     * Push guzzle middleware before request.
     *
     * @return mixed
     */
    public function middlewares()
    {
        // TODO: Implement middlewares() method.
    }

    /**
     * Set a global request.
     *
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}