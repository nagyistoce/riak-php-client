<?php

/*
Copyright 2014 Basho Technologies, Inc.

Licensed to the Apache Software Foundation (ASF) under one or more contributor license agreements.  See the NOTICE file
distributed with this work for additional information regarding copyright ownership.  The ASF licenses this file
to you under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance
with the License.  You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an
"AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  See the License for the
specific language governing permissions and limitations under the License.
*/

namespace Basho\Riak\Command\Object;

use Basho\Riak\Command;
use Basho\Riak\CommandInterface;

/**
 * Fetches a Riak Kv Object
 *
 * @author Christopher Mancini <cmancini at basho d0t com>
 */
class Fetch extends Command\Object implements CommandInterface
{
    protected $decodeAsAssociative = false;

    public function __construct(Command\Builder\FetchObject $builder)
    {
        parent::__construct($builder);

        $this->bucket = $builder->getBucket();
        $this->location = $builder->getLocation();
        $this->decodeAsAssociative = $builder->getDecodeAsAssociative();
    }

    public function setResponse($statusCode, $responseHeaders = [], $responseBody = '')
    {
        $this->response = new Response($statusCode, $responseHeaders, $responseBody, $this->decodeAsAssociative);

        return $this;
    }
}