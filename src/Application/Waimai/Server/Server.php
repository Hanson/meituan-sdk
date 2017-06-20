<?php

namespace Hanson\Meituan\Application\Waimai\Server;

use function GuzzleHttp\Psr7\parse_query;
use Hanson\Foundation\Log;
use Hanson\Meituan\Core\Api;

class Server extends Api
{

    /**
     * 监听服务
     *
     * @return array
     */
    public function serve()
    {
        echo json_encode(['data' => 'success']);

        $content = file_get_contents('php://input');

        Log::debug('Get params: '.$content);

        return parse_query($content);
    }
}