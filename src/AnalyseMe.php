<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\AccountByAccountIdQuery;
use Lendable\TypeSafeBusProto\Query\AccountEmailByAccountIdQuery;
use Lendable\TypeSafeBusProto\Query\UnmappedQuery;
use function PHPStan\dumpType;

class AnalyseMe
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function go(): void
    {;
        dumpType($this->queryBus->dispatch(new AccountByAccountIdQuery('id')));
        dumpType($this->queryBus->dispatch(new AccountEmailByAccountIdQuery('id')));

//        uncomment to see stan explode with message
//        $this->queryBus->dispatch(new UnmappedQuery());
    }
}
