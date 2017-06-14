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