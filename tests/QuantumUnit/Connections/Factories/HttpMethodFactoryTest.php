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

namespace tests\QuantumUnit\Connections\Factories;


use QuantumUnit\Connections\Exceptions\InvalidHttpMethodException;
use QuantumUnit\Connections\Exceptions\InvalidKeyException;
use QuantumUnit\Connections\Factories\HttpMethodFactory;
use QuantumUnit\Connections\HttpMethods\DeleteHttpMethod;
use QuantumUnit\Connections\HttpMethods\GetHttpMethod;
use QuantumUnit\Connections\HttpMethods\HttpMethod;
use QuantumUnit\Connections\HttpMethods\PostHttpMethod;
use QuantumUnit\Connections\HttpMethods\PutHttpMethod;
use QuantumUnit\Utils\Yaml\YamlLoader;
use tests\BaseTest;

/**
 * HttpMethodFactoryTest
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
 */
class HttpMethodFactoryTest extends BaseTest
{

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_get_method__should_return_get(): void
    {
        $credentials = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        $method = HttpMethodFactory::getHttpMethod(HttpMethod::GET_METHOD, $credentials);

        $this->assertTrue($method instanceof GetHttpMethod);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_post_method__should_return_post(): void
    {
        $credentials = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        $method = HttpMethodFactory::getHttpMethod(HttpMethod::POST_METHOD, $credentials);

        $this->assertTrue($method instanceof PostHttpMethod);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_delete_method__should_return_delete(): void
    {
        $credentials = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        $method = HttpMethodFactory::getHttpMethod(HttpMethod::DELETE_METHOD, $credentials);

        $this->assertTrue($method instanceof DeleteHttpMethod);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_put_method__should_return_put(): void
    {
        $credentials = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        $method = HttpMethodFactory::getHttpMethod(HttpMethod::PUT_METHOD, $credentials);

        $this->assertTrue($method instanceof PutHttpMethod);
    }

    /**
     * @test
     * @return void
     * @throws InvalidHttpMethodException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_invalid__should_throw_exception(): void
    {
        $this->expectException(InvalidHttpMethodException::class);
        $credentials = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        HttpMethodFactory::getHttpMethod('invalid', $credentials);
    }
}