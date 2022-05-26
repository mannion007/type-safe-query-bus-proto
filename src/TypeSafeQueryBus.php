<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\Query;
use Lendable\TypeSafeBusProto\QueryResult\QueryResult;

/**
 * @phpstan-template T of Query
 */
interface TypeSafeQueryBus
{
    /**
     * @return QueryResult of Queries::MAP[T]
     */
    public function dispatch(Query $query): QueryResult;
}
