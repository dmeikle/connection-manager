<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Connections\Traits;


use QuantumUnit\Connections\Managers\ConnectionManager;

/**
 * ConnectionManagerTrait
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
trait ConnectionManagerTrait
{

    protected $connectionManager;

    /**
     * @return ConnectionManager
     */
    public function getConnectionManager(): ConnectionManager {
        return $this->connectionManager;
    }

    /**
     * @param ConnectionManager $connectionManager
     * @return void
     */
    public function setConnectionManager(ConnectionManager $connectionManager): void {
        $this->connectionManager = $connectionManager;
    }
}

