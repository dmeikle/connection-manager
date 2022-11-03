<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Connections\Clients;


use Illuminate\Support\Facades\DB;

/**
 * LocalhostConnection
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class LocalhostConnection extends ClientConnection
{

    public function execute(string $method, object $model, string $url, array $params): string
    {
        $sql = $method::$url;
        $result = DB::selectRaw($sql, $params)->get()->toJson();

    }

}