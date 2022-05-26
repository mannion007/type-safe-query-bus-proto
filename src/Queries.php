<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\AccountByAccountIdQuery;
use Lendable\TypeSafeBusProto\Query\Query;
use Lendable\TypeSafeBusProto\QueryResult\AccountByAccountIdResult;
use Lendable\TypeSafeBusProto\QueryResult\QueryResult;

final class Queries
{
    /**
     * @var array<class-string<Query>, class-string<QueryResult>>
     */
    public const MAP = [
        AccountByAccountIdQuery::class => AccountByAccountIdResult::class,
    ];
}
