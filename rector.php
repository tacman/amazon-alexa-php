<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Symfony\Set\SymfonySetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\CodeQuality\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictBoolReturnExprRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNewArrayRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\Symfony\Rector\MethodCall\GetHelperControllerToServiceRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/test/',
    ]);

    $rectorConfig->rules([
        AddReturnTypeDeclarationRector::class,
    ]);

    // register a single rule


    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,
        DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        \Rector\PHPUnit\Set\PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
        SymfonySetList::SYMFONY_64,
    ]);
};

