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

use QuantumUnit\Connections\Managers\ConnectionManager;
use QuantumUnit\Utils\Yaml\YamlLoader;

/**
 * ConnectionManagerFactory
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
 */
class ConnectionManagerFactory
{

    /**
     * @param string $credentialsPath
     * @return ConnectionManager
     * @throws \QuantumUnit\Connections\Exceptions\DefaultKeyMissingException
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public static function getConnectionManager(string $credentialsPath): ConnectionManager
    {
        $credentials = YamlLoader::loadConfig($credentialsPath);

        return new ConnectionManager($credentials);
    }
}