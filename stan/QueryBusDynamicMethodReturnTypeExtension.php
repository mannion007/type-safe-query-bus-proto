<?php

declare(strict_types=1);

namespace Lendable\Stan;

use Lendable\TypeSafeBusProto\QueryBus;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\PhpDoc\TypeStringResolver;
use PHPStan\Reflection\MethodReflection;
use PHPStan\ShouldNotHappenException;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\MixedType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;

final class QueryBusDynamicMethodReturnTypeExtension implements DynamicMethodReturnTypeExtension
{
    /**
     * @var array<class-string, string>
     */
    private array $map;

    public function __construct(string $mapFile, private TypeStringResolver $typeStringResolver)
    {
        if (!\file_exists($mapFile)) {
            throw new \InvalidArgumentException(\sprintf('Queries map file not found at path %s', $mapFile));
        }

        $this->map = require_once $mapFile;
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

        $resolved = $this->map[$type->getClassName()] ?? null;
        if ($resolved === null) {
            return new MixedType();
        }

        return $this->typeStringResolver->resolve($resolved);
    }
}
