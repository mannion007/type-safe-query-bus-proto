<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\Query;

interface QueryBus
{
    public function dispatch(Query $query): object;
}
