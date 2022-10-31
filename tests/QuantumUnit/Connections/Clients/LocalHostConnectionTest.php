<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Tests\QuantumUnit\Connections\Clients;


use QuantumUnit\Connections\Clients\LocalhostConnection;
use QuantumUnit\Connections\HttpMethods\HttpMethod;
use QuantumUnit\Utils\Yaml\YamlLoader;
use tests\BaseTest;

/**
 * LocalHostConnectionTest
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class LocalHostConnectionTest extends BaseTest
{

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_basic_connection__should_return_connection(): void
    {
        $config = YamlLoader::loadConfig(__INPUT_PATH . 'valid.yml');
        $localConnection = new LocalhostConnection($config['local']);

        $localConnection->execute(HttpMethod::GET_METHOD, $this, '/', []);
        $this->assertEquals($localConnection->getCode(), HttpMethod::HTTP_STATUS_SUCCESS);
    }
}