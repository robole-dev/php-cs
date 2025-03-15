<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector;
use Rector\CodeQuality\Rector\Empty_\SimplifyEmptyCheckOnEmptyArrayRector;
use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodeQuality\Rector\If_\CombineIfRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\CodeQuality\Rector\Isset_\IssetOnPropertyObjectToPropertyExistsRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\Php82\Rector\Class_\ReadOnlyClassRector;
use Rector\Set\ValueObject\SetList;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\Symfony\CodeQuality\Rector\Class_\EventListenerToEventSubscriberRector;
use Rector\Symfony\CodeQuality\Rector\Class_\InlineClassRoutePrefixRector;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.dist.neon');
    // use this for Symfony projects
    $rectorConfig->symfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml');
    // use this for Sulu projects
    // $rectorConfig->symfonyContainerXml(__DIR__ . '/var/cache/website/dev/App_KernelDevDebugContainer.xml');

    // basic rules
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses();

    // symfony rules
    $rectorConfig->sets([
        SymfonySetList::SYMFONY_72,
        SymfonySetList::SYMFONY_CODE_QUALITY,
        SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
    ]);

    // bundles
//    $rectorConfig->sets([
//        JMSSetList::ANNOTATIONS_TO_ATTRIBUTES,
//        SensiolabsSetList::ANNOTATIONS_TO_ATTRIBUTES,
//    ]);

    // doctrine rules
    $rectorConfig->sets([
        DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        DoctrineSetList::DOCTRINE_CODE_QUALITY,
    ]);

    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::PHP_83,
    ]);

    $rectorConfig->rule(ReadOnlyPropertyRector::class);
    $rectorConfig->rule(ReadOnlyClassRector::class);

    $rectorConfig->skip([
        EventListenerToEventSubscriberRector::class,
        SimplifyEmptyCheckOnEmptyArrayRector::class,
        SimplifyEmptyArrayCheckRector::class,
        FlipTypeControlToUseExclusiveTypeRector::class,
        DisallowedEmptyRuleFixerRector::class,
        IssetOnPropertyObjectToPropertyExistsRector::class,
//        NullableCompareToNullRector::class, Not registered
        ExplicitBoolCompareRector::class,
//        WhileNullableToInstanceofRector::class, Not registered
        CombineIfRector::class,
        InlineClassRoutePrefixRector::class,
    ]);
};
