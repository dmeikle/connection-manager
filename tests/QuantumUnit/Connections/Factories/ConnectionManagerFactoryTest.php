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


use QuantumUnit\Connections\Clients\LocalhostConnection;
use QuantumUnit\Connections\Factories\ConnectionManagerFactory;
use QuantumUnit\Connections\Managers\ConnectionManager;
use tests\BaseTest;

/**
 * ConnectionManagerFactoryTest
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class ConnectionManagerFactoryTest extends BaseTest
{

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_base_manager__should_return_valid(): void
    {
        $manager = ConnectionManagerFactory::getConnectionManager(__INPUT_PATH . 'valid.yml');

        $this->assertTrue($manager instanceof ConnectionManager);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_localhostconnection__should_return_valid(): void
    {
        $manager = ConnectionManagerFactory::getConnectionManager(__INPUT_PATH . 'valid.yml');
        $localhostConnection = $manager->getConnection('local');
        $this->assertTrue($localhostConnection instanceof LocalhostConnection);
    }

}