<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Connections\HttpMethods;


use RestClient;

/**
 * AbstractHttpMethod
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class AbstractHttpMethod
{

    const CREDENTIALS = 'credentials';
    protected $credentials;
    public const HOST = 'host';
    protected $credentialsKey;

    /**
     * @param $credentialsKey
     * @return void
     */
    public function setCredentialsKey($credentialsKey): void
    {
        $this->credentialsKey = $credentialsKey;
    }

    public function setCredentials(array $credentials): void
    {
        $this->credentials = $credentials;
    }

    protected function getClient()
    {
        return new RestClient([
            'base_url' => $this->getHost(),
            'format' => "json",
            // https://dev.twitter.com/docs/auth/application-only-auth
            'headers' => $this->getHeaders(),
        ]);
    }

    protected function getHeaders(): array
    {
        return ['Authorization' => 'Bearer '];//'.OAUTH_BEARER];
    }

    /**
     * @return array
     */
    protected function getHost(): string
    {
        return $this->credentials[self::CREDENTIALS][self::HOST];
    }

    protected function processResponse($response)
    {
        //dd(get_class($response),'response');
//        if($result->info->http_code == 200)
//            var_dump($result->decode_response());
    }
}