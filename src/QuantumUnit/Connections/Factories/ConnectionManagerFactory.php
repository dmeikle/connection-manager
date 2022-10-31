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

use QuantumUnit\Connections\Managers\ConnectionManager;
use QuantumUnit\Utils\Yaml\YamlLoader;

/**
 * ConnectionManagerFactory
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
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