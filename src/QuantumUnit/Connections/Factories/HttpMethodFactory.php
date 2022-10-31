<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
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
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
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