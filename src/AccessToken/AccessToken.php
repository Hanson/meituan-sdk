<?php


namespace Hanson\Meituan\AccessToken;


use Hanson\Foundation\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{

    protected $developerId;

    protected $signKey;

    protected $authToken;

    public function __construct($developerId, $signKey)
    {
        $this->developerId = $developerId;
        $this->signKey = $signKey;
    }

    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * 数字签名.
     *
     * @param $params
     * @return string
     */
    public function signature($params)
    {
        $result = $this->getSignKey();

        ksort($params);

        foreach ($params as $key => $param) {
            $result .= $key.$param;
        }

        return strtolower(sha1($result));
    }
    
    /**
     * Get token from remote server.
     *
     * @return mixed
     */
    public function getTokenFromServer()
    {
        // TODO: Implement getTokenFromServer() method.
    }

    /**
     * Throw exception if token is invalid.
     *
     * @param $result
     * @return mixed
     */
    public function checkTokenResponse($result)
    {
        // TODO: Implement checkTokenResponse() method.
    }

    /**
     * @return mixed
     */
    public function getDeveloperId()
    {
        return $this->developerId;
    }

    /**
     * @return mixed
     */
    public function getSignKey()
    {
        return $this->signKey;
    }
}