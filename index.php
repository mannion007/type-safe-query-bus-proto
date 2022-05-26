<?php

declare(strict_types=1);

use Lendable\TypeSafeBusProto\InMemoryTypeSafeQueryBus;
use Lendable\TypeSafeBusProto\Query\AccountByAccountIdQuery;
use Lendable\TypeSafeBusProto\TypeSafeQueryBus;

require_once (__DIR__ . '/vendor/autoload.php');

/**
 * @var TypeSafeQueryBus<AccountByAccountIdQuery> $queryBus
 */
$queryBus = new InMemoryTypeSafeQueryBus();

$result = $queryBus->dispatch(new AccountByAccountIdQuery('1'));

echo $result->openedAt()->format(\DateTimeImmutable::ATOM);
