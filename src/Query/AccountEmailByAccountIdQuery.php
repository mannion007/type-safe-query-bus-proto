<?php

declare(strict_types=1);

namespace Lendable\TypeSafeBusProto\Query;


final class AccountEmailByAccountIdQuery implements Query
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
