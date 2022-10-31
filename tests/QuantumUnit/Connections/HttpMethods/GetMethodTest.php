<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Tests\QuantumUnit\Connections\HttpMethods;


use QuantumUnit\Connections\HttpMethods\GetHttpMethod;
use QuantumUnit\Connections\HttpMethods\HttpMethod;
use QuantumUnit\Utils\Yaml\YamlLoader;
use tests\BaseTest;

/**
 * GetMethodTest
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class GetMethodTest extends BaseTest
{

    public function test_get__should_return_200(): void
    {
        $credentials = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        $getMethod = new GetHttpMethod();
        $getMethod->setCredentials($credentials['local']);

        $result = $getMethod->execute(new GetHttpMethod(),'http://localhost/', []);
        $this->assertEquals($result->info->http_code, HttpMethod::HTTP_STATUS_SUCCESS);
    }
}