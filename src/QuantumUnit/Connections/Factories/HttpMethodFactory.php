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

namespace QuantumUnit\Connections\Factories;


use QuantumUnit\Connections\Exceptions\InvalidHttpMethodException;
use QuantumUnit\Connections\HttpMethods\HttpMethod;
use ReflectionClass;
use QuantumUnit\Connections\HttpMethods\GetHttpMethod;
use QuantumUnit\Connections\HttpMethods\PostHttpMethod;
use QuantumUnit\Connections\HttpMethods\DeleteHttpMethod;
use QuantumUnit\Connections\HttpMethods\PutHttpMethod;
/**
 * HttpMethodFactory
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
 */
class HttpMethodFactory
{
    public const CLASS_PATH = 'QuantumUnit\Connections\HttpMethods\:methodHttpMethod';
    public const METHODS = [
        HttpMethod::DELETE_METHOD,
        HttpMethod::GET_METHOD,
        HttpMethod::POST_METHOD,
        HttpMethod::PUT_METHOD
    ];

    /**
     * @param string $method
     * @param array $params
     * @return HttpMethod
     * @throws InvalidHttpMethodException
     */
    public static function getHttpMethod(string $method, array $credentials): HttpMethod
    {
        if(!in_array($method, self::METHODS)) {
            throw new InvalidHttpMethodException();
        }
        $clazz = strtr(self::CLASS_PATH,
            [
                ':method' => $method
            ]
        );

        $reflection = new ReflectionClass($clazz);

        $obj = $reflection->newInstanceArgs();
        $obj->setCredentials($credentials);

        return $obj;
    }
}