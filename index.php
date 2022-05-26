<?php

declare(strict_types=1);

use Lendable\TypeSafeBusProto\InMemoryQueryBus;
use Lendable\TypeSafeBusProto\Query\AccountByAccountIdQuery;
use Lendable\TypeSafeBusProto\QueryBus;

require_once (__DIR__ . '/vendor/autoload.php');

/**
 * @var QueryBus<AccountByAccountIdQuery> $queryBus
 */
$queryBus = new InMemoryQueryBus();

$result = $queryBus->dispatch(new AccountByAccountIdQuery('1'));

echo $result->openedAt()->format(\DateTimeImmutable::ATOM);
