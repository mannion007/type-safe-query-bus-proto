<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\Query;
use Lendable\TypeSafeBusProto\QueryResult\QueryResult;

interface QueryBus
{
    public function dispatch(Query $query): QueryResult;
}
