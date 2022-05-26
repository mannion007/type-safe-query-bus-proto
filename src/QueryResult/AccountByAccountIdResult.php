<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto\QueryResult;

final class AccountByAccountIdResult implements QueryResult
{
    private string $id;

    private \DateTimeImmutable $openedAt;

    public function __construct(string $id, \DateTimeImmutable $openedAt)
    {
        $this->id = $id;
        $this->openedAt = $openedAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function openedAt(): \DateTimeImmutable
    {
        return $this->openedAt;
    }
}
