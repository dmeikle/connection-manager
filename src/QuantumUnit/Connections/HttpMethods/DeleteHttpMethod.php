<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Connections\HttpMethods;


/**
 * DeleteHttpMethod
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class DeleteHttpMethod extends AbstractHttpMethod implements HttpMethod
{
    /**
     * @param object $model
     * @param string $url
     * @param array $params
     * @return \RestClient
     */
    public function execute(object $model, string $url, array $params): \RestClient
    {
        $this->getClient()->delete($url,$params, $this->getHeaders());
    }

}