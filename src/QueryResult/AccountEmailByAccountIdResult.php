<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto\QueryResult;

final class AccountEmailByAccountIdResult implements QueryResult
{
    private string $id;

    private string $email;

    public function __construct(string $id, string $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }
}
