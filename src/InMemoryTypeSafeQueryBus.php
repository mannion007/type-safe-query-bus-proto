<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\AccountByAccountIdQuery;
use Lendable\TypeSafeBusProto\Query\Query;
use Lendable\TypeSafeBusProto\QueryResult\AccountByAccountIdResult;
use Lendable\TypeSafeBusProto\QueryResult\QueryResult;

/**
 * @phpstan-template T of Query
 * @phpstan-implements TypeSafeQueryBus<T>
 */
final class InMemoryTypeSafeQueryBus implements TypeSafeQueryBus
{
    public function dispatch(Query $query): QueryResult
    {
        if ($query instanceof AccountByAccountIdQuery) {
            return new AccountByAccountIdResult($query->id(), new \DateTimeImmutable());
        }

        throw new \Exception('query not supported');
    }
}
