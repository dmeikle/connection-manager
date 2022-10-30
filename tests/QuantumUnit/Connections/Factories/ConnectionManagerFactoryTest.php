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


use QuantumUnit\Connections\Clients\LocalhostConnection;
use QuantumUnit\Connections\Factories\ConnectionManagerFactory;
use QuantumUnit\Connections\Managers\ConnectionManager;
use tests\BaseTest;

/**
 * ConnectionManagerFactoryTest
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
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