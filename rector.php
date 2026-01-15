<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\ArrowFunction\ArrowFunctionDelegatingCallToFirstClassCallableRector;
use Rector\CodingStyle\Rector\Closure\ClosureDelegatingCallToFirstClassCallableRector;
use Rector\CodingStyle\Rector\FuncCall\ClosureFromCallableToFirstClassCallableRector;
use Rector\CodingStyle\Rector\FuncCall\FunctionFirstClassCallableRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\Expression\RemoveDeadStmtRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\TypeDeclaration\Rector\ArrowFunction\AddArrowFunctionReturnTypeRector;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->withSkip([
        ReadOnlyPropertyRector::class,
        DisallowedEmptyRuleFixerRector::class,
        RemoveDeadStmtRector::class,

        // First-class callables quebram com Closure::bindTo() do Laravel Macroable
        // Laravel docs usa closures: fn () => DB::table('users')->count()
        // Ref: https://laravel.com/docs/12.x/concurrency
        ArrowFunctionDelegatingCallToFirstClassCallableRector::class,
        ClosureDelegatingCallToFirstClassCallableRector::class,
        ClosureFromCallableToFirstClassCallableRector::class,
        FunctionFirstClassCallableRector::class,

        AddArrowFunctionReturnTypeRector::class => [
            __DIR__.'/tests',
        ],
        __DIR__.'/tests/bootstrap.php',
    ])
    ->withSets([
        LaravelSetList::LARAVEL_120,
        LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_COLLECTION,
        LaravelSetList::LARAVEL_IF_HELPERS,
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        earlyReturn: true,
    )
    ->withPhpSets(php85: true);
