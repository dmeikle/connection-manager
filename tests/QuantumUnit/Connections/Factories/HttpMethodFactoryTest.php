<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
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
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
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