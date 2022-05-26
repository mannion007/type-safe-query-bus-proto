<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\AccountArrayByAccountIdQuery;
use Lendable\TypeSafeBusProto\Query\AccountByAccountIdQuery;
use Lendable\TypeSafeBusProto\Query\AccountEmailByAccountIdQuery;
use Lendable\TypeSafeBusProto\QueryResult\AccountByAccountIdResult;
use Lendable\TypeSafeBusProto\QueryResult\AccountEmailByAccountIdResult;

return [
    AccountByAccountIdQuery::class => AccountByAccountIdResult::class,
    AccountEmailByAccountIdQuery::class => AccountEmailByAccountIdResult::class,
    AccountArrayByAccountIdQuery::class => 'array{id: string, email: string}',
];
