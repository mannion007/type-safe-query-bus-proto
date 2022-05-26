<?php

declare(strict_types=1);

namespace Lendable\Stan;

use Lendable\TypeSafeBusProto\Queries;
use Lendable\TypeSafeBusProto\QueryBus;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\ShouldNotHappenException;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;

final class QueryBusDynamicMethodReturnTypeExtension implements DynamicMethodReturnTypeExtension
{
    public function __construct()
    {
    }

    public function getClass(): string
    {
        return QueryBus::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return $methodReflection->getName() === 'dispatch';
    }

    public function getTypeFromMethodCall(MethodReflection $methodReflection, MethodCall $methodCall, Scope $scope): Type
    {
        $type = $scope->getType($methodCall->args[0]->value);
        if (!$type instanceof ObjectType) {
            throw new ShouldNotHappenException('Expected an object');
        }

        $resolved = Queries::MAP[$type->getClassName()] ?? null;
        if ($resolved === null) {
            throw new ShouldNotHappenException('Missing entry for query '.$type->getClassName());
        }

        return new ObjectType($resolved);
    }
}
