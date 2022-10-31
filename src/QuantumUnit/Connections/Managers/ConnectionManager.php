<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Connections\Managers;


use QuantumUnit\Connections\Clients\ClientConnection;
use QuantumUnit\Connections\Exceptions\DefaultKeyMissingException;
use QuantumUnit\Connections\Exceptions\InvalidKeyException;

/**
 * ConnectionManager
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class ConnectionManager
{
    
    public const DEFAULT_CONNECTION_NAME = 'default';
    public const CLASSNAME = 'class';
    public const CREDENTIALS = 'credentials';

    private $connections = array();
    private $defaultConnection = null;
    private $config;

    /**
     * @param array $credentialsConfig
     * @throws DefaultKeyMissingException
     */
    public function __construct(array $credentialsConfig) {
        $this->config = $credentialsConfig;
        $this->setDefaultConnection();
    }

    /**
     * destructor
     */
    public function __destruct() {
        $this->defaultConnection = null;
        $this->connections = null;
    }

    /**
     * @return void
     * @throws DefaultKeyMissingException
     */
    private function setDefaultConnection(): void {
        if (!array_key_exists(self::DEFAULT_CONNECTION_NAME, $this->config)) {
            throw new DefaultKeyMissingException();
        }

        $this->defaultConnection = $this->config[self::DEFAULT_CONNECTION_NAME];
    }


    /**
     * @param string|null $key
     * @return ClientConnection
     * @throws InvalidKeyException
     */
    public function getConnection(string $key = null): ClientConnection {
//        if(is_array($dbKey)) {
//            $dbKey = $dbKey['entity_db'];
//        }
        if (is_null($key)) {
            if (is_null($this->defaultConnection)) {
                throw new InvalidKeyException('key not passed and no default key specified in entity manager');
            }

            $key = $this->defaultConnection;
        }

        if (!array_key_exists($key, $this->config)) {
            throw new InvalidKeyException('key ' . $key . ' does not exist in connectionmanager collection');
        }

        return $this->_getConnection($key);
    }

    /**
     * @param string $key
     * @return ClientConnection
     */
    private function _getConnection(string $key): ClientConnection {
        if (!array_key_exists($key, $this->connections) || !is_object($this->connections[$key])) {
            $dbClass = $this->config[$key][self::CLASSNAME];
            $credentials = $this->config[$key][self::CREDENTIALS];

            $this->connections[$key] = new $dbClass($credentials);
        }

        return $this->connections[$key];
    }

    /**
     * @param $dbKey
     * @return mixed
     * @throws InvalidKeyException
     */
    public function getCredentials($dbKey = null) {
        if (is_null($dbKey)) {
            if (is_null($this->defaultConnection)) {
                throw new InvalidKeyException('dbkey not passed and no default key specified in entity manager');
            }

            $dbKey = $this->defaultConnection;
        }

        if (!array_key_exists($dbKey, $this->config)) {
            throw new InvalidKeyException('dbkey does not exist in entity manager credentials');
        }

        $config = $this->config[$dbKey];

        return $config['credentials'];
    }

    /**
     * @return array
     */
    public function getKeys(): array {
        return array_keys($this->connections);
    }

    /**
     * @return ClientConnection
     * @throws InvalidKeyException
     */
    public function getDefaultConnection(): ClientConnection {
        return $this->getConnection($this->config[self::DEFAULT_CONNECTION_NAME]);
    }
}