<?php

declare(strict_types=1);

use FriendsOfTwig\Twigcs;

$finderTemplates = Twigcs\Finder\TemplateFinder::create()->in(__DIR__ . '/templates');

return Twigcs\Config\Config::create()
                           ->setName('robole-config')
                           ->setSeverity('warning')
                           ->setReporter('console')
                           ->setRuleSet(Twigcs\Ruleset\Official::class)
                           ->addFinder($finderTemplates)
                           ->setSpecificRuleSets([ // Every file matching the pattern will use a different ruleset.
//                               '*/template.html.twig' => Acme\Project\CustomRuleset::class,
                           ]);
