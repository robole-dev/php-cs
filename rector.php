<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector;
use Rector\CodeQuality\Rector\BooleanOr\RepeatedOrEqualToInArrayRector;
use Rector\CodeQuality\Rector\Empty_\SimplifyEmptyCheckOnEmptyArrayRector;
use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodeQuality\Rector\If_\CombineIfRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\CodeQuality\Rector\Isset_\IssetOnPropertyObjectToPropertyExistsRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Strict\Rector\BooleanNot\BooleanInBooleanNotRuleFixerRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;

return RectorConfig
    ::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withRootFiles()
    ->withPHPStanConfigs([
        __DIR__ . '/phpstan.dist.neon',
        // rector does not load phpstan extension automatically so require them manually here:
        //                       __DIR__ . '/vendor/phpstan/phpstan-doctrine/extension.neon',
        //                       __DIR__ . '/vendor/phpstan/phpstan-symfony/extension.neon',
    ])
    ->withImportNames(
        importShortClasses: false,
    )
    ->withPreparedSets(
        codeQuality: true,
        codingStyle: true,
        strictBooleans: true,
        phpunitCodeQuality: true,
        doctrineCodeQuality: true,
    )
    ->withPhpSets(
        php84: true,
    )
    ->withSymfonyContainerPhp(__DIR__ . '/tests/rector/symfony-container.php')
    // For SULU
// ->withSymfonyContainerXml(__DIR__ . '/var/cache/website/dev/App_KernelDevDebugContainer.xml')
    // For Symfony
    ->withSymfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml')
    ->withComposerBased(
        twig: true,
        doctrine: true,
        phpunit: true,
        symfony: true,
    )
    ->withSets([
        DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        DoctrineSetList::DOCTRINE_CODE_QUALITY,
    ])
    ->withSets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::PHP_84,
    ])
    ->withSkip([
        SimplifyEmptyCheckOnEmptyArrayRector::class,
        SimplifyEmptyArrayCheckRector::class,
        FlipTypeControlToUseExclusiveTypeRector::class,
        DisallowedEmptyRuleFixerRector::class,
        IssetOnPropertyObjectToPropertyExistsRector::class,
        ExplicitBoolCompareRector::class,
        CombineIfRector::class,
        NewlineAfterStatementRector::class,
        RepeatedOrEqualToInArrayRector::class,
        EncapsedStringsToSprintfRector::class,
        BooleanInBooleanNotRuleFixerRector::class,
    ])
    //                   ->withSets([
//                       // activate when doing updates:
//                       // SymfonyLevelSetList::UP_TO_SYMFONY_63,
//                       // activate when doing updates:
//                       // PHPUnitLevelSetList::UP_TO_PHPUNIT_90,
//                       // PHPUnitSetList::PHPUNIT_91,
//                       // sulu rules
//                       // activate for updates when doing updates:
//                       // SuluLevelSetList::UP_TO_SULU_25,
//                   ])
    ;
