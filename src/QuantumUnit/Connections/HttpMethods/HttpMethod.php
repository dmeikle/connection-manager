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
 * HttpMethod
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
interface HttpMethod
{
    public const POST_METHOD = 'Post';
    public const GET_METHOD = 'Get';
    public const DELETE_METHOD = 'Delete';
    public const PUT_METHOD = 'Put';

    public const HTTP_STATUS_SUCCESS = 200;

    public function execute(object $model, string $url, array $params): \RestClient;
}
