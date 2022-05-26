<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto;

use Lendable\TypeSafeBusProto\Query\AccountArrayByAccountIdQuery;
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
    {
        $result = $this->queryBus->dispatch(new AccountByAccountIdQuery('id'));
        $openedAt = $result->openedAt();
        dumpType($result);


        $result = $this->queryBus->dispatch(new AccountEmailByAccountIdQuery('id'));
        $email = $result->email();
        dumpType($result);

        $result = $this->queryBus->dispatch(new AccountArrayByAccountIdQuery('id'));
        $id = $result['id'];
        dumpType($result);

        dumpType($this->queryBus->dispatch(new UnmappedQuery())); //Mixed
    }
}
