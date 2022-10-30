<?php

/**
 * Elentra ME [https://elentra.org]
 *
 * Copyright 2022 Queen's University or its assignee ("Queen's"). All Rights Reserved.
 *
 * This work is subject to Community Licenses ("CL(s)") between Queen's and its various licensee's,
 * respectively, and may only be viewed, accessed, used, reproduced, compiled, modified, copied or
 * exploited (together "Used") in accordance with a CL. Only Elentra or its licensees and their
 * respective Authorized Developers may Use this work in accordance with a CL. If you are not an
 * Authorized Developer, please contact Elentra Corporation (at info@elentra.com) or its applicable
 * licensee to review the rights and obligations under the applicable CL and become an Authorized
 * Developer before Using this work.
 *
 * @author    Organization: Elentra Corp
 * @author    Developer: David Meikle <dave.meikle@elentra.com>
 * @copyright Copyright 2022 Elentra Corporation. All Rights Reserved.
 */

namespace QuantumUnit\Connections\HttpMethods;


use RestClient;

/**
 * AbstractHttpMethod
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
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