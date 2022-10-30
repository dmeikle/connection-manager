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

namespace Tests\QuantumUnit\Connections\Clients;


use QuantumUnit\Connections\Clients\LocalhostConnection;
use QuantumUnit\Connections\HttpMethods\HttpMethod;
use QuantumUnit\Utils\Yaml\YamlLoader;
use tests\BaseTest;

/**
 * LocalHostConnectionTest
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
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