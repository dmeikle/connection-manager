<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Connections\Clients;


use QuantumUnit\Connections\Factories\HttpMethodFactory;
use RestClient;

/**
 * ClientConnection
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class ClientConnection
{
    protected $credentials;

    protected $code;

    /**
     * @param array $credentials
     */
    public function __construct(array $credentials) {
        $this->credentials = $credentials;
    }

    public function execute(string $method, object $model, string $url, array $params): string
    {
        $httpMethod = HttpMethodFactory::getHttpMethod($method, $this->credentials);
        $result = $httpMethod->execute($model, $url, $params);
        $this->code = $result->info->http_code;

        return $result->response;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}